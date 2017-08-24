<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public $timestamps = false;
    protected $table = 'ItemCategory';
    protected $primaryKey = 'ItemID';
}
