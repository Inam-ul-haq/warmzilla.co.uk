<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::all();
        return view('user.view',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|unique:users|email',
            'password'          => 'required|min:8',
        ]);
        // $user = User::create($request->all());
        $password = Hash::make($request->password);
        $user = new User;
        $user->first_name       = $request->first_name;
        $user->last_name        = $request->last_name;
        $user->email            = $request->email;
        $user->password         = $password;
        $user->phone_number     = $request->phone_number;
        $user->save();
        Session::flash('message','User created successfully!');
        Session::flash('alert-class','alert-success');
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        if($user->email!=$request->email)
        {
            $validated = $request->validate([
                'first_name'        => 'required',
                'last_name'         => 'required',
                'email'             => 'required|unique:users|email',
            ]);   
        }else{
            $validated = $request->validate([
                'first_name'        => 'required',
                'last_name'         => 'required',
            ]);
        }
        
        // $user = User::create($request->all());
        $user->first_name       = $request->first_name;
        $user->last_name        = $request->last_name;
        $user->email            = $request->email;
        $user->phone_number     = $request->phone_number;
        $user->save();
        Session::flash('alert-class','alert-success');
        Session::flash('message','User updated successfully!');
          // dd(session()->all());

        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        dd('222');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('alert-class','alert-success');
        Session::flash('message','User deleted successfully!');
        return redirect()->back();
    }
}
