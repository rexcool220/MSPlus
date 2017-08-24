<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RemitRecord extends Model
{
    public $timestamps = false;
    protected $table = 'RemitRecord';
    protected $primaryKey = '匯款編號';
}
