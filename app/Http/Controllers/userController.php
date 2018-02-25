<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Notification;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('superadmin', ['only' => ['create', 'store', 'index', 'delete']]);    
    }
    public function index()
    {
        //
        $users = User::paginate(10);
        return view('user.index')->with('users',$users);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //    
        return view('user.create');
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
        $this->validate($request,User::$rules);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            ]);
        $notification = "You have been create at ".date("Y/m/d h:i:sa");
        // Notification::create([
        //     'hotel_id' => 2,
        //     'content' => $notification,
        //     ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        $show_user = User::findOrFail($id);
        if ($user->can('edit', $show_user)) {
            return view('user.show')->with('user',$show_user);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = \Auth::user();
        $edit_user = User::findOrFail($id);
        if ($user->can('edit', $edit_user)) {
            return view('user.edit')->with('user',$user);
        }
        return redirect()->back();
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
        //
        $user = \Auth::user();
        $update_user=User::findOrFail($id);
        $this->validate($request,User::$rules);
        if ($user->can('edit', $show_user)) {
            $user->update($request);
            Session::flash('message','You have updated your profile successfully.');
            return view('user.index');
        }
        Session::flash('message','You cannot update.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $des_user = User::findOrFail($id);
        $user = \Auth::user();
        if ($user->can('destroy', $des_user)) {
            $des_user->delete();
            $message = "You have destroyed ".$user->name."\'s account.";
            Session::flash('message',$message);
            return redirect()->route('user.index');
        }
        Session::flash('message','Super Admin cannot be destroyed.');
        return redirect()->back();
    }
}
