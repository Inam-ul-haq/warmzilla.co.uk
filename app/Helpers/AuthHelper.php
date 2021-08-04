<?php
use Illuminate\Support\Facades\Auth;
namespace App\Helpers;
use DB;
use Auth;
use App\Models\User;

class AuthHelper {

public static function isAdmin($id =''){

		if($id){
				$admin = User::where('id', $id)->get()->first();

		}else{
				$user_id = Auth::user()->id;
				$admin = User::where('id', $user_id)->get()->first();
		}

		if($admin){
			return true;
		}
		else{
			return false;
		 }
	 }
}

?>