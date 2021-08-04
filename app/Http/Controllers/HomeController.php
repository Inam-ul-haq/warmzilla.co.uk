<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\AuthHelper;
use App\Models\Boilerbrand;
use App\Models\Boilercategory;
use App\Models\Boilertype;
use App\Models\Boilerlocation;
use App\Models\Boilerlocationarea;
use App\Models\Finish;
use App\Models\Boiler;
use Session;
use DB;
use App\Models\Option;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
class HomeController extends Controller
{
	
    public function __construct()
    {

    }	

	public function index(){
		$data['brands'] = Boilerbrand::orderBy('name')->get();
$seotitle = Option::where('name','=','boiler_brands_title')->first();       
 $seodescription = Option::where('name','=','boiler_brands_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
		
		$data['title'] = 'Welcome To Warm Zilla';
		return view('welcome', $data);
	}
	public function boilerComparison(){
		
		$compare = Session::get('compare');
		$data['boilers'] = array();
		if($compare){
			$data['boilers'] = Boiler::with('brands')->whereIn('id',$compare)->get();
		}
		$data['title'] = 'Boiler Comparison';
		return view('boilercomparison', $data);
	}
	public function boilerFinance(){
		$seotitle = Option::where('name','=','boiler_finance_title')->first();       
 $seodescription = Option::where('name','=','boiler_finance_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
		$data['title'] = 'Boiler Finance';
		return view('boilerfinance', $data);
	}		
	public function boilerType(){
		$data['title'] = 'System Boilers';
		return view('boilertype', $data);
	}
	public function compare(Request $request){

		$compare = Session::get('compare');
		if($compare){

			if(count($compare) == 3){
				
				return response()->json('limitout');
			}
			elseif( in_array($request->boiler_id, $compare) )
			{
			    return response()->json('alreadyadded');
			}
			else
			{
				array_push($compare, $request->boiler_id);
				Session::put('compare', $compare);	
				Session::save();					
			}
		}
		else{
			Session::put('compare', [$request->boiler_id]);	
			Session::save();
		}
		$e = Session::get('compare');

    	return response()->json(true);
		
	}	
	
	public function deleteSessionItems(Request $request){
	
	    
	    $compare = Session::get('compare');
	    $slug = $request->slug;
	
	    if(is_array($slug)){
	    $newCompare = '';
	    foreach ($slug as $slug) {
        				Session::put('compare', $newCompare);	
        				Session::save();
	    }

	   	return response()->json(true);
	    }
	   
	    if(in_array($request->slug , $compare )){
	       $newCompare = $compare;
	       if(count($compare)>1 ){
	           foreach($compare as $key => $com){
	               if($com == $request->slug){
	                    unset($newCompare[$key]);
        				Session::put('compare', $newCompare);	
        				Session::save();
        				return response()->json(true);
	               }
	           }
	       }else{
	           Session::forget('compare');
	           return response()->json(true);
	       }
	    }
	}

    public function boiler(){
        $data['title'] = 'Boilers';
		return view('boiler', $data);
    }

	public function brands($where = '', $flag ='',  $product = ''){
		
        $compare = Session::get('compare');

		if($where  && !$flag && !$product){
			
			$brand = Boilerbrand::where('slug', $where )->value('id');
			$data['boilers']  = Boiler::with('brands', 'brands')->where('boilerbrand',$brand)->get();
			
			$data['brand_filter'] = $where;

		}
		else if($where  && $flag && !$product){

				parse_str($where, $res);
// echo "<pre>"; print_r($res); exit('thi'); 				
				if(!empty($res['q'])){
				    
				    $fuel_type =[];
				    $type =[];
				    
				    $boilers = Boiler::with('brands');
				    
				    if( isset($res['q']['fuel_type'])  ){
				        $fuel_type = $res['q']['fuel_type'];    
				        $boilers->whereIn('fuel_type',$fuel_type);
				    }
				    if( isset($res['q']['type'])  ){
				        $type = $res['q']['type'];
				        $boilers->whereIn('boilertype',$type );
				    }
				    
				    if( isset($res['q']['kwoutput'])  ){
				        
				        $search = [];
				        $whereFrom ='';
				        $whereTo ='';
				        foreach($res['q']['kwoutput'] as $kw){
				            
				            if($kw == '11-20'){
				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
				            }
				            if($kw =='21-30'){
				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
				            }
				            if($kw == '30'){
				                array_push($search, 31,32,33,34,35,36 ,37,38,39,40);
				            }				            
				        }
				        $kwoutput = $res['q']['kwoutput'];
				        $boilers->whereIn('kwoutput',$search );
				        // echo "<pre>"; print_r($search); exit('ooo'); 
				    }
                        
				    if( isset($res['q']['brand'])  ){
				        $brand = $res['q']['brand'];
				        $boilers->whereIn('boilerbrand',$brand );
				    }
				    
				    $boilers->orderBy('id', 'DESC');
				    $data['boilers'] = $boilers->get(); 
				    $boilerIds = $boilers->pluck('boilercategory'); 
				    $boilerIds = $boilerIds->toArray();
				    $data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(10)->get();	
				    
				}
				
				else{
					$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(10)->get();
					
					$data['brand_filter'] = $where;					
				}					
					
				$data['brand_filter'] = $res;

		}
		else if($where  && $flag && $product){
		    
			$brandd = Boilerbrand::where('slug', $where )->value('id');

        	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
        						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();
        						//dd($data['boiler']);	
        	SEOMeta::setTitle($data['boiler']->meta_name);
            SEOMeta::setDescription($data['boiler']->meta_description);	
        	$data['brand_filter'] = $where;
        	
        	$data['title'] = 'Boiler';
		    return view('boiler', $data);
		}
		else{
			$data['brand_filter'] = '';
			$seotitle = Option::where('name','=','boiler_comparison_title')->first();       
 $seodescription = Option::where('name','=','boiler_comparison_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
			$boilerscat = Boiler::pluck('boilercategory')->toArray(); 
			if($boilerscat){
			    
			    $data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilerscat )->orderBy('featured', 'DESC')->limit(10)->get();	    
			}else{
			    $data['categories']= array();
			}
			// echo "<pre>"; print_r($data['categories']); exit('cc');	    
			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();

			
		}
		$data['route'] = 'boiler/boiler-brands';
		$data['types'] = Boilertype::all();
		$data['brands'] = Boilerbrand::all();
		$data['title'] = 'System Boilers';
		$data['brands_info'] = getOption('brands_info'); 
		// echo "<pre>"; print_r($data['boilers']); exit(' oooo'); 
		return view('brands', $data);
	}


public function brand($where = '', $flag ='',  $product = ''){
		
		if($where  && !$flag && !$product){

			$singlebrand = Boilerbrand::where('slug', $where )->get()->first();
			SEOMeta::setTitle($singlebrand->meta_name);
            SEOMeta::setDescription($singlebrand->meta_description);
			$brand = $singlebrand->id;
			$data['brand'] = $singlebrand;
			$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->get();
			
			$boilers  = Boiler::with('brands')->where('boilerbrand',$brand);
			
			
			$boilerIds = $boilers->pluck('boilercategory'); 
			$boilerIds = $boilerIds->toArray();
			
			$data['categories'] = Boilercategory::with('boilers')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(10)->get();	
			
			$data['brand_filter']['product'] = $where;
			
			
		}
		else if($where  && $flag && !$product){

				parse_str($where, $res);
    			$singlebrand = Boilerbrand::where('slug', $res['product'] )->get()->first();
    			// SEOMeta::setTitle($singlebrand->meta_name);
       //          SEOMeta::setDescription($singlebrand->meta_description);
    			$brand = $singlebrand->id;
    			$data['brand'] = $singlebrand;		        		
				
				$brand = Boilerbrand::pluck('id')->toArray();
        	
				if(!empty($res['q'])){
				    
                    $fuel_type =[];
				    $type =[];
				    
				    $boilers = Boiler::with('brands')->where('boilerbrand', $singlebrand->id);

				    
				    if( isset($res['q']['fuel_type'])  ){
				        $fuel_type = $res['q']['fuel_type'];    
				        $boilers->whereIn('fuel_type',$fuel_type);
				    }
				    if( isset($res['q']['type'])  ){
				        $type = $res['q']['type'];
				        $boilers->whereIn('boilertype',$type );
				    }
                    
                    if( isset($res['q']['kwoutput'])  ){
				        
				        $search = [];
				        $whereFrom ='';
				        $whereTo ='';
				        foreach($res['q']['kwoutput'] as $kw){
				            
				            if($kw == '11-20'){
				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
				            }
				            if($kw =='21-30'){
				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
				            }
				            if($kw == '30'){
				                array_push($search, 31,32,33,34,35,36 ,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60);
				           
 }				            
				        }
				        $kwoutput = $res['q']['kwoutput'];
				        $boilers->whereIn('kwoutput',$search );
				    }				    
				    
				    // if( isset($res['q']['kwoutput'])  ){
				    //     $kwoutput = $res['q']['kwoutput'];
				    //     $boilers->whereIn('kwoutput',$kwoutput );
				    // }
				    
				    $data['boilers'] = $boilers->get(); 
				    $boilerIds = $boilers->pluck('boilercategory'); 
				    $boilerIds = $boilerIds->toArray();
				    $data['categories'] = Boilercategory::with('boilers')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(10)->get();	
				    
					
				}
				else{
					
					// $data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(10)->get();
					// $data['brand_filter'] = $res;
						$where = explode ("=", $where);
	// $res['product'] = $where['1'];
            $where = $where['1'];
			$singlebrand = Boilerbrand::where('slug', $where )->get()->first();
			$brand = $singlebrand->id;
			$data['brand'] = $singlebrand;
			$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->get();
			SEOMeta::setTitle($data['boiler']->meta_name);
            SEOMeta::setDescription($data['boiler']->meta_description);
			$boilers  = Boiler::with('brands')->where('boilerbrand',$brand);
			
			
			$boilerIds = $boilers->pluck('boilercategory'); 
			$boilerIds = $boilerIds->toArray();
			
			$data['categories'] = Boilercategory::with('boilers')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(10)->get();	
			
			$data['brand_filter']['product'] = $where;					
				}					
					
				$data['brand_filter'] = $res;

		}
		else if($where  && $flag && $product){
		    
			$brandd = Boilerbrand::where('slug', $where )->value('id');
        	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
        						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();		
        	;
			SEOMeta::setTitle($data['boiler']->meta_name);
            SEOMeta::setDescription($data['boiler']->meta_description);
        	$data['brand_filter'] = $where;
        	
        	$data['title'] = 'Boiler';
		    return view('boiler', $data);
		}
		else{
			$data['brand_filter'] = '';
			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();	
		}
		
		$data['types'] = Boilertype::all();
		$data['title'] = 'System Boilers';
		

		
		
		return view('brand', $data);
	}

	public function combi($where = '', $flag ='', $product = '')

	{

		if($where  && !$flag && !$product){
			
			$brand = Boilerbrand::where('slug', $where )->value('id');
			$data['boilers']  = Boiler::with('brands', 'brands')->where('boilerbrand',$brand)->limit(10)->get();
			$data['brand_filter'] = $where;

		}
		else if($where  && $flag && !$product){

				parse_str($where, $res);

				
				if(!empty($res['q'])){
				    
				    $fuel_type =[];
				    $type =[];
				    
				    $boilers = Boiler::with('brands');
				    
				    if( isset($res['q']['fuel_type'])  ){
				        $fuel_type = $res['q']['fuel_type'];    
				        $boilers->whereIn('fuel_type',$fuel_type);
				    }
				    if( isset($res['q']['type'])  ){
				        $type = $res['q']['type'];
				        $boilers->whereIn('boilertype',$type );
				    }
				    
				    if( isset($res['q']['kwoutput'])  ){
				        
				        $search = [];
				        $whereFrom ='';
				        $whereTo ='';
				        foreach($res['q']['kwoutput'] as $kw){
				            
				            if($kw == '11-20'){
				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
				            }
				            if($kw =='21-30'){
				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
				            }
				            if($kw == '30'){
				                array_push($search, 31,32,33,34,35,36 ,37,38,39,40);
				            }				            
				        }
				        $kwoutput = $res['q']['kwoutput'];
				        $boilers->whereIn('kwoutput',$search );
				    }

				    if( isset($res['q']['brand'])  ){
				        $brand = $res['q']['brand'];
				        $boilers->whereIn('boilerbrand',$brand );
				    }
				    
				    $boilers->where('boilertype', 1 );
				    $boilers->orderBy('id', 'DESC');
				    $data['boilers'] = $boilers->get(); 
				    $boilerIds = $boilers->pluck('boilercategory'); 
				    $boilerIds = $boilerIds->toArray();
				    $data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(10)->get();	
				    
				}
				
				else{
					$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(10)->get();
					$data['brand_filter'] = $where;					
				}					
					
				$data['brand_filter'] = $res;

		}
		else if($where  && $flag && $product){
		    
			$brandd = Boilerbrand::where('slug', $where )->value('id');
        	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
        						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();		
        	$data['brand_filter'] = $where;
        	
        	$data['title'] = 'Boiler';
		    return view('boiler', $data);
		}
		else{
			$data['brand_filter'] = '';
			
			$boilersIds = Boiler::with('brands')->where('boilertype', 1 )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			
			$data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(10)->get();	
				    
			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();
			
		}


		$data['image1'] ='';
		$image = getOption('combiboiler_page_img');
		if($image){
		    $data['image1'] = $image->value;
		}
		
		$data['image2'] ='';
		$image2 = getOption('combiboiler_question_img');
		if($image2){
		    $data['image2'] = $image2->value;
		}	
		
		$data['firstcontainer'] ='';
		$combiboiler_firstcontainer = getOption('combiboiler_firstcontainer');
		if($combiboiler_firstcontainer){
		    $data['firstcontainer'] = $combiboiler_firstcontainer->value;
		}
		
		$data['questions'] ='';
		$combiboiler_questions = getOption('combiboiler_questions');
		if($combiboiler_questions){
		    $data['questions'] = $combiboiler_questions->value;
		}		

		$seotitle = Option::where('name','=','combi_boilers_title')->first();       
 $seodescription = Option::where('name','=','combi_boilers_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
		
// 		$data['types'] = Boilertype::all();
        $data['route'] = 'boiler/combi-boilers';
		$data['brands'] = Boilerbrand::all();
		$data['heading'] = 'Combi';
		$data['title'] = 'Combi Boilers';
		// dd($data);
		return view('boilertype', $data);
	}

    public function system($where = '', $flag ='', $product = ''){

		if($where  && !$flag && !$product){
			
			$brand = Boilerbrand::where('slug', $where )->value('id');
			$data['boilers']  = Boiler::with('brands', 'brands')->where('boilerbrand',$brand)->get();
			$data['brand_filter'] = $where;

		}
		else if($where  && $flag && !$product){

				parse_str($where, $res);
				
				if(!empty($res['q'])){
				    
				    $fuel_type =[];
				    $type =[];
				    
				    $boilers = Boiler::with('brands');
				    
				    if( isset($res['q']['fuel_type'])  ){
				        $fuel_type = $res['q']['fuel_type'];    
				        $boilers->whereIn('fuel_type',$fuel_type);
				    }
				    if( isset($res['q']['type'])  ){
				        $type = $res['q']['type'];
				        $boilers->whereIn('boilertype',$type );
				    }
				    
				    if( isset($res['q']['kwoutput'])  ){
				        
				        $search = [];
				        $whereFrom ='';
				        $whereTo ='';
				        foreach($res['q']['kwoutput'] as $kw){
				            
				            if($kw == '11-20'){
				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
				            }
				            if($kw =='21-30'){
				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
				            }
				            if($kw == '30'){
				                array_push($search, 31,32,33,34,35,36 ,37,38,39,40);
				            }				            
				        }
				        $kwoutput = $res['q']['kwoutput'];
				        $boilers->whereIn('kwoutput',$search );
				    }

				    if( isset($res['q']['brand'])  ){
				        $brand = $res['q']['brand'];
				        $boilers->whereIn('boilerbrand',$brand );
				    }
				    
				    $boilers->where('boilertype', 2 );
				    $boilers->orderBy('id', 'DESC');
				    $data['boilers'] = $boilers->get(); 
				    $boilerIds = $boilers->pluck('boilercategory'); 
				    $boilerIds = $boilerIds->toArray();
				    $data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(30)->get();	
				    
				}
				
				else{
					$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(30)->get();
					$data['brand_filter'] = $where;					
				}					
					
				$data['brand_filter'] = $res;

		}
		else if($where  && $flag && $product){
		    
			$brandd = Boilerbrand::where('slug', $where )->value('id');
        	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
        						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();		
        	$data['brand_filter'] = $where;
        	
        	$data['title'] = 'Boiler';
		    return view('boiler', $data);
		}
		else{
			$data['brand_filter'] = '';
			
			$boilersIds = Boiler::with('brands')->where('boilertype', 2 )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			
			$data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(10)->get();	
				    
			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();
			
		}
		
		$data['image1'] ='';
		$image = getOption('systemboiler_page_img');
		if($image){
		    $data['image1'] = $image->value;
		}
		
		$data['image2'] ='';
		$image2 = getOption('systemboiler_question_img');
// 		echo "<pre>"; print_r($image2); exit('ff'); 
		if($image2){
		    $data['image2'] = $image2->value;
		}	
		
		$data['firstcontainer'] ='';
		$systemboiler_firstcontainer = getOption('systemboiler_firstcontainer');
		if($systemboiler_firstcontainer){
		    $data['firstcontainer'] = $systemboiler_firstcontainer->value;
		}
		
		$data['questions'] ='';
		$systemboiler_questions = getOption('systemboiler_questions');
		if($systemboiler_questions){
		    $data['questions'] = $systemboiler_questions->value;
		}				
		
		$seotitle = Option::where('name','=','system_boilers_title')->first();       
 $seodescription = Option::where('name','=','system_boilers_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
// 		$data['types'] = Boilertype::all();
        $data['route'] = 'boiler/system-boilers';
		$data['brands'] = Boilerbrand::all();
		$data['heading'] = 'System';
		$data['title'] = 'System Boilers';
		return view('boilertype', $data);
	}

    public function regular($where = '', $flag ='', $product = ''){
        

		if($where  && !$flag && !$product){
			
			$brand = Boilerbrand::where('slug', $where )->value('id');
			$data['boilers']  = Boiler::with('brands', 'brands')->where('boilerbrand',$brand)->get();
			$data['brand_filter'] = $where;

		}
		else if($where  && $flag && !$product){

				parse_str($where, $res);
				
				if(!empty($res['q'])){
				    
				    $fuel_type =[];
				    $type =[];
				    
				    $boilers = Boiler::with('brands');
				    
				    if( isset($res['q']['fuel_type'])  ){
				        $fuel_type = $res['q']['fuel_type'];    
				        $boilers->whereIn('fuel_type',$fuel_type);
				    }
				    if( isset($res['q']['type'])  ){
				        $type = $res['q']['type'];
				        $boilers->whereIn('boilertype',$type );
				    }
				    
				    if( isset($res['q']['kwoutput'])  ){
				        
				        $search = [];
				        $whereFrom ='';
				        $whereTo ='';
				        foreach($res['q']['kwoutput'] as $kw){
				            
				            if($kw == '11-20'){
				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
				            }
				            if($kw =='21-30'){
				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
				            }
				            if($kw == '30'){
				                array_push($search, 31,32,33,34,35,36 ,37,38,39,40);
				            }				            
				        }
				        $kwoutput = $res['q']['kwoutput'];
				        $boilers->whereIn('kwoutput',$search );
				    }

				    if( isset($res['q']['brand'])  ){
				        $brand = $res['q']['brand'];
				        $boilers->whereIn('boilerbrand',$brand );
				    }
				    
				    $boilers->where('boilertype', 3 );
				    $boilers->orderBy('id', 'DESC');
				    $data['boilers'] = $boilers->get(); 
				    $boilerIds = $boilers->pluck('boilercategory'); 
				    $boilerIds = $boilerIds->toArray();
				    $data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilerIds)->orderBy('id', 'DESC')->limit(30)->get();	
				    
				}
				
				else{
					$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(30)->get();
					$data['brand_filter'] = $where;					
				}					
					
				$data['brand_filter'] = $res;

		}
		else if($where  && $flag && $product){
		    
			$brandd = Boilerbrand::where('slug', $where )->value('id');
        	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
        						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();		
        	$data['brand_filter'] = $where;
        	
        	$data['title'] = 'Boiler';
		    return view('boiler', $data);
		}
		else{
			$data['brand_filter'] = '';
			
			$boilersIds = Boiler::with('brands')->where('boilertype', 3 )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			
			$data['categories'] = Boilercategory::with('boilers', 'brands')->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(10)->get();	
				    
			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();
			
		}
		
		
		
		$data['image1'] ='';
		$image = getOption('regularboiler_page_img');
		if($image){
		    $data['image1'] = $image->value;
		}
		
		$data['image2'] ='';
		$image2 = getOption('regularboiler_question_img');
		if($image2){
		    $data['image2'] = $image2->value;
		}	
		
		$data['firstcontainer'] ='';
		$regularboiler_firstcontainer = getOption('regularboiler_firstcontainer');
		if($regularboiler_firstcontainer){
		    $data['firstcontainer'] = $regularboiler_firstcontainer->value;
		}
		
		$data['questions'] ='';
		$regularboiler_questions = getOption('regularboiler_questions');
		if($regularboiler_questions){
		    $data['questions'] = $regularboiler_questions->value;
		}		

		$seotitle = Option::where('name','=','regular_boilers_title')->first();       
 $seodescription = Option::where('name','=','regular_boilers_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
// 		$data['types'] = Boilertype::all();
        $data['route'] = 'boiler/regular-boilers';
		$data['brands'] = Boilerbrand::all();
		$data['heading'] = 'Regular';
		$data['title'] = 'Regular Boilers';
		return view('boilertype', $data);
	}
	
	public function compareBoilerTool(){
		// exit('kokoss');
		$data['title'] = 'Compare Boiler Tool';
		return view('compareboilertool', $data);
	}
	
    public function locations(){
        $seotitle = Option::where('name','=','boiler_installation_locations_title')->first();       
 $seodescription = Option::where('name','=','boiler_installation_locations_description')->first();
        SEOMeta::setTitle($seotitle->value);
        SEOMeta::setDescription($seodescription->value);
        $data['locations'] = Boilerlocation::all();
        $data['title'] = 'Installation Locations';
		return view('installation_locations', $data);
    }
    
    public function locationCity($slug){
        
      
        // echo $slug; exit(' this'); 
        
            // echo $_GET['city']; exit('ff');
            // $data['location'] = Boilerlocation::where('id', $_GET['city'])->get();
            
            $data['location'] = Boilerlocation::with('areas')->where('slug', $slug)->get()->first();
            SEOMeta::setTitle( $data['location']->meta_name);
            SEOMeta::setDescription( $data['location']->meta_description);
            
            // echo "<pre>"; print_r($data['location']); exit('yeyye'); 
            
            // if($location){
            //     $location = $location->first();
            //     $id = $location->id;
            //     // echo "<pre>"; print_r($location); exit('ki'); 
            //     $data['location'] = Boilerlocationarea::where('city', $id)->get()->first();
            // }
        // echo "<pre>"; print_r($data['location']); exit('ki'); 
        $data['alllocations'] = Boilerlocation::all();
        $data['title'] = 'Installation Location City';
		return view('installation_location_city', $data);
    }    
	
	public function getMoreBrand(Request  $request)
	{

		 $where = $request->filtersform;
		parse_str($where, $res);

		// $brand = Boilerbrand::pluck('id')->toArray();
		if(!empty($res['q']))
		{
	  $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers); 
		    $fuel_type =[];
		    $type =[];
		    
		    $boilers = Boiler::with('brands');
		    
		    if( isset($res['q']['fuel_type'])  ){
		        $fuel_type = $res['q']['fuel_type'];    
		        $boilers->whereIn('fuel_type',$fuel_type);
		         $totalDisplayedboilers = json_decode($request->totalboilers);
		 	  	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    if( isset($res['q']['type'])  ){
		        $type = $res['q']['type'];
		         $boilersIds  = DB::table('boilers')->where('boilercategory','=',$request->lastBoiler)->select('boilertype','boilerbrand')->get();    
			    $boilersIds = Boiler::with('brands')->where('boilertype', '=', $type )->where('boilerbrand', '=',$boilersIds['0']->boilerbrand )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id',
			 $totalDisplayedboilers)->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    
		    if( isset($res['q']['kwoutput'])  ){
		        
		        $search = [];
		        foreach($res['q']['kwoutput'] as $kw){
		            if($kw == '11-20'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		            }
		            if($kw =='21-30'){
		                array_push($search, 21,22,23,24,25,26,27,28,29,30);
		            }
		            if($kw == '30'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		                // $kwoutputs = [1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
		            }				            
		            
		        }

		        $kwoutput = $res['q']['kwoutput'];
		        
		        $boilers->whereRaw('FIND_IN_SET(?, kwoutput)',$search );
		        	 $totalDisplayedboilers = json_decode($request->totalboilers);
		    	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		  
		    }

		          if(isset($res['q']['brand']))
		          {
				    $brand = $res['q']['brand'];
				   
			       $totalDisplayedboilers = json_decode($request->totalboilers); 
		        	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->whereIn('brand',$brand )->orderBy('id', 'DESC')->limit(50)->get();
				  }
		 
			$html = '';
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							            $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										      array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										       
										                $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )"><li >'.$bKwoutput->kwoutput .' </li> </button>';    										    }
    										$html .= '</ul>';    
    										
										$count = count($cats);
										 $countboil = count($boill);
										   $cats = json_encode($cats);

										    $boil = json_encode($boill);
										     $boil2 = json_encode($boill2); 
										     $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.', '.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr); 
		
		}
		else{

            $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers);       
             $boilersIds  = DB::table('boilers')->where('boilercategory','=',$request->lastBoiler)->select('boilerbrand')->get();    
			$boilersIds = Boiler::with('brands')->where('boilerbrand', '=',$boilersIds['0']->boilerbrand )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id',
			 $totalDisplayedboilers)->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(50)->get();
			 //    $boilers = Boiler::with('brands');
		 
// $boilers = Boilercategory::with('boilers', 'brands')->where('id', 68)->orderBy('id', 'DESC')->limit(10)->get();
			// echo "<pre>"; print_r($totalDisplayedboilers); print_r($boilers); exit('ff'); 

// 			Boilercategory::with('boilers', 'brands')
		
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
            // exit('koko');
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		// exit('dd');
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							           $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										    
										            
										                array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										  $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )" ><li >'.$bKwoutput->kwoutput .' </li> </button>';									     
										                // $html .='<button onclick ="comparepopupshow(kwoutputboil_'.$boiler->id.', kwoutputdata_'.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )" ><li >'.$bKwoutput->kwoutput .' </li> </button>';
    										    }
    										$html .= '</ul>';  
    										
										$count = count($cats); $countboil = count($boill);  $cats = json_encode($cats) ; $boil = json_encode($boill); $boil2 = json_encode($boill2); $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr);  
// 			echo $html; die();		
			
// 			foreach($boilers as $boiler){
			
// 			$html .= '<div class="sthmb-box"><div class="stbox-lft"><img src="'.asset("images/finish/".$boiler->filename).'" width="143" height="225" alt="" title=""></div><div class="stbox-rgt">';
//     					$html .='<img src="'. asset('images/boilerbrand/'.$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
//     					<h4>'.$boiler->name.'</h4>
//     					<div class="kwoptions">
//     						<span>kW Options:</span>';
//     						if(isset($boiler->kwoutput)){
//     							   $kwoutputs = explode(',', $boiler->kwoutput);
//     							$html .='<ul>';
//     							   if(is_array($kwoutputs)){
//     							        foreach($kwoutputs as $kwoutput){
//     							            $html .='<li data-fancybox data-src="#kwpopup">'.  $kwoutput .'</li>';
//     							        }
    							        
//     						        }
//     							$html .='</ul>';    
//     						}				
    						
//     					$html .='</div>
//     					<div class="botm-btns">
//     						<a href="#" onclick = "compare('.$boiler->id.')">+ Compare this Boiler</a>
//     						<a href="url(boiler-brands/'.$boiler->brands->slug.'/on/'.$boiler->slug .')">View this Boiler</a>
//     					</div>
//     				</div>
//     			</div>';
// 			}
// 			echo $html; die();		
		}					
			
		$data['brand_filter'] = $res;


	}
	public function getMoreCombi(Request $request)
	{
		
		 $where = $request->filtersform;

		parse_str($where, $res);

		// $brand = Boilerbrand::pluck('id')->toArray();
		if(!empty($res['q']))
		{
	  $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers); 
		    $fuel_type =[];
		    $type =[];
		    
		    $boilers = Boiler::with('brands');
		    
		    if( isset($res['q']['fuel_type'])  ){
		        $fuel_type = $res['q']['fuel_type'];    
		        $boilers->whereIn('fuel_type',$fuel_type);
		         $totalDisplayedboilers = json_decode($request->totalboilers);
		 	  	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    if( isset($res['q']['type'])  ){
		        $type = $res['q']['type'];
		         $boilersIds  = DB::table('boilers')->where('boilercategory','=',$request->lastBoiler)->select('boilertype')->get();    
			    $boilersIds = Boiler::with('brands')->where('boilertype', '=', $type )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id',
			 $totalDisplayedboilers)->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    
		    if( isset($res['q']['kwoutput'])  ){
		        
		        $search = [];
		        foreach($res['q']['kwoutput'] as $kw){
		            if($kw == '11-20'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		            }
		            if($kw =='21-30'){
		                array_push($search, 21,22,23,24,25,26,27,28,29,30);
		            }
		            if($kw == '30'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		                // $kwoutputs = [1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
		            }				            
		            
		        }

		        $kwoutput = $res['q']['kwoutput'];
		        
		        $boilers->whereRaw('FIND_IN_SET(?, kwoutput)',$search );
		        	 $totalDisplayedboilers = json_decode($request->totalboilers);
		    	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		  
		    }

		          if(isset($res['q']['brand']))
		          {
				    $brand = $res['q']['brand'];
				   
			       $totalDisplayedboilers = json_decode($request->totalboilers); 
		        	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->whereIn('brand',$brand )->orderBy('id', 'DESC')->limit(50)->get();
				  }
		 
			$html = '';
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							            $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										      array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										       
										                $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )"><li >'.$bKwoutput->kwoutput .' </li> </button>';    										    }
    										$html .= '</ul>';    
    										
										$count = count($cats);
										 $countboil = count($boill);
										   $cats = json_encode($cats);

										    $boil = json_encode($boill);
										     $boil2 = json_encode($boill2); 
										     $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.', '.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr); 
		
		}
		
		else{

            $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers);       
             $boilersIds  = DB::table('boilers')->where('boilercategory','=',$request->lastBoiler)->select('boilertype')->get();    
			$boilersIds = Boiler::with('brands')->where('boilertype', '=',$boilersIds['0']->boilertype )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id',
			 $totalDisplayedboilers)->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(50)->get();
			 //    $boilers = Boiler::with('brands');
		 
// $boilers = Boilercategory::with('boilers', 'brands')->where('id', 68)->orderBy('id', 'DESC')->limit(10)->get();
			// echo "<pre>"; print_r($totalDisplayedboilers); print_r($boilers); exit('ff'); 

// 			Boilercategory::with('boilers', 'brands')
		
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
            // exit('koko');
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		// exit('dd');
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							           	 $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										    
										            
										                array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										   	  $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )" ><li >'.$bKwoutput->kwoutput .' </li> </button>';	
										                // $html .='<button onclick ="comparepopupshow(kwoutputboil_'.$boiler->id.', kwoutputdata_'.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )" ><li >'.$bKwoutput->kwoutput .' </li> </button>';
    										    }
    										$html .= '</ul>';  
    										
										$count = count($cats); $countboil = count($boill);  $cats = json_encode($cats) ; $boil = json_encode($boill); $boil2 = json_encode($boill2); $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr);  
// 			echo $html; die();		
			
// 			foreach($boilers as $boiler){
			
// 			$html .= '<div class="sthmb-box"><div class="stbox-lft"><img src="'.asset("images/finish/".$boiler->filename).'" width="143" height="225" alt="" title=""></div><div class="stbox-rgt">';
//     					$html .='<img src="'. asset('images/boilerbrand/'.$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
//     					<h4>'.$boiler->name.'</h4>
//     					<div class="kwoptions">
//     						<span>kW Options:</span>';
//     						if(isset($boiler->kwoutput)){
//     							   $kwoutputs = explode(',', $boiler->kwoutput);
//     							$html .='<ul>';
//     							   if(is_array($kwoutputs)){
//     							        foreach($kwoutputs as $kwoutput){
//     							            $html .='<li data-fancybox data-src="#kwpopup">'.  $kwoutput .'</li>';
//     							        }
    							        
//     						        }
//     							$html .='</ul>';    
//     						}				
    						
//     					$html .='</div>
//     					<div class="botm-btns">
//     						<a href="#" onclick = "compare('.$boiler->id.')">+ Compare this Boiler</a>
//     						<a href="url(boiler-brands/'.$boiler->brands->slug.'/on/'.$boiler->slug .')">View this Boiler</a>
//     					</div>
//     				</div>
//     			</div>';
// 			}
// 			echo $html; die();		
		}					
			
		$data['brand_filter'] = $res;

	}

	public function getMoreRecords(Request $request){
	
        $where = $request->filtersform;

		parse_str($where, $res);
		

		if(!empty($res['q'])){
		    $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers); 
		    $fuel_type =[];
		    $type =[];
		    
		    $boilers = Boiler::with('brands');
		    
		    if( isset($res['q']['fuel_type'])  ){
		        $fuel_type = $res['q']['fuel_type'];    
		        $boilers->whereIn('fuel_type',$fuel_type);
		         $totalDisplayedboilers = json_decode($request->totalboilers);
		 	  	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    if( isset($res['q']['type'])  ){
		        $type = $res['q']['type'];
		         $boilersIds  = DB::table('boilers')->where('boilercategory','=',$request->lastBoiler)->select('boilertype')->get();    
			    $boilersIds = Boiler::with('brands')->where('boilertype', '=', $type )->orderBy('id', 'DESC')->pluck('boilercategory'); 
			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id',
			 $totalDisplayedboilers)->whereIn('id', $boilersIds )->orderBy('id', 'DESC')->limit(50)->get();
		    }
		    
		    if( isset($res['q']['kwoutput'])  ){
		        
		        $search = [];
		        foreach($res['q']['kwoutput'] as $kw){
		            if($kw == '11-20'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		            }
		            if($kw =='21-30'){
		                array_push($search, 21,22,23,24,25,26,27,28,29,30);
		            }
		            if($kw == '30'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		                // $kwoutputs = [1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
		            }				            
		            
		        }

		        $kwoutput = $res['q']['kwoutput'];
		        
		        $boilers->whereRaw('FIND_IN_SET(?, kwoutput)',$search );
		        	 $totalDisplayedboilers = json_decode($request->totalboilers);
		    	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
		  
		    }

		          if(isset($res['q']['brand']))
		          {
				    $brand = $res['q']['brand'];
				   
			       $totalDisplayedboilers = json_decode($request->totalboilers); 
		        	$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->whereIn('brand',$brand )->orderBy('id', 'DESC')->limit(50)->get();
				  }
		 
			$html = '';
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							            $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										      array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										       
										                $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )"><li >'.$bKwoutput->kwoutput .' </li> </button>';    										    }
    										$html .= '</ul>';    
    										
										$count = count($cats);
										 $countboil = count($boill);
										   $cats = json_encode($cats);

										    $boil = json_encode($boill);
										     $boil2 = json_encode($boill2); 
										     $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.', '.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr); 
			
      }
		
		else{
 
           $totalDisplayedboilers= array();
            $totalDisplayedboilers = json_decode($request->totalboilers);

			$boilers = Boilercategory::with('boilers', 'brands')->whereNotIn('id', $totalDisplayedboilers)->orderBy('id', 'DESC')->limit(50)->get();
			
			$html = '';
			
            if($boilers->count()>0){	
            $newboilers = array();
            $counter = 0 ;
            
			foreach($boilers as $boiler){
			    if(!$boiler->boilers->isEmpty()){
			    	$counter++ ;
			    	if($counter > 10){
			    		
			    		break;
			    	}
			$html .='<div class="sthmb-box"> <div class="stbox-lft"> <img src="'.asset("images/boilercat/".$boiler->filename).'" width="143" height="225" alt="" title=""></div> <div class="stbox-rgt">

					<img src="'.asset("images/boilerbrand/".$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
									<h4> '. $boiler->name .'</h4>
									<p>'. $boiler->description .'</p>
									<div class="kwoptions">
										<span>kW Options:</span>';
										
										    $cats = array(); 
										    $boill = array(); 
										    $boill2 = array(); 
										    $brandss = array(); 
										
    										array_push($newboilers, $boiler->id );
    										
    										array_push($totalDisplayedboilers, $boiler->id );
    										
    							            $html .='<ul>';
    										    foreach($boiler->boilers as $bKwoutput){
										      array_push($boill2, $bKwoutput->id );
										                array_push($boill, $bKwoutput->slug );
										                array_push($cats, $bKwoutput->kwoutput );
										                array_push($brandss, $boiler->brands->slug );
										                $count = count($cats);
										       
										                $html .='<button onclick ="comparepopupshow('.$boiler->id.','.$boiler->id.','.$bKwoutput->kwoutput.', ' . $count .' )"><li >'.$bKwoutput->kwoutput .' </li> </button>';    										    }
    										$html .= '</ul>';    
    										
										$count = count($cats);
										 $countboil = count($boill);
										   $cats = json_encode($cats);

										    $boil = json_encode($boill);
										     $boil2 = json_encode($boill2); 
										     $brands = json_encode($brandss); 
									$html .= '</div>
									<div class="botm-btns">';
									    if(!empty($cats)){
									        $html .= '<input name = "kwoutputdata" id = "kwoutputdata_'.$boiler->id.'" type = "hidden" value = '.$cats.'>
									    
									        <input name = "kwoutputdata_2" id = "kwoutputdata_'.$boiler->id.'_2" type = "hidden" value = '.$boil2.'>
									        
									        <input name = "kwoutputboil" id = "kwoutputboil_'.$boiler->id.'" type = "hidden" value = '.$boil.'>
									        
									        <input name = "kwoutputboil2" id = "kwoutputboil_'.$boiler->id.'_2" type = "hidden" value = '.$brands.'>
									        
									        <input name = "url" id = "url" type = "hidden" value = "'. url('/') .'">';
									        
									        if($countboil == 1){
									            $html .='<a href="#" onclick ="compare('.$boill2[0] .')" > + Compare this Boiler</a>
									            <a href="'. url('boiler/boiler-brands/'.$brandss["0"].'/on/'.$boill["0"]) .'"  >View this Boiler</a>';
									        }else{
									            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '.$count.')" >+ Compare this Boiler</a>
									            <a href="#" onclick ="comparepopupboil('.$boiler->id.','.$boiler->id.', '. $count .' )"  >View this Boiler</a>';
									        }
                                        }else{
                                            $html .='<a href="#" onclick ="comparepopup('.$boiler->id.', '. $count.')" disabled >+ Compare this Boiler</a>
                                            <a href="#" onclick ="comparepopupboil('.$boiler->id.', '.$boiler->id.', ' . $count .' )"  disabled>View this Boiler</a>';									        
                                        }
									$html .='	
									</div>
								</div>
							</div>';
			        }
			        else{
			            continue;
			        }
                }
    			    if(empty($newboilers)){
    			        $empty = 1;
    			    }else{
    			        $empty = 0;
    			    }
    			    $arr = array(
    			        'html'=>$html,
    			        'totalboilers'=>json_encode($totalDisplayedboilers),
    			        'empty' => $empty
    		        );
                    
                }
			else{
			    
			    $html .='';
			    
			    $arr = array(
			        'html'=>$html,
			        'totalboilers'=>json_encode($totalDisplayedboilers),
			        'empty' => 1
		        );
			}
			
			
		      echo json_encode($arr);  
	
		}					
			
		$data['brand_filter'] = $res;

}

	
	public function getMoreRecordsBrand(Request $request){
	    
	   // echo "<pre>"; print_r($request->all()); exit(); 
        $where = $request->filtersform;
		parse_str($where, $res);
	    $singlebrand = Boilerbrand::where('slug', $res['product'] )->get()->first();
		$brand = $singlebrand->id;
		$data['brand'] = $singlebrand;		        			
		$brand = Boilerbrand::pluck('id')->toArray();

		if(!empty($res['q'])){
		    
		    $fuel_type =[];
		    $type =[];
		    
		    $boilers = Boiler::with('brands');
		    
		    if( isset($res['q']['fuel_type'])  ){
		        $fuel_type = $res['q']['fuel_type'];    
		        $boilers->whereIn('fuel_type',$fuel_type);
		    }
		    if( isset($res['q']['type'])  ){
		        $type = $res['q']['type'];
		        $boilers->whereIn('boilertype',$type );
		    }
		    
		    if( isset($res['q']['kwoutput'])  ){
		        
		        $search = [];
		        foreach($res['q']['kwoutput'] as $kw){
		            if($kw == '11-20'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		            }
		            if($kw =='21-30'){
		                array_push($search, 21,22,23,24,25,26,27,28,29,30);
		            }
		            if($kw == '30+'){
		                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
		                // $kwoutputs = [1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
		            }				            
		            
		        }
		        
		        // print_r($search); exit(' ooooo');    
		        
		        $kwoutput = $res['q']['kwoutput'];
		        
		        $boilers->whereRaw('FIND_IN_SET(?, kwoutput)',$search );
		        // $boilers->whereIn('kwoutput',$search );
		        
		        // $boilers->whereIn('kwoutput',$kwoutput );
		    }
		    
		    $boilers->where('boilerbrand',$brand);
		    $boilers->where('id', '<',$request->lastBoiler);
		    $boilers->orderBy('id', 'DESC');
		    $boilers->limit(10);
		    $boilers = $boilers->get(); 
		    
			$html = '';
			
			foreach($boilers as $boiler){
			
			$html .= '<div class="sthmb-box"><div class="stbox-lft"><img src="'.asset("images/finish/".$boiler->filename).'" width="143" height="225" alt="" title=""></div><div class="stbox-rgt">';
    					$html .='<img src="'. asset('images/boilerbrand/'.$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
    					<h4>'.$boiler->name.'</h4>
    					<div class="kwoptions">
    						<span>kW Options:</span>';
    						if(isset($boiler->kwoutput)){
    							   $kwoutputs = explode(',', $boiler->kwoutput);
    							$html .='<ul>';
    							   if(is_array($kwoutputs)){
    							        foreach($kwoutputs as $kwoutput){
    							            $html .='<li data-fancybox data-src="#kwpopup">'.  $kwoutput .'</li>';
    							        }
    							        
    						        }
    							$html .='</ul>';    
    						}				
    						
    					$html .='</div>
    					<div class="botm-btns">
    						<a href="#" onclick = "compare('.$boiler->id.')">+ Compare this Boiler</a>
    						<a href="url(boiler/boiler-brands/'.$boiler->brands->slug.'/on/'.$boiler->slug .')">View this Boiler</a>
    					</div>
    				</div>
    			</div>';
			}
			echo $html; die();			    
		    
		}
		
		else{
			$boilers = Boiler::with('brands')->where('boilerbrand',$brand)->where('id', '<',$request->lastBoiler)->orderBy('id', 'DESC')->limit(10)->get();
			
			$html = '';
			
			foreach($boilers as $boiler){
			
			$html .= '<div class="sthmb-box"><div class="stbox-lft"><img src="'.asset("images/finish/".$boiler->filename).'" width="143" height="225" alt="" title=""></div><div class="stbox-rgt">';
    					$html .='<img src="'. asset('images/boilerbrand/'.$boiler->brands->filename).'" style = "width:134px; height:59px;" alt="" title="" />
    					<h4>'.$boiler->name.'</h4>
    					<div class="kwoptions">
    						<span>kW Options:</span>';
    						if(isset($boiler->kwoutput)){
    							   $kwoutputs = explode(',', $boiler->kwoutput);
    							$html .='<ul>';
    							   if(is_array($kwoutputs)){
    							        foreach($kwoutputs as $kwoutput){
    							            $html .='<li data-fancybox data-src="#kwpopup">'.  $kwoutput .'</li>';
    							        }
    							        
    						        }
    							$html .='</ul>';    
    						}				
    						
    					$html .='</div>
    					<div class="botm-btns">
    						<a href="#" onclick = "compare('.$boiler->id.')">+ Compare this Boiler</a>
    						<a href="url(boiler/boiler-brands/'.$boiler->brands->slug.'/on/'.$boiler->slug .')">View this Boiler</a>
    					</div>
    				</div>
    			</div>';
			}
			echo $html; die();		
		}					
			
		$data['brand_filter'] = $res;

}	

// 	public function brands($where = '', $flag ='',  $product = ''){


		
// 		if($where  && !$flag && !$product){
			
// 			$brand = Boilerbrand::where('slug', $where )->value('id');
// 			$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->get();
// 			$data['brand_filter'] = $where;

// 		}
// 		else if($where  && $flag && !$product){

// 				parse_str($where, $res);
				
// 				$brand = Boilerbrand::pluck('id')->toArray();

// 				if(!empty($res['q'])){
				    
// 				    $fuel_type =[];
// 				    $type =[];
				    
// 				    $boilers = Boiler::with('brands');
				    
// 				    if( isset($res['q']['fuel_type'])  ){
// 				        $fuel_type = $res['q']['fuel_type'];    
// 				        $boilers->whereIn('fuel_type',$fuel_type);
// 				    }
// 				    if( isset($res['q']['type'])  ){
// 				        $type = $res['q']['type'];
// 				        $boilers->whereIn('boilertype',$type );
// 				    }
				    
// 				    if( isset($res['q']['kwoutput'])  ){
				        
// 				        $search = [];
// 				        $whereFrom ='';
// 				        $whereTo ='';
// 				        foreach($res['q']['kwoutput'] as $kw){
				            
// 				            if($kw == '11-20'){
// 				                $whereFrom = 10;    
// 				                $whereTo  =20;
// 				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
// 				                $boilers->whereRaw("FIND_IN_SET(?, kwoutput) > 0", [20]);
// 				            }
// 				            if($kw =='21-30'){
// 				                if($whereFrom == ''){
// 				                    $whereFrom = 21;       
// 				                }
// 				                // print_r($kw); exit(' ooooodddeewe');
// 				                // echo $whereFrom; exit('koko');
				                
// 				                $whereTo  =20;
				                
// 				                array_push($search, 21,22,23,24,25,26,27,28,29,30);
// 				                $boilers->whereRaw("FIND_IN_SET(?, kwoutput) > 0", [28]);
// 				            }
// 				            // print_r($kw); exit(' ooooo');
// 				            if($kw == '30+'){
// 				                if($whereFrom == ''){
// 				                    $whereFrom = 31;       
// 				                }
// 				                $whereTo  =000;
// 				                array_push($search, 11,12,13,14,15,16 ,17,18,19,20);
// 				                $boilers->whereRaw("FIND_IN_SET(?, kwoutput) > 0", [30]);
// 				                // $kwoutputs = [1,2,3,4,5,6 ,7, 8,9,10,11,12,13,14,15,16 ,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38];
// 				            }				            
				            
// 				        }
				        
// 				        $kwoutput = $res['q']['kwoutput'];
				        
				        
// 				    }
				    
				    
// 				    $boilers->orderBy('id', 'DESC');
// 				    $boilers->limit(10);
// 				    $data['boilers'] = $boilers->get(); 
// 				    // echo "<pre>"; print_r($data['boilers']); exit('kokok'); 
				    
// 				}
				
// 				else{
// 					$data['boilers']  = Boiler::with('brands')->where('boilerbrand',$brand)->orderBy('id', 'DESC')->limit(10)->get();
// 					$data['brand_filter'] = $where;					
// 				}					
					
// 				$data['brand_filter'] = $res;

// 		}
// 		else if($where  && $flag && $product){
// 			$brandd = Boilerbrand::where('slug', $where )->value('id');
//         	$data['boiler']  = Boiler::with('brands')->where('slug',$product)
//         						->where('boilerbrand',$brandd)->orderBy('id', 'DESC')->limit(10)->get()->first();		
//         	$data['brand_filter'] = $where;
        	
//         	$data['title'] = 'Boiler';
// 		    return view('boiler', $data);
        	
        	
// 		}
// 		else{
// 			$data['brand_filter'] = '';
// 			$data['cate'] = Boilercategory::with('boilers')->orderBy('id', 'DESC')->limit(10)->get();	
// 			$data['boilers'] = Boiler::with('brands')->orderBy('id', 'DESC')->limit(10)->get();	
// 		}
		
// 		$data['types'] = Boilertype::all();
// 		$data['brands'] = Boilerbrand::all();
// 		$data['title'] = 'System Boilers';
// 		echo "<pre>"; print_r($data['cate']); exit(' oooo'); 
// 		return view('brands', $data);
// 	}	

}

