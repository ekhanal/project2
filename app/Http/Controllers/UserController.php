<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|max:16|confirmed'
        ]);
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('login')->with('success','User registered successfully.');
    
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
        //
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
    }
    public function login(Request $request){
        if($request->isMethod('get')){
            return view('login');
        }
        if($request->isMethod('post')){
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
             if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
               
                Session::put('loggedin',true);
                return redirect('/');
            }else{
                return redirect()->back()->with('error','Username or password invalid!');

            }
        }

       

    }
    public function logout(){
        Session::flush();
        return redirect('login');
    }

}

