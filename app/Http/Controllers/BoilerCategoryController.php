<?php

namespace App\Http\Controllers;

use App\Models\Boilerbrand;
use App\Models\Boilercategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use App\Helpers\AuthHelper;
use Auth;

class BoilerCategoryController extends Controller
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
        // exit('here');
                 if(isset($_GET['search']) && $_GET['search'] ){
            
          $boilercategories = Boilercategory::with('brands')->where('name','like',  '%'.$_GET['search'].'%' )->orderBy('updated_at', 'DESC')->paginate();
        // echo "<pre>"; print_r($finishs); print_r($_GET['search']); exit('kok');
            
        }else{
            $boilercategories = Boilercategory::with('brands')->orderBy('id', 'DESC')->paginate(10);     
        }
        // $boilercategories = Boilercategory::with('brands')->orderBy('id', 'DESC')->paginate(10); 
        // echo "<pre>"; print_r($boilercategories); exit('kokok');  
        $finish     = array();
        $boilers    = Boilerbrand::all();
        $title      = 'Boiler Category'; 
        return view('boilercategory.view_boilercategory',compact('boilers','title', 'boilercategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Boiler Category";
        $brands    = Boilerbrand::all();
        return view('boilercategory.create_boilercategory',compact('title', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); exit(' ooo');
        // $brand_questions = htmlentities($request->brand_questions);
        
        $this->validate($request, [
            'name'        => 'required',
            'description'       => 'required',
            'filename'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $boiler = new Boilercategory;
        
        $boiler_cat_name = preg_replace('/\s+/', '-', $request->name);
        $boiler_cat_name = $boiler_cat_name .'-'.Str::random(6);

        $boiler->name            = $request->name;
        $boiler->slug            = $boiler_cat_name;
        $boiler->description     = $request->description;
        $boiler->brand           = $request->boilerbrand;
        
        // $boiler->brand_questions    = $brand_questions;
        
        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boilercat' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/boilercat');
          $image->move($destinationPath, $filename);
          $boiler->filename         = $filename;
        };

        $boiler->save();
        Session::flash('message', "Boiler Category added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilercategory');
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
        $boilercatory     = Boilercategory::find($id);
        $brands    = Boilerbrand::all();
        $title      = "Edit Boiler Category";
        return view('boilercategory.edit_boilercategory',compact('boilercatory','title', 'brands'));
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

        $brand_questions = htmlentities($request->brand_questions);
        
                    //   echo "<pre>"; 
            //   print_r($brand_questions); 
            //   print_r($request->all()); exit('ffff'); 

        
             // echo "<pre>"; print_r($brand_questions); print_r($request->all()); exit('ffff'); 

        $this->validate($request, [
            'name'             => 'required',
            'description'            => 'required',
            'filename'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        $boilercat = Boilercategory::find($id);
            if($boilercat->name != $request->name){
                $boiler_cat_name = preg_replace('/\s+/', '-', $request->name);
                $boiler_cat_name = $boiler_cat_name .'-'.Str::random(6);                        
                $boilercat->slug               = $boiler_cat_name;
            }
        $boilercat->name               = $request->name;
        
        $boilercat->description        = $request->description;

        // $boilercat->brand_questions    = $brand_questions;
        $boilercat->brand           = $request->boilerbrand;

        if($request->hasFile('filename')){
          $image = $request->file('filename');
          $filename = 'boiler_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $boilercat ) );
          $destinationPath          = public_path('/images/boilercat');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/boilercat/boiler->filename"));
          $boilercat->filename         = $filename;
        };


        $boilercat->save();
        Session::flash('message', "Boiler Category Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/boilercategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boiler             = Boilercategory::find($id);

        $boiler->delete();
        Session::flash('message', "boiler Category deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('/boiler/boilercategory');
    }
    
    public function featured(Request $request){
        // return response()->json($request->checked);
       if($request->checked == 0 ){
        Boilercategory::where('id',$request->boiler_id)->update(array('featured'=>  $request->checked));
        return response()->json('Featured updated');
        return true;
       }
        $count = Boilercategory::where('featured',1)->count();
        if($count == 0 || $count <= 9){
            Boilercategory::where('id',$request->boiler_id)->update(array('featured'=>  $request->checked));
            return response()->json('Featured updated');
            return true;
        }
        elseif($count > 9){
             return response()->json('Can not featured more than 10');
        }
        else{
            return response()->json('Featured is not working ');
        }
        
    }    
    
}
