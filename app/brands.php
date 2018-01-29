<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table = 'brands';
    const UPDATED_AT = 'uploaded_at';
    const CREATED_AT = 'created_at';
}
