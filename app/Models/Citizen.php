<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'address',
        'phone',
        'ward_id'
    ];
    public function ward(){
        return $this->belongsTo(Ward::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
