<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Design;
// use App\Models\Dimension;
use App\Models\Estimate;
use App\Models\Edge;
use App\Models\Design;
use App\Models\User;

use App\Models\Boiler;
use App\Models\Boilerbrand;
use App\Models\Boilercategory;



use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user= Auth::user();

            $permit = AuthHelper::isAdmin($user->id); 
            
            if($permit){ 
                return $next($request);
            }
            
            else{  abort(404); redirect('/'); }    
        });

    }

    public function index()
    {
        $users = User::where('user_type',  '!=' , 1)->count();
        $boilers = Boiler::count();
        $boilers = Boiler::count();
        $estimates = Estimate::count();
        $edges = Edge::count();
        
        $designs = Design::count();
        $brands  = Boilerbrand::count();
        $models  = Boilercategory::count();

        return view('dashboard', compact('boilers','brands','models', 'users', 'estimates', 'edges', 'designs'));
    }

}
