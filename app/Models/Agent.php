<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'manager_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function manager(){
        return $this->belongsTo(Manager::class , 'manager_id');
    }

}
