<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['productId', 'landLordId', 'customer_reference_number', 'landLord_recipient_code', 'landLord_reference_number'];

    protected $table = 'orders';
}
