<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    protected $fillable = ['landlord_id', 'type', 'address', 'about', 'price', 'duration', 'gender', 'security', 'features', 'furnishings', 
    'city', 'tenants', 'roomates', 'zip', 'images'];

    protected $table = 'houses';

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
