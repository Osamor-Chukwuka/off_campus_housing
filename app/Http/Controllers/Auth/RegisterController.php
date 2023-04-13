<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request\validate;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'number' => ['required'],
            'picture' => ['required'],
            'Account-type'=> ['required', 'string', 'max:255'],
        ]);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $file = $data[('picture')];
        if($file){
            $destination_path = 'public/images/profile';
            $image_name = $file->getClientOriginalName();
            $path = $file->storeAs($destination_path, $image_name);
            $data['picture'] = $image_name;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'number' => $data['number'],
            'picture' => $data['picture'],
            'Account-type' => $data['Account-type'],
        ]);
    }

    // public function updatePaymentAccount(Request $request){
    //     $form = Validator::make($request, [
    //         'account_number' => 'required',
    //         'sort_code' => 'required',
    //     ]);
    //     echo 'ncn1';
    //     // User::where("id", Auth::user()->id)->create(["account_number" => $form['account_number']]);

    // }
}
