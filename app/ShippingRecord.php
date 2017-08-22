<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingRecord extends Model
{
    public $timestamps = false;
    protected $table = 'ShippingRecord';
    protected $primaryKey = 'SerialNumber';
}
