<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'address', 'about', 'price', 'duration', 'gender', 'security', 'features', 'furnishings', 
    'city', 'tenants', 'roomates', 'zip', 'image1', 'image2', 'image3'];

    protected $table = 'houses';
}
