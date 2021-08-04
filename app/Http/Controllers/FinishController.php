<?php

namespace App\Http\Controllers;

use App\Models\Finish;
use App\Models\Boilerbrand;
use App\Models\Boilertype;
use App\Models\Boilercategory;
use App\Models\Boiler;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use App\Helpers\AuthHelper;
use Auth;

class FinishController extends Controller
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
         if(isset($_GET['search']) && $_GET['search'] ){
            
            $finishs     = Boiler::with('brands')->with('category')->where('name','like',  '%'.$_GET['search'].'%' )->orderBy('updated_at', 'DESC')->paginate();
        // echo "<pre>"; print_r($finishs); print_r($_GET['search']); exit('kok');
            
        }else{
            $finishs     = Boiler::with('brands')->with('category')->orderBy('updated_at', 'DESC')->paginate(10);    
        }
        
	$title      = 'Boilers'; 
        return view('finish.view_finish',['title'=>$title ,'finishs'=>$finishs]);        
        
   }
    
    public function featured(Request $request){
        
        $count = Boiler::where('featured',1)->count();
        if($count == 0 || $count <= 9){
            Boiler::where('id',$request->boiler_id)->update(array('featured'=>  $request->checked));
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
    
    public function paginate($page = 3, $limit = 10) 
    { 
        $end =  $limit * $page;
        if($page > 1){
            $start = ($page-1) * $limit ;     
        }
        else{
            $start =1;
        }
        
        $finish     = Boiler::with('brands')->with('category')->orderBy('updated_at', 'DESC')->get();
        
        echo "<pre>"; print_r($finish); exit(' pp'); 
        
        $title      = 'Boilers'; 
        return view('finish.view_finish',compact('finish','title'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $boilertypes        = Boilertype::all();
        $boilerbrands       = Boilerbrand::all();
        $boilercategoires   = Boilercategory::all();
        $fueltype = array(
            array( 'id' => '1', 'name' => 'gas' ),
            array( 'id' => '2', 'name' => 'oil' ),
            array( 'id' => '3', 'name' => 'lpg' )                        
        );
        $warranty = [0,1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20];
        $kwoutputs = [1,2,3,4,5,6 ,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,45,46];
        $fueltype = json_encode($fueltype); 
        $fueltypes = json_decode($fueltype, false); 

        $title = "Add Boiler";
        return view('finish.create_finish',compact('boilertypes','boilerbrands','title', 'fueltypes', 'kwoutputs', 'warranty', 'boilercategoires'));
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
            'finish_name'        => 'required',
            // 'finish_price'       => 'required',
            'boilerbrand'        => 'required',
            'boilercategory'     => 'required',
            'boilertype'         => 'required',
            'kwoutput'           => 'required',
            'finish_img'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $finish = new Boiler;

        $boiler_name = preg_replace('/\s+/', '-', $request->finish_name);
      //  $boiler_name = $boiler_name .'-'.Str::random(6);
        
        $finish->name               = $request->finish_name;
        $finish->slug               = strtolower($boiler_name);
        $finish->description        = $request->description;
        $finish->review_section     = $request->review_section;
        // $finish->price              = $request->finish_price;
        $finish->boilerbrand        = $request->boilerbrand;
        $finish->boilertype         = $request->boilertype;
        $finish->boilercategory     = $request->boilercategory;
        $finish->brochure_url       = $request->brochure_url;
        
        
        
        
        $finish->kwoutput           = $request->kwoutput;    
        
        
        $finish->kw_output_input    = $request->kw_output_input;   
        $finish->review             = $request->review;  
        
        
        
        $finish->dimensions         = $request->dimensions;
    	  $finish->flowrate           = $request->flowrate;
        $finish->erprating          = $request->erprating;
        $finish->warranty           = $request->warranty;
        $finish->fuel_type          = $request->fuel_type;
        
        $finish->energyefficiency   = $request->energyefficiency;
        $finish->features           = $request->features;
        
        


        if($request->hasFile('finish_img')){
          $image = $request->file('finish_img');
          $filename = 'finish_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/finish');
          $image->move($destinationPath, $filename);
          $finish->filename         = $filename;
        };
        
        if($request->hasFile('review_img1')){
          $image = $request->file('review_img1');
          $filename1 = 'review_img1_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath1          = public_path('/images/finish');
          $image->move($destinationPath1, $filename1);
          $finish->review_img1         = $filename1;
        };
        
        if($request->hasFile('review_img2')){
          $image = $request->file('review_img2');
          $filename2 = 'review_img2_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath2          = public_path('/images/finish');
          $image->move($destinationPath2, $filename2);        
          $finish->review_img2         = $filename2;
        };        
                
         $finish->meta_name   = $request->meta_name;
         $finish->meta_description  = $request->meta_description;

        
        $finish->save();
        // print_r($finish); exit('kkoko');  
        
        Session::flash('message', "Boiler added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/finish');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
   {
       dd('show');
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finish         = Boiler::find($id);
        $boilertypes     = Boilertype::all();
        $boilerbrands    = Boilerbrand::all();
        $boilercategoires   = Boilercategory::all();
        $warranty = [0,1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20];
        $kwoutputs = [1,2,3,4,5,6 ,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,45,46];
        $title      = "Edit Finish";
        
         $fueltypes = (object) array(
            (object) array( 'id' => '1', 'name' => 'gas' ),
            (object) array( 'id' => '2', 'name' => 'oil' ),
            (object) array( 'id' => '3', 'name' => 'lpg' )                        
        );
        // echo "<pre>"; print_r($finish); exit('rr'); 
        return view('finish.edit_finish',compact('finish','title', 'boilertypes', 'boilerbrands', 'warranty', 'kwoutputs','fueltypes', 'boilercategoires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "<pre>"; print_r($request->all()); exit('rr'); 
        $this->validate($request, [
            'finish_name'           => 'required',
            // 'finish_price'          => 'required',
            'boilerbrand'           => 'required',
            'boilertype'            => 'required',
            'boilercategory'        => 'required',
            'kwoutput'           => 'required',
            'finish_img'            => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $finish = Boiler::find($id);
        // dd($finish->filename);
        $finish->name               = $request->finish_name;
        $finish->description        = $request->description;
        $finish->review_section     = $request->review_section;
        // $finish->price              = $request->finish_price;
        $finish->boilerbrand        = $request->boilerbrand;
        $finish->boilertype         = $request->boilertype;
        $finish->boilercategory     = $request->boilercategory;
        $finish->kwoutput           = $request->kwoutput;
        // if($request->kwoutput){
        //     $finish->kwoutput           = implode(',' , $request->kwoutput);    
        // }
        if($request->fuel_type){
            $finish->fuel_type           = $request->fuel_type;
        }
        $finish->brochure_url       = $request->brochure_url;
        
        $finish->dimensions         = $request->dimensions;
        $finish->flowrate           = $request->flowrate;
        $finish->erprating          = $request->erprating;
        $finish->warranty           = $request->warranty;
        $finish->energyefficiency   = $request->energyefficiency;
        $finish->features           = $request->features;

          $finish->meta_name   = $request->meta_name;
         $finish->meta_description  = $request->meta_description;

        $finish->kw_output_input    = $request->kw_output_input;   
        $finish->review             = $request->review;   
        

        if($request->hasFile('finish_img')){
          $image = $request->file('finish_img');
          $filename = 'finish_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath          = public_path('/images/finish');
          $image->move($destinationPath, $filename);
          $fileRemove               = @unlink(public_path("images/finish/$finish->filename"));
          $finish->filename         = $filename;
        };
        
        if($request->hasFile('review_img1')){
          $image = $request->file('review_img1');
          $filename1 = 'review_img1_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath1          = public_path('/images/finish');
          $image->move($destinationPath1, $filename1);
          if($finish->review_img1){
              $fileRemove               = @unlink(public_path("images/finish/$finish->review_img1"));
          }
          $finish->review_img1         = $filename1;
        };
        
        if($request->hasFile('review_img2')){
          $image = $request->file('review_img2');
          $filename2 = 'review_img2_' .time() . '.' . $image->getClientOriginalExtension();
          $destinationPath2          = public_path('/images/finish');
          $image->move($destinationPath2, $filename2);
          if($finish->review_img2){
              $fileRemove               = @unlink(public_path("images/finish/$finish->review_img2"));
          }          
          $finish->review_img2         = $filename2;
        };        
                
        
        $finish->save();
        Session::flash('message', "Boiler Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/boiler/finish');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finish             = Boiler::find($id);
        if($finish->filename){
            $fileRemove         = @unlink(public_path("images/finish/$finish->filename"));
        }

        $finish->delete();
        Session::flash('message', "Boiler deleted successfully!");
        Session::flash('alert-class', 'alert-success');
        
        return redirect('/boiler/finish');
    }
    
    public function onchange(Request $request){
        
        $change = $request->get('change'); 
        if($request->get('flag') == 'brand'){
            
            $allcats = Boilercategory::where('brand', $change)->get();
            $html = '';
            $allcats = $allcats->toArray();
            if(!empty($allcats)){
                foreach($allcats as $allcat){
                    $html .='<option value="'.$allcat['id'].'" > '.$allcat['name'].'  <small>('.$allcat['description'].')</small></option>';
                }
            }else{
                $html .='<option  disabled> NO Category Exists</option>';
            }
            echo $html; die();
        }
    }
    
    
}
