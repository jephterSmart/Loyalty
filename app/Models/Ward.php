<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'l_g_a_id',
    ];
    public $timestamps = false;
    public function l_g_a()
    {
        return $this->belongsTo(LGA::class);
    }
    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }
}
