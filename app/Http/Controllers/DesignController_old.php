<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\Dimension;
use Session;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs = Design::all();
        return view('design.view_design',compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('design.create_design');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dimensions = $request->dimensions;
        $this->validate($request, [
            'design_name'             => 'required',
            'design_img'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $design = new Design;
        $design->name            = $request->design_name;
        $design->description     = $request->description;

        if($request->hasFile('design_img')){
          $image = $request->file('design_img');
          $filename = 'design_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath = public_path('/images/designs');
          $image->move($destinationPath, $filename);
          $design->filename       = $filename;
        };
        $design->save();
        foreach ($dimensions as $key => $dimension) {
            $new_dimension = new Dimension;
            $new_dimension->design_id = $design->id;
            $new_dimension->name = $dimension;
            $new_dimension->save();
        }
        Session::flash('message', "Design added successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('designs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $design     = Design::find($id);
        $title      = "Edit design";
        return view('design.edit_design',compact('design','title'));
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
        $dimensions = $request->dimensions;
        $this->validate($request, [
            'design_name'             => 'required',
            'design_img'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $design = Design::find($id);
        $design->name            = $request->design_name;
        $design->description     = $request->description;

        if($request->hasFile('design_img')){
          $image = $request->file('design_img');
          $filename = 'design_' .time() . '.' . $image->getClientOriginalExtension();
          // Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
          $destinationPath      = public_path('/images/designs');
          $image->move($destinationPath, $filename);
          $fileRemove           = @unlink(public_path("images/designs/$design->filename"));
          $design->filename     = $filename;
        };
        $design->save();
        Dimension::where('design_id',$design->id)->delete();
        foreach ($dimensions as $key => $dimension) {
            $new_dimension              = new Dimension;
            $new_dimension->design_id   = $design->id;
            $new_dimension->name        = $dimension;
            $new_dimension->save();
        }
        Session::flash('message', "Design updated successfully!");
        Session::flash('alert-class', 'alert-success'); 
        return redirect('designs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design       = Design::find($id);
        $fileRemove   = @unlink(public_path("images/designs/$design->filename"));
        if($fileRemove)
        {
            Dimension::where('design_id',$design->id)->delete();
            $design->delete();
            Session::flash('message', "Design deleted successfully!");
            Session::flash('alert-class', 'alert-success');
        }else{
            Session::flash('message', "Design not deleted.");
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('designs');
    }
}
