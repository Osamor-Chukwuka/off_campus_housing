<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'landlord_id', 'house_id', 'message'];
    protected $table = 'comments';

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function houses(){
        return $this->belongsTo(Houses::class);
    }
}
