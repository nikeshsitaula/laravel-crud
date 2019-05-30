<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    //Table Name
    protected $table ='offers';

    //Primary Key
    public $primaryKey='id';

    //Timestamps
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
