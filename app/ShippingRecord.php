<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingRecord extends Model
{
    protected $table = 'ShippingRecord';
    protected $primaryKey = 'SerialNumber';
}
