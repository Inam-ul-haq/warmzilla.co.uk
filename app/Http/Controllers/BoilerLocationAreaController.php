<?php

namespace App\Http\Controllers;

use App\Models\Boilerbrand;
use App\Models\Boilercategory;
use App\Models\Boilerlocation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use App\Helpers\AuthHelper;
use Auth;
use App\Models\Boilerlocationarea;

class BoilerLocationAreaController extends Controller
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
        $boilerlocations = Boilerlocationarea::orderBy('id', 'DESC')->get();
        $title      = 'Boiler Installation Area'; 
//dd($boilerlocations);
        return view('boilerlocationareas.view',compact('title', 'boilerlocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = "Add Boiler Installation Area";
        $cities     = Boilerlocation::all();
        return view('boilerlocationareas.create',compact('title', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // echo "<pre>"; print_r($request->all()); exit('jiji');  
        
        $this->validate($request, [
            'area_name'        => 'required',
            'city_name'       => 'required',
            // 'filename'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $boilerlocation = new Boilerlocationarea;
        
        $boiler_area_name = preg_replace('/\s+/', '-', $request->area_name);
        $boiler_area_name = $boiler_area_name .'-'.Str::random(6);

        $boilerlocation->name           = $request->area_name;
        $boilerlocation->slug           = $boiler_area_name;
        $boilerlocation->city           = $request->city_name;
        
        $boilerlocation->main_info      = $request->area_info;
        
        $boilerlocation->questions      = $request->area_question;
        
        
        
        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boilerarea' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath          = public_path('/images/boilerlocation');
          $image->move($destinationPath, $filename);
          $boilerlocation->main_image         = $filename;
        };
        
        if($request->hasFile('question_image')){
          $image1 = $request->file('question_image');
          $filename1 = 'boilerarea1' .time() . '.' . $image1->getClientOriginalExtension();
          $destinationPath1          = public_path('/images/boilerlocation');
          $image1->move($destinationPath1, $filename1);
          $boilerlocation->question_image         = $filename1;
        };        

        $boilerlocation->save();
        Session::flash('message', "Boiler Installation Area added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('boilerlocationarea');
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
        $boilerlocation     = Boilerlocationarea::find($id);
        $cities     = Boilerlocation::all();
        $title      = "Edit Boiler Installation Location";
        return view('boilerlocationareas.edit',compact('boilerlocation','title', 'cities'));
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
        $this->validate($request, [
            'area_name'        => 'required',
            'city_name'       => 'required',
            // 'filename'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $boilerlocation = Boilerlocationarea::find($id);
        
        $boilerlocation->name           = $request->area_name;
        $boilerlocation->city           = $request->city_name;
        
        $boilerlocation->main_info      = $request->area_info;
        
        $boilerlocation->questions      = $request->area_question;
        
        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boilerarea' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath          = public_path('/images/boilerlocation');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/boilerlocation/$boilerlocation->main_image"));
          $boilerlocation->main_image         = $filename;
        };
        
        if($request->hasFile('question_image')){
          $image1 = $request->file('question_image');
          $filename1 = 'boilerarea1' .time() . '.' . $image1->getClientOriginalExtension();
          $destinationPath1          = public_path('/images/boilerlocation');
          $image1->move($destinationPath1, $filename1);
          $fileRemove               = @unlink(public_path("images/boilerlocation/$boilerlocation->question_image"));
          $boilerlocation->question_image         = $filename1;
        };        


        $boilerlocation->save();
        Session::flash('message', "Boiler Installation Area Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('boilerlocationarea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler             = Boilerlocationarea::find($id);

        $boiler->delete();
        Session::flash('message', "Boiler Area deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('boilerlocationarea');
    }
     
    
}
