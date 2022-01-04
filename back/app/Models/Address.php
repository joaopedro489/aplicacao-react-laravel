<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'municipality',
        'cep',
        'street',
        'number',
        'complement',
        'user_id',
        'state_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
}
