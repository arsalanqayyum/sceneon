<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cats extends Model
{
    protected $table = 'cats';
    const UPDATED_AT = 'uploaded_at';
    const CREATED_AT = 'created_at';
}
