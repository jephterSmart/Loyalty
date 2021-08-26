<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LGA extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id'
    ];
    protected $tableName ='l_g_a_s';
    public $timestamps = false;
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
}
