<?php
	
	use App\Models\Option;
	use App\Models\Boiler;

	function getOption($optionName)
	{
		$data = Option::where('name' , '=' , $optionName)->get(['value' , 'id'])->first();
		return $data;

	}

	function getSessionBoilers($compare){
		$boilers = Boiler::whereIn('id', $compare)->get();
		return $boilers;
	}
	
	function getSessionBoilers2(){
	    
        if($comp = session()->get('compare')){
            $sessionBoilers = Boiler::whereIn('id', $comp)->get();
	$sessionBoilerss =array();

			foreach($sessionBoilers as $key => $sessionBoiler){

				array_push($sessionBoilerss, $sessionBoiler->id);
			}

			// dd($sessionBoilerss);

        	if($sessionBoilerss){ 				
        		$html = '<div class="comp-bmenu"><span class="cbmbox-closee" onclick="deleteSessionItems('.implode(', ', $sessionBoilerss).')"></span> <div class="comp-bmenuwrap">';
			}

		if($sessionBoilers && $sessionBoilerss){  	    
        	    $row = '';
        		foreach($sessionBoilers as $key => $sessionBoiler){
        		$html .=   $row . '<div class="cbm-box"><span class="cbmbox-close" onclick = "deleteSessionItems('.$sessionBoiler->id.')"></span><p> ' . $sessionBoiler->name . ' </p> </div> | ';    

    
        		}
        		if( count($comp) >= 3){
        		    $html .= $row .' <div class="cmbox-addmore cmbox-comparebtn"><div class="closeboxx" onclick="deleteSessionItems('.json_encode($sessionBoilerss).')"></div> <a href="'. url('boiler/boiler-comparison-results') .'">+ Compare boilers</a> </div></div></div>';
					$html .= $row .	'<div class="comp-bmenu-mobile"><button type="button" onclick="deleteSessionItems('.json_encode($sessionBoilerss).')" >Clear <span>('.count($comp).')</span></button><button type="button" ><a href="'. url('boiler/boiler-comparison-results') .'">+ Compare</span></button></div>';
				}else{
        		    $html .= $row .'<div class="cmbox-addmore"> <a href="'. url('boiler/boiler-brands/') .'">+ Add another boiler</a> </div> <div class="cmbox-addmore cmbox-comparebtn"> <div class="closeboxx" onclick="deleteSessionItems('.json_encode($sessionBoilerss).')"></div><a href="'. url('boiler/boiler-comparison-results') .'">+ Compare boilers</a> </div></div></div>';    
					$html .= $row .	'<div class="comp-bmenu-mobile"><button type="button" onclick="deleteSessionItems('.json_encode($sessionBoilerss).')" >Clear <span>('.count($comp).')</span></button><button type="button" ><a href="'. url('boiler/boiler-comparison-results') .'">+ Compare</span></button></div>';
				}
                
        	    return $html;
        	}else{
        		$html = '<div class = "comparenote" >NO Boilers</div>';	
        		return $html;
        	}
            
        }else{
        // exit('dede');    
            $html = 'empty';
            return $html;
        }	
	}	
	
	

   
