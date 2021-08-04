<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boiler;
use App\Models\Boilerbrand;
use App\Models\Boilerlocationarea;




class Boilerlocation extends Model
{
	public $table = 'boilerlocation';
	use HasFactory;
	
    public function areas()
    {
        return $this->hasMany(Boilerlocationarea::class, 'city','id');
    }	
    // public function brands()
    // {
    //     // return $this->hasOne(Boilerbrand::class, 'boilercategory','id');
    //     return $this->hasOne(Boilerbrand::class, 'id','brand');
    // }	    
	
}
