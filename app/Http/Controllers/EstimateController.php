<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Finish;
use App\Models\Edge;
use App\Models\Design;
use App\Models\Dimension;
use App\Models\Quotation;
use App\Models\Option;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Auth;
use Session;


class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $user= Auth::user();
        //     $permit = AuthHelper::isAdmin($user->id); 
            
        //     if($permit){ 
        //       return $next($request);
        //     }
            
        //     else{  abort(404); redirect('/'); }    
        // });

    }
    
    public function index()
    {
        
        $finishes   = Finish::all();
        $edges      = Edge::all();
        $designs    = Design::all();
        return view('estimate.estimate',compact('finishes','edges','designs'));
    }

      public function getDimensions()
    {
        $design_id = $_POST['design_id'];
        $dimensions = Dimension::where('design_id',$design_id)->get();
        $dimensions_HTML = '<div class="col-md-4 selected_design">
                                <h4 class="pl-3 text-center">'.$dimensions[0]->design->name.'</h4>
                                <img src="'.asset('images/designs/'.$dimensions[0]->design->filename).'">
                            </div>
                            <div class="col-md-8 dimensions">
                            <h4 class="pl-3 text-center">Select Dimensions:</h4>
                                <table >
                                  <thead>
                                    <tr>
                                      <th width="10%"></th>
                                      <th width="15%"></th>
                                      <th width="10%"></th>
                                      <th width="15%"></th>
                                      <th width="20%"></th>
                                      <th width="10%"></th>
                                      <th width="10%"></th>
                                      <th width="15%"></th>
                                    </tr>
                                  </thead>
                                  <tbody class="" id="dimensions_inputs">';
        foreach ($dimensions as $key => $dimension) {
            // dd($dimension->design->name);
            $dimensions_HTML .= '
                                  <tr>
                                    <td>
                                      <label for="'.$dimension->name.'" class="mr-sm-2">'.$dimension->name.':</label>
                                    </td>
                                     <td>
                                      <label for="switch_side'.$dimension->name.'" class="mr-sm-2">Seen Edge:</label>
                                    </td>
                                    <td>
                                      <label class="switch float-left"> <input type="checkbox" id="switch_side'.$dimension->name.'" class="switch_side" name="seen_edge['.$dimension->name.'][]" value="'.$dimension->id.'"> <span class="slider round"></span> </label>
                                    </td>
                                    <td>
                                      <input type="number" min="12" class="form-control mb-2 dimension_input" id="dimension_input_'.$key.'" name="dimensions['.$dimension->id.']">
                                    </td>
                                    <td>
                                      <label for="switch_side_'.$dimension->name.'" class="mr-sm-2">Has BackSplash:</label>
                                    </td>
                                     <td>
                                      <label class="switch float-right"> <input type="checkbox" id="switch_side_'.$dimension->name.'" class="switch_side_height" name="backsplash['.$dimension->name.'][]" value="'.$dimension->id.'"> <span class="slider round"></span> </label>
                                    </td>
                                     <td>
                                      <label for="switch_side_height'.$dimension->name.'" class="mr-sm-2 lable_height switch_side_'.$dimension->name.'">Height:</label>
                                    </td>
                                    <td>
                                    <input type="number" style="display:none" min="12" class="form-control mb-2 switch_side_'.$dimension->name.' height_input" id="height_input'.$key.'" name="backsplash_height['.$dimension->id.'][]">
                                    </td>
                                   
                                  </tr>

                        ';
        }
            $dimensions_HTML .= '</tbody>
                                </table>
                            </div>';

        return ($dimensions_HTML);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create(Request $request)
    {
        // return $request->input();
        $finish_data = Finish::find($request->finish);

        $edge_data = Edge::find($request->edge);

        $design_data = Design::find($request->design);

        $dimensions_data = Dimension::where('design_id' , '=' , $request->design)->get();

        $per_sq = getOption('price_per_inches')->value;

        $sink_bowl = json_decode(getOption('sink')->value);
        $single_sink = $sink_bowl->single_bowl_price;
        $double_sink = $sink_bowl->double_bowl_price; 
        $cooking_hob = getOption('cooking_hub')->value;
        $pressed_drainer = getOption('pressed_drainer')->value;
        
       
        $data = '
                <div class="estimate_dv">
                    <h3>QUOTE</h3>
                    <p>
                    This quote is based of the inputs provided. There is now allowance for any installation or fright. Contact will be made on completion of your bench top. Please contact us on 0344554414 for lead times.
                    </p>
                    <div class="total_price">
                        <div class="row">
                            <div class="col-md-9">
                                <ul>
                                    <li>Dimensions (<li>';
                                    $sum = 0;
                                    $count =  count($request->dimensions) ;
                                     $c = 0;
                                    foreach($request->dimensions as $key => $val)
                                    {
                                        
                                        $data .= '<li>'.$val.'  sq </li>';
                                        $c = $c +1 ;

                                        if($c == $count){
                                             $data .='<li></li> ';           
                                        }
                                        else{
                                            $data .='<li>+</li> ';    
                                        }
                                        $sum +=$val;
                                    }
                                    $length_price = $sum * $per_sq;
                                    $total_estimate = $length_price+$request->thickness;
                                    $data .='
                                    <li>) * $'.$per_sq.' Per Sq<li>
                                </ul>
                            </div>
                            <div class="col-md-3"> =  $'.$length_price.'</div>
                        </div>';
                        if ($request->thickness != 0){
                            $data .='<div class="row">
                                <div class="col-md-9">
                                    Thickness ('.$request->thickness_size.'mm)    
                                </div>
                                <div class="col-md-3">= $'.$request->thickness.'</div>
                            </div>
                            ';
                        }

                        if (isset($request->pressed_drainer)){
                            $data .='<div class="row">
                                <div class="col-md-9">
                                    Custom pressed drainer     
                                </div>
                                <div class="col-md-3">= $'.$pressed_drainer.'</div>
                            </div>
                            ';
                            $total_estimate = $total_estimate + $pressed_drainer;
                        }
                         if ($request->sink_bowl_swith_btn == 'on') {
                        $data .= '
                            <div class="row">
                                <div class="col-md-9">Sink Bowl</div>
                                <div class="col-md-3">';
                                    if ($request->single_sink_bowl_insert_id == 1){
                                       
                                        $data .= '= $'.$single_sink;
                                        $total_estimate = $single_sink + $total_estimate;
                                        
                                    }else{
                                        $data .= '= $'.$double_sink;
                                        $total_estimate = $double_sink + $total_estimate;
                                    
                                    }
                            $data .= '</div>
                            </div>';
                        
                            }
                        if ($request->hob_cut_swith_btn == 'on') {
                            $total_estimate = $total_estimate + $cooking_hob;
                            $data .= '<div class="row">
                                <div class="col-md-9">
                                    Cooking Hob Cut Out    
                                </div>
                                <div class="col-md-3">= $'.$cooking_hob.'</div>
                            </div>';
                        }

                        $data .= '<div class="row">
                            <div class="col-md-9">
                                <b>Total Estimate</b>    
                            </div>
                            <div class="col-md-3">= <b>$'.$total_estimate.'</b></div>
                        </div>
                    </div>
                </div>

                <fieldset class="estimate_feildset">
                    <legend>Selected Items:</legend>
                    
                    <div class="row estimate_item_rw">
                        <div class="col-md-3"><h4>Finish:</h4></div>
                        <div class="col-md-3"><span>'.$finish_data->name.'</span></div>
                        <div class="col-md-3"><span>'.$finish_data->price.'</span></div>
                        <div class="col-md-3">
                            <img src="'.asset('images/finish/'.$finish_data->filename).'" alt="..." class="img-thumbnail rounded">
                        </div>
                    </div>

                    
                    <div class="row estimate_item_rw">
                        <div class="col-md-3"><h4>Edge:</h4></div>
                        <div class="col-md-3"><span>'.$edge_data->name.'</span></div>
                        <div class="col-md-3"><span> </span></div>
                        <div class="col-md-3">
                            <img src="'.asset('images/edges/'.$edge_data->filename).'" alt="..." class="img-thumbnail rounded">
                        </div>
                    </div>

                    <h4>Design:</h4>
                    <div class="row estimate_item_rw estimate_rw">
                        <div class="col-md-2">
                            <span>'.$design_data->name.'</span>
                        </div>
                        <div class="col-md-1">
                            <ol>
                                <li><b>Dimensions</b></li>';
                                foreach($dimensions_data as $value)
                                {
                                    $data .= '<li>'.$value->name.'</li>';
                                }
                            $data .='</ol>
                        </div>
                        <div class="col-md-1">
                            <ol class="size_list">
                                <li><b>Size</b></li>';
                                // echo print_r($request->dimensions); exit('dww');
                                foreach($request->dimensions as $key => $val)
                                {
                                    $data .= '<li>'.$val.'</li>';
                                }
                        $data .='</ol>
                        </div>
                        <div class="col-md-2">
                            <ol class="seen_edge_list">
                                <li><b>Seen Edge</b></li>';
                                    
                                    if($request->seen_edge){
                                        foreach($dimensions_data as $keyd => $dv){
                                            if(isset($request->seen_edge[$dv->name][0])){
                                                $data .='<li>On</li>';
                                            }else{
                                                $data .='<li>Off</li>';    
                                            }
                                        }
                                    }else{
                                        $data .='<li>Off</li>';
                                    }

                            $data .='</ol>
                        </div>
                         <div class="col-md-2">
                            <ol class="backsplash_list">
                                <li><b>BackSplash</b></li>';
                                if ($request->backsplash) {
                                 foreach($dimensions_data as $keyd => $dv){
                                    // print_r($request->backsplash_height); exit('ass');
                                    if (isset($request->backsplash[$dv->name][0])){
                                        $data .='<li>On</li>';
                                      // $data .='<li>'.$request->backsplash_height.'</li>';
                                    }
                                    else{
                                        $data .='<li>Off</li>';   
                                    }
                                }
                            }
                                else{
                                    $data .='<li>Off</li>';
                                }
                           $data .='
                            </ol>
                        </div>
                         <div class="col-md-1">
                            <ol class="backsplash_height">
                                <li><b>Height</b></li>';
                                    if ($request->backsplash) {
                                        // print_r($request->backsplash_height); exit('ass');
                                        foreach($dimensions_data as $keyd => $dv){

                                             if (isset($request->backsplash_height[$dv->id][0])){
                                                 $data .='<li>'.$request->backsplash_height[$dv->id][0].'mm'.'</li>';   
                                                }
                                                else{
                                        $data .='<li>--</li>';   
                                    }
                                }
                                    
                            }
                            else{
                                 $data .='<li>--</li>';
                            }
                           $data .='</ol>
                        </div>
                        <div class="col-md-3">
                            <img src="'.asset('images/designs/'.$design_data->filename).'" alt="..." class="img-thumbnail rounded">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="estimate_feildset">
                    <legend>Optional Items:</legend>
                    
                    <div class="row estimate_item_rw">
                        <div class="col-md-3">
                            <h5>Substrate:</h5>
                        </div>
                        <div class="col-md-9">
                            <p>'.$request->substrate.'</p>
                        </div>
                    </div>

                    <div class="row estimate_item_rw">
                        <div class="col-md-3">
                            <h5>Thickness:</h5>
                        </div>
                        <div class="col-md-9">
                            <p>'.$request->thickness_size.' mm</p>
                        </div>
                    </div>';


                    if (isset($request->pressed_drainer)){
                        $data .='<div class="row estimate_item_rw">
                            <div class="col-md-3">
                                <h5>Custom pressed drainer:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>$'.$pressed_drainer.' </p>
                            </div>
                        </div>';     
                    }
                     if ($request->sink_bowl_swith_btn == 'on') {
                        $data .= '
                            <div class="row estimate_item_rw">
                                <div class="col-md-3">
                                    <h5>Sink Bowl:</h5>
                                </div>
                                <div class="col-md-9">';
                                if($request->single_sink_bowl_insert_id == 1){
                                    $data .= '<p>Single Sink Bowl</p>';
                                }else{
                                    $data .= '<p>Double Sink Bowl</p>';
                                }

                                 $data .= '
                                </div>
                            </div>
                        ';
                    }

                    if ($request->hob_cut_swith_btn == 'on') {
                        $data .= '
                            <div class="row estimate_item_rw">
                                <div class="col-md-3">
                                    <h5>Cooking Hob Cut Out:</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-2">Length:</div>
                                        <div class="col-md-4">'.$request->hob_length.' mm</div>
                                        <div class="col-md-2">Width:</div>
                                        <div class="col-md-4">'.$request->hob_width.' mm</div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }

                    
                $data .= '</fieldset>';



        return $data;           

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->sink_bowl_swith_btn == 'on') {
            if($request->single_sink_bowl_insert_id == 1){
                $sink_bowl_val = json_encode($request->sink_bowl);
            }else{
                $sink_bowl_val = json_encode($request->sink_bowl);
            }
        }else{
            $sink_bowl_val = '';
        }

        if ($request->hob_cut_swith_btn == 'on') {
            $cooking_hob_status = 1;
            $cooking_hob_width = $request->hob_width;
            $cooking_hob_length = $request->hob_length;
        }else{
            $cooking_hob_status = 0;
            $cooking_hob_width = 0;
            $cooking_hob_length = 0;
        }

        $table = new Quotation;
        $table->finish_id = $request->finish;
        $table->finish_price = Finish::find($request->finish)->price;

        $table->edge_id = $request->edge;
        $table->edge_price = Edge::find($request->edge)->price;

        $table->design_id = $request->design;
        $table->design_dimensions = json_encode($request->dimensions);

        if (!empty($request->seen_edge)) {
            $table->seen_edges = json_encode($request->seen_edge);
        }
        if (isset($request->pressed_drainer)) {
            $table->pressed_drainer = $request->pressed_drainer;
        }
        if (!empty($request->backsplash)) {
            $table->backsplash = json_encode($request->backsplash);
        }   

        $table->substrate = $request->substrate;
        $table->thickness = $request->thickness;
        $table->sink_bowl = $sink_bowl_val;
        $table->cooking_hob_status = $cooking_hob_status;
        $table->cooking_hob_width = $cooking_hob_width;
        $table->cooking_hob_length = $cooking_hob_length;
        $table->user_id=Auth::user()->id;
        $query = $table->save();
        if ($query) {
           return 'true';
        }else{
            return 'false';
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $quotations = Quotation::with('finish', 'edge', 'design', 'user' )->orderBy('id', 'DESC')->get();
         return view('estimate.view_estimate',compact('quotations',));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $quotations = Quotation::with('finish', 'edge', 'design', 'user' )->where('id', $id)->orderBy('id', 'DESC')->get()->first();
        $finishs = Finish::all();
        $edges = Edge::all();
        $designs = Design::all();
        return view('estimate.edit',compact('quotations','finishs','edges','designs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if ($request->sink_bowl_swith_btn == 'on') {
            $sink_bowl_val = $request->sink_bowl;
        }else{
            $sink_bowl_val = '';
        }

        if ($request->hob_cut_swith_btn == 'on') {
            $cooking_hob_status = 1;
            $cooking_hob_width = $request->hob_width;
            $cooking_hob_length = $request->hob_length;
        }else{
            $cooking_hob_status = 0;
            $cooking_hob_width = 0;
            $cooking_hob_length = 0;
        }

        $option = Quotation::find($id);
        // $option->finish->name = $request->finish->name;
        $option->finish_id = $request->finish;
        $option->edge_id   = $request->edge;
        $option->design_id = $request->design;
        $option->substrate = $request->substrate;
        $option->thickness = $request->thickness;
        $option->sink_bowl = $sink_bowl_val;
        $option->cooking_hob_status = $cooking_hob_status;
        $option->cooking_hob_width = $cooking_hob_width;
        $option->cooking_hob_length = $cooking_hob_length;
        $option->save();
        Session::flash('message', "Estimate updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('estimate/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quotation::find($id)->delete();
        Session::flash('alert-class','alert-success');
        Session::flash('message','Estimate deleted successfully!');
        return redirect()->back();
    }

    public function email(Request $request)
    {  
        $finish_data = Finish::find($request->finish);
        $edge_data = Edge::find($request->edge);
        $design_data = Design::find($request->design);
        $dimensions_data = Dimension::where('design_id' , '=' , $request->design)->get();

        $details = [
        'title' => 'Mail from LeadConcept',
        'body' => 'This is for testing email using smtp',
        'finish' => $finish_data ,
        'edge' => $edge_data ,
        'design' => $design_data ,
        'dimensions' => $dimensions_data ,
        'size' => $request->dimensions ,
        'substrate' => $request->substrate ,
        'thickness' => $request->thickness ,
        'sink_bowl_swith_btn' => $request->sink_bowl_swith_btn ,
        'hob_cut_swith_btn' => $request->hob_cut_swith_btn ,
        'sink_bowl_val' => $request->sink_bowl ,
        'hob_length' => $request->hob_length ,  
        'hob_width' => $request->hob_width  
        ];
        $user_email = Auth::user()->email;
        \Mail::to($user_email)->send(new \App\Mail\MyDemoMail($details));
       //         \Mail::to('waqasarif588@gmail.com')->send(new \App\Mail\MyDemoMail($details));

        // \Mail::to($user_email)->cc('bilalkhaira8989@gmail.com')->send(new \App\Mail\MyDemoMail($details));
       
   // exit('iuiuiu');
        echo 'Email is send'; die();
        // return 'Email is send';
    }

    public function after_email_msg()
    {
        return redirect('/')->with('success','Request Sent successfully, We will get back to you Soon, Thank you for using Allcor!');
    }


    public function show_dimensions(Request $request)
    {
        // return $request->input();
        $dimensions_data = Dimension::where('design_id' , '=' , $request->design)->get();
        $data = '<div class="form-group sink_bowl_dimensions">
                              <div class="thiknes_input">
                                <label>Dimensions:</label>
                                  <select class="form-control" id="dimensions_dropdown" name="thickness_size">';
                                   foreach($dimensions_data as $value)
                                    {
                                        foreach($request->dimensions as $key => $val){
                                            $data .= '<option value="'.$val.'">'.$value->name.'</option>';
                                            break;
                                        }
                                        
                                    }
                                  $data .= '</select>

                                  
                                  <span class="thickness_p">
                                    <input type="text" id="dimensions_price" class="form-control thickness_price" value="" name="thickness" readonly>
                                  </span>
                              </div>
                          </div>';
        return $data;
    }
}
