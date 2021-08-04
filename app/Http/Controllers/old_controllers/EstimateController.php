<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Finish;
use App\Models\Edge;
use App\Models\Design;
use App\Models\Dimension;
use App\Models\Quotation;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finishes   = Finish::all();
        $edges      = Edge::all();
        $designs    = Design::all();
        return view('estimate',compact('finishes','edges','designs'));
    }
    public function getDimensions()
    {
        $design_id = $_POST['design_id'];
        $dimensions = Dimension::where('design_id',$design_id)->get();
        $dimensions_HTML = '<div class="col-md-6 selected_design">
                                <h4 class="pl-3 text-center">'.$dimensions[0]->design->name.'</h4>
                                <img src="'.asset('images/designs/'.$dimensions[0]->design->filename).'">
                            </div>
                            <div class="col-md-6 dimensions">
                            <h4 class="pl-3 text-center">Select Dimensions:</h4>
                                <table>
                                  <thead>
                                    <tr>
                                      <th width="30%"></th>
                                      <th width="20%"></th>
                                      <th width="35%"></th>
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
                                      <input type="number" min="12" class="form-control mb-2 dimension_input" id="dimension_input_'.$key.'" name="dimensions['.$dimension->id.']">
                                    </td>
                                    <td>
                                      <label for="switch_side_'.$dimension->name.'" class="mr-sm-2">Has BackSplash:</label>
                                    </td>
                                    <td>
                                      <label class="switch float-right"> <input type="checkbox" id="switch_side_'.$dimension->name.'" class="switch_side" name="dimension_btn[]" value="'.$dimension->id.'"> <span class="slider round"></span> </label>
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
        $finish_data = Finish::find($request->finish);

        $edge_data = Edge::find($request->edge);

        $design_data = Design::find($request->design);

        $dimensions_data = Dimension::where('design_id' , '=' , $request->design)->get();

        $data = '<div class="estimate_dv">
                    <p>This estimate is approximate and only reflects current selections and options. The price does not include installation. See a Lowes Kitchen Design Specialist for exact pricing and installation options.</p>
                    <span>Total Estimate: $195.00 to $215.25</span>
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
                        <div class="col-md-3"><span>'.$edge_data->price.'</span></div>
                        <div class="col-md-3">
                            <img src="'.asset('images/edges/'.$edge_data->filename).'" alt="..." class="img-thumbnail rounded">
                        </div>
                    </div>

                    <h4>Design:</h4>
                    <div class="row estimate_item_rw estimate_rw">
                        <div class="col-md-3">
                            <span>'.$design_data->name.'</span>
                        </div>
                        <div class="col-md-3">
                            <ol>
                                <li><b>Dimensions</b></li>';
                                foreach($dimensions_data as $value)
                                {
                                    $data .= '<li>'.$value->name.'</li>';
                                }
                            $data .='</ol>
                        </div>
                        <div class="col-md-3">
                            <ol class="size_list">
                                <li><b>Size</b></li>';
                                foreach($request->dimensions as $key => $val)
                                {
                                    $data .= '<li>'.$val.'</li>';
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
                            <p>'.$request->thickness.' mm</p>
                        </div>
                    </div>';

                    if ($request->sink_bowl_swith_btn == 'on') {
                        $data .= '
                            <div class="row estimate_item_rw">
                                <div class="col-md-3">
                                    <h5>Sink Bowl:</h5>
                                </div>
                                <div class="col-md-9">
                                    <p>'.$request->sink_bowl.'</p>
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
                                        <div class="col-md-4">'.$request->hob_length.' Inches</div>
                                        <div class="col-md-2">Width:</div>
                                        <div class="col-md-4">'.$request->hob_width.' Inches</div>
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

        $table = new Quotation;
        $table->finish_id = $request->finish;
        $table->finish_price = Finish::find($request->finish)->price;

        $table->edge_id = $request->edge;
        $table->edge_price = Edge::find($request->edge)->price;

        $table->design_id = $request->design;
        $table->design_dimensions = json_encode($request->dimensions);

        $table->substrate = $request->substrate;
        $table->thickness = $request->thickness;
        $table->sink_bowl = $sink_bowl_val;
        $table->cooking_hob_status = $cooking_hob_status;
        $table->cooking_hob_width = $cooking_hob_width;
        $table->cooking_hob_length = $cooking_hob_length;
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
    public function show(Estimate $estimate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        //
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
   
        \Mail::to('bilalkhaira8989@gmail.com')->send(new \App\Mail\MyDemoMail($details));
   
        return 'Email is send';
    }

    public function after_email_msg()
    {
        return redirect('/')->with('success','Data Save successfully!');
    }
}
