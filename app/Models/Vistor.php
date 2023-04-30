<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistor extends Model
{
    use HasFactory;

    public $guarded = [];

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id')->withDefault();
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'Agent_id');
    }
}
