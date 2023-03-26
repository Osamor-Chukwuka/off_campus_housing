<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'address', 'about', 'price', 'duration', 'gender', 'security', 'features', 'furnishings', 
    'city', 'tenants', 'state', 'zip', 'image1', 'image2', 'image3'];

    protected $table = 'houses';
}
