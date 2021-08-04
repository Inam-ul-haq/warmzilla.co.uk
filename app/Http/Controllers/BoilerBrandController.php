<?php

namespace App\Http\Controllers;

use App\Models\Boilerbrand;
// use App\Models\Finish;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use App\Helpers\AuthHelper;
use Auth;

class BoilerBrandController extends Controller
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
        $boilers    = Boilerbrand::orderBy('id', 'DESC')->paginate();
        $title      = 'Boiler Brand'; 
        return view('boilerbrand.view_boilertype',compact('boilers','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Boiler Type";
        return view('boilerbrand.create_boiler_type',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $brand_title = htmlentities($request->brand_title);
         $brand_questions = htmlentities($request->brand_questions);
        
        $brand_info = htmlentities($request->brand_info);
        
        $this->validate($request, [
            'name'        => 'required',
            'description'       => 'required',
            'boiler_img'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $boiler = new Boilerbrand;
        
        $boiler_brand_name = preg_replace('/\s+/', '-', $request->name);
      //  $boiler_brand_name = $boiler_brand_name .'-'.Str::random(6);
        $boiler_brand_name = strtolower($boiler_brand_name);
        $boiler->name               = $request->name;
        $boiler->brand_title        = $brand_title;
        $boiler->slug               = $boiler_brand_name;
        $boiler->description        = $request->description;
        
        $boiler->brand_questions    = $brand_questions;
        
        $boiler->brand_info         = $brand_info;
        
        if($request->hasFile('boiler_img')){
          $image = $request->file('boiler_img');
          $filename = 'boiler' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/boilerbrand');
          $image->move($destinationPath, $filename);
          $boiler->filename         = $filename;
        };

        if($request->hasFile('boiler_main_img')){
          $image = $request->file('boiler_main_img');
          $filename = 'boiler' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/boilerbrand');
          $image->move($destinationPath, $filename);
          $boiler->boiler_main_img        = $filename;
        };

        if($request->hasFile('boiler_question_img')){
          $image = $request->file('boiler_question_img');
          $filename = 'boiler_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
           $destinationPath          = public_path('/images/boilerbrand');
          $image->move($destinationPath, $filename);
          $boiler->boiler_question_img         = $filename;
        };                
        
         $boiler->meta_name   = $request->meta_name;
         $boiler->meta_description  = $request->meta_description;


        $boiler->save();
        Session::flash('message', "Boiler Brand added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilerbrand');
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
        $boiler     = Boilerbrand::find($id);
        $title      = "Edit Boiler Type";
        return view('boilerbrand.edit_boiler_type',compact('boiler','title'));
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
      // dd($request->all());

        $brand_title = htmlentities($request->brand_title);
        $brand_questions = htmlentities($request->brand_questions);
        $brand_info = htmlentities($request->brand_info);
        

        $this->validate($request, [
            'name'             => 'required',
            'description'            => 'required',
            'boiler_img'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        $boiler = Boilerbrand::find($id);
            if($boiler->name != $request->name){
                $boiler_brand_name = preg_replace('/\s+/', '-', $request->name);
             //   $boiler_brand_name = $boiler_brand_name .'-'.Str::random(6);
                 $boiler_brand_name = strtolower($boiler_brand_name);                        
                $boiler->slug               = $boiler_brand_name;
            }
        $boiler->name               = $request->name;
        
        $boiler->description        = $request->description;
        $boiler->brand_title        = $brand_title;
        $boiler->brand_questions    = $brand_questions;
         $boiler->meta_name   = $request->meta_name;
         $boiler->meta_description  = $request->meta_description;
        $boiler->brand_info         = $brand_info;

        if($request->hasFile('boiler_img')){
          $image = $request->file('boiler_img');
          $filename = 'boiler_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/boilerbrand');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/boilerbrand/boiler->filename"));
          $boiler->filename         = $filename;
        };
        
        if($request->hasFile('boiler_main_img')){
          $image = $request->file('boiler_main_img');
          $filename = 'boiler_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/boilerbrand');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/boilerbrand/boiler->boiler_main_img"));
          $boiler->boiler_main_img         = $filename;
        };        
        
        if($request->hasFile('boiler_question_img')){
          $image = $request->file('boiler_question_img');
          $filename4 = 'boiler_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath4          = public_path('/images/boilerbrand');
          $image->move($destinationPath4, $filename4);
          $fileRemove               = @unlink(public_path("images/boilerbrand/boiler->boiler_question_img"));
          $boiler->boiler_question_img         = $filename4;
        };                
        
        


        $boiler->save();
        Session::flash('message', "Boiler Brand Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilerbrand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler             = Boilerbrand::find($id);

        $boiler->delete();
        Session::flash('message', "boiler Brand deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('/boiler/boilerbrand');
    }
}
