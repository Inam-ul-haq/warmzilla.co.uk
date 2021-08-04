<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    public function design()
    {
    	return $this->belongsTo('App\Models\Design','design_id','id');
    }
}
