<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    //
    public function usuario(){

        return $this->belongsTo('App\User','user_id');
    }
    public function cliente(){

        return $this->belongsTo('App\Cliente');
    }
    public function bus(){

        return $this->belongsTo('App\Bus');
    }
}
