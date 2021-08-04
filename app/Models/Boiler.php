<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boilerbrand;
use App\Models\Boilercategory;

class Boiler extends Model
{
	public $table = 'boilers'; 
    use HasFactory;

    public function brands()
    {
        return $this->hasOne(Boilerbrand::class, 'id','boilerbrand');
    }
    public function category()
    {
        return $this->hasOne(Boilercategory::class, 'id','boilercategory');
    }
}
