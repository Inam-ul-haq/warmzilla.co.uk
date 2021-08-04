<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Session;
use App\Helpers\AuthHelper;
use Auth;

class OptionController extends Controller
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
        // echo $flag ; exit('   ooo');
        $data = [];
        // if($flag == 'brand'){
            
            $data['brands_info'] = getOption('brands_info'); 
            $data['questions'] = getOption('questions'); 
             $image = getOption('mainpage_image');
             if($image)
             {
                $data['image'] = $image->value;
             }
            $data['firstcontainer'] = getOption('firstcontainer'); 
             $image1 = getOption('mainpage_image1');
             if($image1)
             {
                $data['image1'] = $image1->value;
             }    
        // }
        
        return view('options.edit_options', $data);
    }
    
    public function pages($flag){
        // exit('here');
        $data = [];
        if($flag == 'brand'){
            $data['questions'] = getOption('brand_questions'); 
            $data['firstcontainer'] = getOption('brand_firstcontainer');     
            
            $data['flag'] = 'brand';
        }
        if($flag == 'finance'){
            $data['image'] = getOption('finance'); 
            $data['questions'] = getOption('finance_questions'); 
            $data['firstcontainer'] = getOption('finance_firstcontainer');     
            
            $data['flag'] = 'finance';
        }else{
            $data['questions'] = getOption('brand_questions'); 
            $data['firstcontainer'] = getOption('brand_firstcontainer');     
            
            $data['flag'] = 'brand';            
        }        
        
        return view('options.edit_options', $data);        
        
    }
    public function title(){

        $data = [];
        $data['titlehome_questions'] = getOption('titlehome_questions'); 
        $data['titlehome_firstcontainer'] = getOption('titlehome_firstcontainer');

        $data['flag'] = 'title';
       
        $data['titlecomparison_questions'] = getOption('titlecomparison_questions'); 
        $data['titlecomparison_firstcontainer'] = getOption('titlecomparison_firstcontainer');
       
         
        $data['titlelocation_questions'] = getOption('titlelocation_questions'); 
        $data['titlelocation_firstcontainer'] = getOption('titlelocation_firstcontainer');
 
       
        $data['titlecity_questions'] = getOption('titlecity_questions'); 
        $data['titlecity_firstcontainer'] = getOption('titlecity_firstcontainer');


        $data['titlecombi_questions'] = getOption('titlecombi_questions'); 
        $data['titlecombi_firstcontainer'] = getOption('titlecombi_firstcontainer');
       
         
        $data['titleregular_questions'] = getOption('titleregular_questions'); 
        $data['titleregular_firstcontainer'] = getOption('titleregular_firstcontainer');
 
       
        $data['titlesystem_questions'] = getOption('titlesystem_questions'); 
        $data['titlesystem_firstcontainer'] = getOption('titlesystem_firstcontainer');
        

         return view('options.edit_title' , $data);

    }
    
    public function comparison_page(){
      // dd(42);
        $data = [];
        $data['questions'] = getOption('comparison_page_questions'); 
        $data['firstcontainer'] = getOption('comparison_page_firstcontainer');
        $data['flag'] = 'comparison_page';
         $image = getOption('comparison_page');
         if($image)
         {
            $data['image'] = $image->value;
         }

         return view('options.edit_comparison_page' , $data);

    }
    public function comparison(){


        $data = [];
        $data['questions'] = getOption('comparison_questions'); 
        $data['firstcontainer'] = getOption('comparison_firstcontainer');
        $data['flag'] = 'comparison';
         $image = getOption('comparison');
         if($image)
         {
            $data['image'] = $image->value;
         }
        $data['comparison_questions_boilertype'] = getOption('comparison_questions_boilertype'); 
        $data['comparison_firstcontainer_boilertype'] = getOption('comparison_firstcontainer_boilertype');
       
         $image1 = getOption('comparison_boilertype');
         if($image1)
         {
            $data['image1'] = $image1->value;
         }
        $data['comparison_questions_kwoutput'] = getOption('comparison_questions_kwoutput'); 
        $data['comparison_firstcontainer_kwoutput'] = getOption('comparison_firstcontainer_kwoutput');
 
         $image2 = getOption('comparison_kwoutput');
         if($image2)
         {
            $data['image2'] = $image2->value;
         }
        $data['comparison_questions_boilerbrand'] = getOption('comparison_questions_boilerbrand'); 
        $data['comparison_firstcontainer_boilerbrand'] = getOption('comparison_firstcontainer_boilerbrand');
        $image3 = getOption('comparison_boilerbrand');
         if($image3)
         {
            $data['image3'] = $image3->value;
         }

         return view('options.edit_comparison' , $data);

    }

    
    public function finance(){
        $data = [];
        $data['questions'] = getOption('finance_questions'); 
        $data['firstcontainer'] = getOption('finance_firstcontainer');     
      
        $data['flag'] = 'finance';
	
  $image = getOption('finance_byingstep_img'); 
         if($image)
         {
            $data['image'] = $image->value;
         } 
        $data['finance_byingstep_img1'] = getOption('finance_byingstep_img1'); 
        $data['finance_byingstep_img2'] = getOption('finance_byingstep_img2'); 
        $data['finance_byingstep_img3'] = getOption('finance_byingstep_img3'); 
        
        $data['finance_byingstep_text1'] = getOption('finance_byingstep_text1'); 
        $data['finance_byingstep_text2'] = getOption('finance_byingstep_text2'); 
        $data['finance_byingstep_text3'] = getOption('finance_byingstep_text3'); 
        
        $data['guaranteed_slot'] = getOption('guaranteed_slot'); 
        
        
        if($image){
            $data['image']  = $image->value;
        }
        
        return view('options.edit_options_finance', $data);        
        
    }    
    
    public function boilerlocation(){
        $data = [];
        $data['firstcontainer'] = getOption('boilerlocation_firstcontainer');     
        $data['questions'] = getOption('boilerlocation_questions'); 
        
        $data['flag'] = 'boilerlocation';
        $image1 = getOption('boilerlocation_page_img'); 
        
        if($image1){
            $data['image']  = $image1->value;
        }
        
        $image2 = getOption('boiler_question_img'); 
        
        if($image2){
            $data['image2']  = $image2->value;
        }        
        
        
        return view('options.edit_options_boilerlocation', $data);        
        
    }    
    
    public function combiboiler(){
        $data = [];
        $data['firstcontainer'] = getOption('combiboiler_firstcontainer');     
        $data['questions'] = getOption('combiboiler_questions'); 
        
        $data['flag'] = 'combiboiler';
        $image1 = getOption('combiboiler_page_img'); 
        
        if($image1){
            $data['image']  = $image1->value;
        }
        
        $image2 = getOption('combiboiler_question_img'); 
        
        if($image2){
            $data['image2']  = $image2->value;
        }        
        
        
        return view('options.edit_options_combi', $data);        
        
    }            
    
    public function regularboiler(){
        $data = [];
        $data['firstcontainer'] = getOption('regularboiler_firstcontainer');     
        $data['questions'] = getOption('regularboiler_questions'); 
        
        $data['flag'] = 'regularboiler';
        $image1 = getOption('regularboiler_page_img'); 
        
        if($image1){
            $data['image']  = $image1->value;
        }
        
        $image2 = getOption('regularboiler_question_img'); 
        
        if($image2){
            $data['image2']  = $image2->value;
        }        
        
        
        return view('options.edit_options_regular', $data);        
        
    }        
    
    public function systemboiler(){
        $data = [];
        $data['firstcontainer'] = getOption('systemboiler_firstcontainer');     
        $data['questions'] = getOption('systemboiler_questions'); 
        
        $data['flag'] = 'systemboiler';
        $image1 = getOption('systemboiler_page_img'); 
        
        if($image1){
            $data['image']  = $image1->value;
        }
        
        $image2 = getOption('systemboiler_question_img'); 
        
        if($image2){
            $data['image2']  = $image2->value;
        }        
        
        
        return view('options.edit_options_system', $data);        
        
    }            
    public function boilerseo(){
      
          $data = [];
        $data['boiler_brands_title'] = getOption('boiler_brands_title');     
        $data['boiler_brands_description'] = getOption('boiler_brands_description');

        $data['boiler_comparison_title'] = getOption('boiler_comparison_title');     
        $data['boiler_comparison_description'] = getOption('boiler_comparison_description'); 

        $data['boiler_installation_locations_title'] = getOption('boiler_installation_locations_title');     
        $data['boiler_installation_locations_description'] = getOption('boiler_installation_locations_description'); 

        $data['boiler_finance_title'] = getOption('boiler_finance_title');     
        $data['boiler_finance_description'] = getOption('boiler_finance_description'); 

        $data['combi_boilers_title'] = getOption('combi_boilers_title');     
        $data['combi_boilers_description'] = getOption('combi_boilers_description'); 

        $data['system_boilers_title'] = getOption('system_boilers_title');     
        $data['system_boilers_description'] = getOption('system_boilers_description'); 

        $data['regular_boilers_title'] = getOption('regular_boilers_title');     
        $data['regular_boilers_description'] = getOption('regular_boilers_description');  
        
        $data['flag'] = 'boilerseo';
        return view('options.edit_options_boilerseo', $data);    
    }
    public function singleboiler(){
        $data = [];
        $data['firstcontainer'] = getOption('singleboiler_firstcontainer');     
        $data['questions'] = getOption('singleboiler_questions'); 
        
        $data['flag'] = 'singleboiler';
        $image1 = getOption('singleboiler_page_img'); 
        
        if($image1){
            $data['image']  = $image1->value;
        }
        
        $image2 = getOption('singleboiler_question_img'); 
        
        if($image2){
            $data['image2']  = $image2->value;
        }        
        
        
        return view('options.edit_options_singleboiler', $data);        
        
    }                
    public function comparisonupdate(){


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 

     if($request->belong == 'boilerseo') {
              # code...
         if(isset($request->boiler_brands_title)){
               $name = 'boiler_brands_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_brands_title ]);
             
            }
                   if(isset($request->boiler_brands_description)){
               $name = 'boiler_brands_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_brands_description ]);
             
            }
                   if(isset($request->boiler_comparison_title)){
               $name = 'boiler_comparison_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_comparison_title ]);
             
            }
                   if(isset($request->boiler_comparison_description)){
               $name = 'boiler_comparison_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_comparison_description ]);
             
            }
                   if(isset($request->boiler_installation_locations_title)){
               $name = 'boiler_installation_locations_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_installation_locations_title ]);
             
            }
                   if(isset($request->boiler_installation_locations_description)){
               $name = 'boiler_installation_locations_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_installation_locations_description ]);
             
            }
                   if(isset($request->boiler_finance_title)){
               $name = 'boiler_finance_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_finance_title ]);
             
            }
              if(isset($request->boiler_finance_description)){
               $name = 'boiler_finance_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->boiler_finance_description ]);
             
            }
              if(isset($request->combi_boilers_title)){
               $name = 'combi_boilers_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->combi_boilers_title ]);
             
            }
              if(isset($request->combi_boilers_description)){
               $name = 'combi_boilers_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->combi_boilers_description ]);
             
            }
              if(isset($request->system_boilers_title)){
               $name = 'system_boilers_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->system_boilers_title ]);
             
            }
              if(isset($request->regular_boilers_title)){
               $name = 'regular_boilers_title';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->regular_boilers_title ]);
             
            }
              if(isset($request->regular_boilers_description)){
               $name = 'regular_boilers_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->regular_boilers_description ]);
             
            }
              if(isset($request->system_boilers_description)){
               $name = 'system_boilers_description';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->system_boilers_description ]);
             
            }
             return redirect('/boiler/page/boilerseo');
            }
       if(isset($request->mainpage_image)){

                  $image2 = $request->file('mainpage_image');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'mainpage_image' ],['name'=>'mainpage_image' , 'value' => $filename2 ]);
                   return redirect('/boiler/options');
            }  
              
       if(isset($request->mainpage_image1)){

               $image2 = $request->file('mainpage_image1');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'mainpage_image1' ],['name'=>'mainpage_image1' , 'value' => $filename2 ]);
                   return redirect('/boiler/options');
        
       }
        if(isset($request->firstcontainer)){
    
            $name = 'firstcontainer';
            if(($request->belong != '' && $request->belong == 'finance')){
                     
                $name = 'finance_firstcontainer';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->firstcontainer ]);
                return redirect('/boiler/pages/'.$request->belong );
            }elseif ($request->belong == 'comparison') {
              # code...

               $name = 'comparison_firstcontainer';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );
            }elseif ($request->belong == 'comparison_page') {
              # code...

               $name = 'comparison_page_firstcontainer';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );
            }else{
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->firstcontainer ]);
                return redirect('/boiler/options');
            }
        }  
  if(isset($request->titlehome_firstcontainer))
        {
            $name = 'titlehome_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlehome_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titlecomparison_firstcontainer))
        {
            $name = 'titlecomparison_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlecomparison_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titlelocation_firstcontainer))
        {
            $name = 'titlelocation_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlelocation_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titlecombi_firstcontainer))
        {
            $name = 'titlecombi_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlecombi_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titleregular_firstcontainer))
        {
            $name = 'titleregular_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titleregular_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titlesystem_firstcontainer))
        {
            $name = 'titlesystem_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlesystem_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
          if(isset($request->titlecity_firstcontainer))
        {
            $name = 'titlecity_firstcontainer';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->titlecity_firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );

        }   
        if(isset($request->comparison_firstcontainer_boilertype))
        {
            $name = 'comparison_firstcontainer_boilertype';

                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->comparison_firstcontainer_boilertype ]);
                return redirect('/boiler/page/'.$request->belong );

        } 
        if(isset($request->comparison_firstcontainer_kwoutput))
        {
            $name = 'comparison_firstcontainer_kwoutput';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->comparison_firstcontainer_kwoutput ]);
                return redirect('/boiler/page/'.$request->belong );
        }
        if(isset($request->comparison_firstcontainer_boilerbrand))
        {
            $name = 'comparison_firstcontainer_boilerbrand';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->comparison_firstcontainer_boilerbrand ]);
                return redirect('/boiler/page/'.$request->belong );
        }
        if(isset($request->questions)){
            
            $name = 'questions';
            if($request->belong != '' && $request->belong == 'finance'){
                $name = 'finance_questions';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->questions ]);
                return redirect('/boiler/pages/'.$request->belong );
            }elseif ($request->belong == 'comparison') {
              # code...
               $name = 'comparison_firstcontainer';
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->firstcontainer ]);
                return redirect('/boiler/page/'.$request->belong );
            }            
            else{
                $affected = Option::updateOrCreate(['name'=>$name ],['name'=>$name , 'value' => $request->questions ]);
                return redirect('/boiler/options');
            }
        }
        
        if(isset($request->brands_info)){
            $affected = Option::updateOrCreate(['name'=>'brands_info' ],['brands_info'=>'brands_info' , 'value' => $request->brands_info ]);
            return redirect('/boiler/options');
        }
        
        // if()
        if($request->belong == 'comparison_page'){
          if(isset($request->comparison_page)){   
       // dd(wer);
                  $image2 = $request->file('comparison_page');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'comparison_page' ],['name'=>'comparison_page' , 'value' => $filename2 ]);
            }
                    return redirect('/boiler/page/comparison_page'); 
        }

        if($request->belong == 'comparison' ){
     
          
            if(isset($request->comparison)){   
       // dd(wer);
                  $image2 = $request->file('comparison');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'comparison' ],['name'=>'comparison' , 'value' => $filename2 ]);
            }  
              
              if(isset($request->comparison_boilertype)){
                $image2 = $request->file('comparison_boilertype');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'comparison_boilertype' ],['name'=>'comparison_boilertype' , 'value' => $filename2 ]);
              
              }
              if(isset($request->comparison_kwoutput)){
				
                $image2 = $request->file('comparison_kwoutput');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'comparison_kwoutput' ],['name'=>'comparison_kwoutput' , 'value' => $filename2 ]);
             
              }
              if(isset($request->comparison_boilerbrand)){
                $image2 = $request->file('comparison_boilerbrand');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');

                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'comparison_boilerbrand' ],['name'=>'comparison_boilerbrand' , 'value' => $filename2 ]);
            
              }
		 return redirect('/boiler/page/comparison');
              }
        if($request->belong == 'finance'){
//dd($request->all());
            if($request->finance_byingstep_img){            
                  $image = $request->file('finance_byingstep_img');
                  $filename = 'boiler' .time() . '.' . $image->getClientOriginalExtension();
                  $destinationPath          = public_path('/images/boilerfinance');
                  $image->move($destinationPath, $filename);
                  Option::updateOrCreate(['name'=>'finance_byingstep_img' ],['name'=>'finance_byingstep_img' , 'value' => $filename ]);
            }             
            if($request->finance_byingstep_img1){            
                  $image = $request->file('finance_byingstep_img1');
                  $filename = 'boiler' .time() . '.' . $image->getClientOriginalExtension();
                  $destinationPath          = public_path('/images/boilerfinance');
                  $image->move($destinationPath, $filename);
                  Option::updateOrCreate(['name'=>'finance_byingstep_img1' ],['name'=>'finance_byingstep_img1' , 'value' => $filename ]);
            }            
            
            if($request->finance_byingstep_img2){            
                  $image2 = $request->file('finance_byingstep_img2');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerfinance');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'finance_byingstep_img2' ],['name'=>'finance_byingstep_img2' , 'value' => $filename2 ]);
            }            
            
            if($request->finance_byingstep_img3){            
                  $image3 = $request->file('finance_byingstep_img3');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerfinance');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'finance_byingstep_img3' ],['name'=>'finance_byingstep_img3' , 'value' => $filename3 ]);
            }            
            
            if($request->finance_byingstep_text1){ 
                $affected = Option::updateOrCreate(['name'=>'finance_byingstep_text1' ],['name'=>'finance_byingstep_text1' , 'value' => $request->finance_byingstep_text1 ]);
            }   
            if($request->finance_byingstep_text2){
                $affected = Option::updateOrCreate(['name'=>'finance_byingstep_text2' ],['name'=>'finance_byingstep_text2' , 'value' => $request->finance_byingstep_text2 ]);
            }   
            if($request->finance_byingstep_text3){
                $affected = Option::updateOrCreate(['name'=>'finance_byingstep_text3' ],['name'=>'finance_byingstep_text3' , 'value' => $request->finance_byingstep_text3 ]);
            }
            if($request->guaranteed_slot){
                $affected = Option::updateOrCreate(['name'=>'guaranteed_slot' ],['name'=>'guaranteed_slot' , 'value' => $request->guaranteed_slot ]);
            }            
            
            return redirect('/boiler/page/finance');
        }

        if($request->belong == 'boilerlocation'){
            
            if($request->boilerlocation_page_img){            
                  $image2 = $request->file('boilerlocation_page_img');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerlocation');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'boilerlocation_page_img' ],['name'=>'boilerlocation_page_img' , 'value' => $filename2 ]);
            }            
            
            if($request->boiler_question_img){            
                  $image3 = $request->file('boiler_question_img');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerlocation');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'boiler_question_img' ],['name'=>'boiler_question_img' , 'value' => $filename3 ]);
            }            
            
            if($request->boilerlocation_firstcontainer){ 
                $affected = Option::updateOrCreate(['name'=>'boilerlocation_firstcontainer' ],['name'=>'boilerlocation_firstcontainer' , 'value' => $request->boilerlocation_firstcontainer ]);
            }   
            if($request->boilerlocation_questions){
                $affected = Option::updateOrCreate(['name'=>'boilerlocation_questions' ],['name'=>'boilerlocation_questions' , 'value' => $request->boilerlocation_questions ]);
            }               
            
            return redirect('/boiler/page/boilerLocation');
        }
        
        if($request->belong == 'combiboiler'){
            
            if($request->combiboiler_page_img){            
                  $image2 = $request->file('combiboiler_page_img');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerlocation');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'combiboiler_page_img' ],['name'=>'combiboiler_page_img' , 'value' => $filename2 ]);
            }            
            
            if($request->combiboiler_question_img){            
                  $image3 = $request->file('combiboiler_question_img');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerlocation');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'combiboiler_question_img' ],['name'=>'combiboiler_question_img' , 'value' => $filename3 ]);
            }            
            
            if($request->combiboiler_firstcontainer){ 
                $affected = Option::updateOrCreate(['name'=>'combiboiler_firstcontainer' ],['name'=>'combiboiler_firstcontainer' , 'value' => $request->combiboiler_firstcontainer ]);
            }   
            if($request->combiboiler_questions){
                $affected = Option::updateOrCreate(['name'=>'combiboiler_questions' ],['name'=>'combiboiler_questions' , 'value' => $request->combiboiler_questions ]);
            }               
            return redirect('/boiler/page/combiboiler');
        }
        
        if($request->belong == 'regularboiler'){
            
            if($request->regularboiler_page_img){            
                  $image2 = $request->file('regularboiler_page_img');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerlocation');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'regularboiler_page_img' ],['name'=>'regularboiler_page_img' , 'value' => $filename2 ]);
            }            
            
            if($request->regularboiler_question_img){            
                  $image3 = $request->file('regularboiler_question_img');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerlocation');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'regularboiler_question_img' ],['name'=>'regularboiler_question_img' , 'value' => $filename3 ]);
            }            
            
            if($request->regularboiler_firstcontainer){ 
                $affected = Option::updateOrCreate(['name'=>'regularboiler_firstcontainer' ],['name'=>'regularboiler_firstcontainer' , 'value' => $request->regularboiler_firstcontainer ]);
            }   
            if($request->regularboiler_questions){
                $affected = Option::updateOrCreate(['name'=>'regularboiler_questions' ],['name'=>'regularboiler_questions' , 'value' => $request->regularboiler_questions ]);
            }               
            return redirect('/boiler/page/regularboiler');
        }        
        
        if($request->belong == 'systemboiler'){
        
        // echo "<pre>"; print_r($request->all()); exit('okoko');      
            if($request->systemboiler_page_img){            
                  $image2 = $request->file('systemboiler_page_img');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerlocation');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'systemboiler_page_img' ],['name'=>'systemboiler_page_img' , 'value' => $filename2 ]);
            }            
            
            if($request->systemboiler_question_img){            
                  $image3 = $request->file('systemboiler_question_img');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerlocation');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'systemboiler_question_img' ],['name'=>'systemboiler_question_img' , 'value' => $filename3 ]);
            }            
            
            if($request->systemboiler_firstcontainer){ 
                $affected = Option::updateOrCreate(['name'=>'systemboiler_firstcontainer' ],['name'=>'systemboiler_firstcontainer' , 'value' => $request->systemboiler_firstcontainer ]);
            }   
            if($request->systemboiler_questions){
                $affected = Option::updateOrCreate(['name'=>'systemboiler_questions' ],['name'=>'systemboiler_questions' , 'value' => $request->systemboiler_questions ]);
            }               
            return redirect('/boiler/page/systemboiler');
        }
        
        if($request->belong == 'singleboiler'){
            // echo "<pre>"; print_r($request->all()); exit('koko');
            if($request->singleboiler_page_img){            
                  $image2 = $request->file('singleboiler_page_img');
                  $filename2 = 'boiler' .time() . '.' . $image2->getClientOriginalExtension();
                  $destinationPath2          = public_path('/images/boilerlocation');
                  $image2->move($destinationPath2, $filename2);
                  Option::updateOrCreate(['name'=>'singleboiler_page_img' ],['name'=>'singleboiler_page_img' , 'value' => $filename2 ]);
            }            
            
            if($request->singleboiler_question_img){            
                  $image3 = $request->file('singleboiler_question_img');
                  $filename3 = 'boiler' .time() . '.' . $image3->getClientOriginalExtension();
                  $destinationPath3          = public_path('/images/boilerlocation');
                  $image3->move($destinationPath3, $filename3);
                  Option::updateOrCreate(['name'=>'singleboiler_question_img' ],['name'=>'singleboiler_question_img' , 'value' => $filename3 ]);
            }            
            
            if($request->singleboiler_firstcontainer){ 
                $affected = Option::updateOrCreate(['name'=>'singleboiler_firstcontainer' ],['name'=>'singleboiler_firstcontainer' , 'value' => $request->singleboiler_firstcontainer ]);
            }   
            if($request->singleboiler_questions){
                $affected = Option::updateOrCreate(['name'=>'singleboiler_questions' ],['name'=>'singleboiler_questions' , 'value' => $request->singleboiler_questions ]);
            }               
            return redirect('/boiler/page/singleboiler');
            
        }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
