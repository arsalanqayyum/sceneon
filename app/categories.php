<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $guarded = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'uploaded_at';

    /*public function categoryname(){
        return $this->belongsTo('App\cats');
    }*/
}
