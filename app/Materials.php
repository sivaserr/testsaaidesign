<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $table = 'materials';
    protected $fillable = ['material_name','hsn_code','cgst','sgst'];
}
