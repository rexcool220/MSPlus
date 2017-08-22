<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    public $timestamps = false;
    protected $table = 'Members';
    protected $primaryKey = 'FBID';
}
