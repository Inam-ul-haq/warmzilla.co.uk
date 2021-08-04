<?php

namespace App\Http\Controllers;

use App\Models\Boilertype;
// use App\Models\Finish;
use Illuminate\Http\Request;
use Session;
use App\Helpers\AuthHelper;
use Auth;

class BoilertypeController extends Controller
{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finish     = array();
        $boilers    = Boilertype::all();
        $title      = 'Finish'; 
        return view('boilertype.view_boilertype',compact('boilers','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Boiler Type";
        return view('boilertype.create_boiler_type',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'        => 'required',
            'description'       => 'required',
        ]);
        
        $boiler = new Boilertype;
        $boiler->name            = $request->name;
        $boiler->description     = $request->description;

        $boiler->save();
        Session::flash('message', "Boiler Type added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilertype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boiler     = Boilertype::find($id);
        $title      = "Edit Boiler Type";
        return view('boilertype.edit_boiler_type',compact('boiler','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update($id)
    // {

    // }
    public function update(Request $request, $id)
    {
        // echo "<pre>"; print_r($request->all()); exit('rr'); 
        $this->validate($request, [
            'name'             => 'required',
            'description'            => 'required',
        ]);

        $boiler = Boilertype::find($id);
       

        $boiler->name               = $request->name;
        $boiler->description        = $request->description;

        $boiler->save();
        Session::flash('message', "Boiler Type Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilertype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler             = Boilertype::find($id);

        $boiler->delete();
        Session::flash('message', "boiler type deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('/boiler/boilertype');
    }
}
