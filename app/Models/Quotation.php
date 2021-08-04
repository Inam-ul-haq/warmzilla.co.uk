<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function finish(){
    	return $this->hasOne(Finish::class, 'id', 'finish_id' );
    }
    public function edge(){
    	return $this->hasOne(Edge::class, 'id', 'edge_id');
    }
    public function design(){
    	return $this->hasOne(Design::class, 'id' ,'design_id');
    }
    public function user(){
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}
