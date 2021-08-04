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

class BoilerLocationController extends Controller
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
        $boilerlocations = Boilerlocation::orderBy('id', 'DESC')->get();
        $title      = 'Boiler Locations'; 
        return view('boilerlocation.view',compact('title', 'boilerlocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Boiler Location";
        $brands    = Boilerbrand::all();
        return view('boilerlocation.create',compact('title', 'brands'));
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
            'location_name'        => 'required',
            'location_description'       => 'required',
            // 'filename'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $boilerlocation = new Boilerlocation;
        
        $boiler_loc_name = preg_replace('/\s+/', '-', $request->location_name);
       // $boiler_loc_name = $boiler_loc_name .'-'.Str::random(6);

        $boilerlocation->location_name          = $request->location_name;
        $boilerlocation->slug                   = strtolower($boiler_loc_name);
        $boilerlocation->location_description   = $request->location_description;
         $boilerlocation->meta_name   = $request->meta_name;
         $boilerlocation->meta_description  = $request->meta_description;
        $boilerlocation->info      = $request->info;
        
        $boilerlocation->questions      = $request->question;


        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boilerlocation_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath          = public_path('/images/boilerlocation');
          $image->move($destinationPath, $filename);
          $boilerlocation->filename         = $filename;
        };

        if($request->hasFile('main_image')){
          $image = $request->file('main_image');
          $filename_main = 'boilerarea' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPathmain          = public_path('/images/boilerlocation');
          $image->move($destinationPathmain, $filename_main);
          $boilerlocation->main_image         = $filename_main;
        };
        
        if($request->hasFile('question_image')){
          $image1 = $request->file('question_image');
          $filename1 = 'boilerarea1' .time() . '.' . $image1->getClientOriginalExtension();
          $destinationPath1          = public_path('/images/boilerlocation');
          $image1->move($destinationPath1, $filename1);
          $boilerlocation->question_image         = $filename1;
        };        

        $boilerlocation->save();
        Session::flash('message', "Boiler Location added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilerlocation');
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
        $boilerlocation     = Boilerlocation::find($id);
        $title      = "Edit Boiler Installation Location";
        return view('boilerlocation.edit',compact('boilerlocation','title'));
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

// echo "<pre>"; print_r($request->all()); exit('yes'); 

        $brand_questions = htmlentities($request->brand_questions);
        
        $this->validate($request, [
            'location_name'             => 'required',
            'location_description'            => 'required',
            // 'filename'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        $boilerlocation = Boilerlocation::find($id);
            if($boilerlocation->name != $request->name){
                $boiler_loc_name = preg_replace('/\s+/', '-', $request->location_name);
              //  $boiler_loc_name = $boiler_loc_name .'-'.Str::random(6);                        
                $boilerlocation->slug               = strtolower($boiler_loc_name);
            }
        $boilerlocation->location_name               = $request->location_name;
        
        $boilerlocation->location_description        = $request->location_description;

        $boilerlocation->info      = $request->info;
         $boilerlocation->meta_name   = $request->meta_name;
         $boilerlocation->meta_description  = $request->meta_description;
        
        $boilerlocation->questions      = $request->question;


        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boilerlocation_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath          = public_path('/images/boilerlocation');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/boilerlocation/$boilerlocation->filename"));
          $boilerlocation->filename         = $filename;
        };

        if($request->hasFile('main_image')){
          $image = $request->file('main_image');
          $filename_main = 'boilerarea' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPathmain          = public_path('/images/boilerlocation');
          $image->move($destinationPathmain, $filename_main);
          $fileRemove               = @unlink(public_path("images/boilerlocation/$boilerlocation->main_image"));
          $boilerlocation->main_image         = $filename_main;
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
        Session::flash('message', "Boiler Location Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilerlocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler             = Boilerlocation::find($id);

        $boiler->delete();
        Session::flash('message', "boiler Category deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('/boiler/boilerlocation');
    }
     
    
}
