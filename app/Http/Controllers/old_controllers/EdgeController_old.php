<?php

namespace App\Http\Controllers;
use App\Models\Edge;
use Session;
use Illuminate\Http\Request;

class EdgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edges  = Edge::all(); 
        $title  = 'Edges'; 
        return view('Edge.view_edge',compact('edges','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Edge";
        return view('Edge.create_edge',compact('title'));
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
            'edge_name'             => 'required',
            'edge_price'            => 'required',
            'edge_img'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $edge = new Edge;
        $edge->name            = $request->edge_name;
        $edge->description     = $request->description;
        $edge->price           = $request->edge_price;

        if($request->hasFile('edge_img')){
          $image = $request->file('edge_img');
          $filename = 'edge_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath = public_path('/images/edges');
          $image->move($destinationPath, $filename);
          $edge->filename       = $filename;
        };
        $edge->save();
        Session::flash('message', "Edge added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('edges');
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
        $edge   = Edge::find($id);
        $title  = "Edit Edge";
        return view('Edge.edit_edge',compact('edge','title'));
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
        $this->validate($request, [
            'edge_name'             => 'required',
            'edge_price'            => 'required',
            'edge_img'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $edge = Edge::find($id);
        // dd($edge->filename);
        $edge->name            = $request->edge_name;
        $edge->description     = $request->description;
        $edge->price           = $request->edge_price;

        if($request->hasFile('edge_img')){
          $image = $request->file('edge_img');
          $filename = 'edge_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath      = public_path('/images/edges');
          $image->move($destinationPath, $filename);
          $fileRemove           = @unlink(public_path("images/edges/$edge->filename"));
          $edge->filename       = $filename;
        };
        $edge->save();
        Session::flash('message', "Edge Updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('edges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edge       = Edge::find($id);
        $fileRemove = @unlink(public_path("images/edges/$edge->filename"));
        if($fileRemove)
        {
            $edge->delete();
            Session::flash('message', "Edge deleted successfully!");
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message', "Edge not deleted.");
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('edges');
    }
}
