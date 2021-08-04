<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boiler;
use App\Models\Boilerbrand;



class Boilerlocationarea extends Model
{
	public $table = 'area';
	use HasFactory;
	
    // public function boilers()
    // {
    //     return $this->hasMany(Boiler::class, 'boilercategory','id');
    // }	
    // public function brands()
    // {
    //     // return $this->hasOne(Boilerbrand::class, 'boilercategory','id');
    //     return $this->hasOne(Boilerbrand::class, 'id','brand');
    // }	    
	
}
