<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create(){
        return view('auth.create');
    }
  
    public function store() {
        $formDatas = request()->validate([
            'name'=>['required','min:3','max:228'],
            'username'=>['required',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:3','max:102']
        ]);
        $user = User::create($formDatas);
        auth()->login($user);

        return redirect('/')->with('success',"Hello Welcome $user->name"); //(with = session->flash('success',$user->name))
    }
    public function logout() {
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }
    public function login() {
        return view('auth.login');
        
    }
    public function post_login() {
        $formDatas = request()->validate([
            "email"=>['required','email','max:255',Rule::exists('users','email')],
            "password"=>['required','min:1','max:255']
        ],[
            'email.required'=>"We need your email address.",
            'password.min'=>'Password more than 8'
        ]);

        if(auth()->attempt($formDatas)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs/index');
            }else {
                return redirect('/')->with('success',"Welcome Back");
            }
           
        }
        else{
            return redirect()->back()->withErrors([
                'email'=>"User Credentials wrong"

            ]);
        }
        
        
    }
}
