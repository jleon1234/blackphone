<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
