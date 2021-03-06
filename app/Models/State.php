<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    public function l_g_a_s()
    {
        return $this->hasMany(LGA::class);
    }
    
}
