<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public function miner()
    {
        return $this->belongsTo(Miner::class, 'miner_id', 'id');
    }
}
