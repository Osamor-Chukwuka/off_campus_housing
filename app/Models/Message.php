<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'landlord_id', 'message'];
    protected $table = 'messages';

    public function users(){
        return $this->belongsTo(User::class);
    }
}
