<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //make payment
    public function makePayment(Request $request)
    {   
        $segment = $request->segment(3);

        // House details
        $house = Houses::select('*')->where('id', $segment)->get();
        return view('make-payment', [
            'segment' => $segment,
            'house' => $house
        ]);
    }




    // Verify Customer Payment
    public function verifyCustomerPayment($reference, $productId)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $houses = Houses::select('*')->where('id', $productId)->get();
            $landlord_id =  $houses[0]->landlord_id;
            $description =  $houses[0]->address;
            $price =  $houses[0]->price;
            $duration =  $houses[0]->duration;

            $landlord_details = User::select('*')->where('id', $landlord_id)->where('Account-type', 'LandLord')->get();

            $acccount_number =  $landlord_details[0]->account_number;
            $sort_code =  $landlord_details[0]->sort_code;
            $account_name = $landlord_details[0]->name;

            return $this->verifyLandLordDetails($acccount_number, $sort_code, $account_name, $description, $price, $duration,
                                                $landlord_id, $productId, $reference
            );
        }
    }

    public function verifyLandLordDetails($account_no, $sort_code, $account_name, $description, $price, $duration, $landlord_id, $productId, $reference)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$account_no&bank_code=$sort_code",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
                "Cache-Control: no-cache",
            ),
        ));


        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $this->transferRecipient($account_name, $account_no, $sort_code, $description, $price, $duration, $landlord_id, $productId, $reference);
        }
    }

    // get recipient code for Landlords
    public function transferRecipient($account_name, $acccount_number, $sort_code, $description, $price, $duration, $landlord_id, $productId, $reference)
    {
        $url = "https://api.paystack.co/transferrecipient";

        $fields = [
            'type' => "nuban",
            'name' => $account_name,
            'account_number' => $acccount_number,
            'bank_code' => $sort_code,
            'currency' => "NGN"
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result, true);
        $recipient_code =  $data['data']['recipient_code'];
        if ($data['status'] == 1) {
            return $this->transferMoney($recipient_code, $description, $price, $duration, $landlord_id, $productId, $reference);
        }
    }

    // transfer money to Landlord
    public function transferMoney($recipient_code, $description, $price, $duration, $landlord_id, $productId, $reference)
    {
        $random_string = 0;
        for ($i = 1; $i <= 14; $i++) {
            $random_string = $random_string . random_int(0, 500);
        }
        $url = "https://api.paystack.co/transfer";

        $fields = [
            'source' => "balance",
            'amount' => $price,
            "reference" => $random_string,
            'recipient' => $recipient_code,
            'reason' => $description . " Duration: ". $duration
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_ccc6e9fd27af032f21df6afa0c1e9a809a47da24",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        Orders::create(['productId' => $productId, 'landLordId' => $landlord_id, 'userId' => Auth::user()->id, 'customer_reference_number' => $reference, 
                         'landLord_recipient_code' => $recipient_code,  'landLord_reference_number' => $random_string
        ]);

        $house = Houses::select('*')->where('id', $productId)->get();
        $landLord = User::select('*')->where('id', $landlord_id)->where('Account-type', 'LandLord')->get();
        return view('receipt', [
            'house' => $house,
            'reference' => $reference,
            'landLord' => $landLord
        ]);
    
    }
}
