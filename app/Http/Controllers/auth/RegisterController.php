<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Userlang;
use Illuminate\Validation\Rule;
use Session;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //

    public function register(){
        return view('auth.register');
    }

    public function index(){
        $data = User::with(['userlang'])->latest()->paginate(10);
        return view('auth.index', compact('data'));
    }

    public function finalSubmit(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'contact' => 'required|digits:10',
            'lang' => 'required|array',
            'lang.*' => 'integer'
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->number = $request->contact;
            $user->save();

            foreach ($request->lang as $language) {
                $userlang = new Userlang();
                $userlang->userid = $user->id;
                $userlang->lang = $language;
                $userlang->save();
            }

            return back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {

            \Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function edit($id){
        $data = User::where('id',$id)->with(['userlang'])->first();

        $result = $data->userlang->pluck('lang')->toArray();

        return view('auth.edit', compact('data', 'result'));
    }

    public function update(Request $request,$id){
        // echo "<pre>";print_r($request->all());exit();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'lang' => 'required|array',
            'lang.*' => 'integer'
        ]);
        try {

            $user = User::where('id',$id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->number = $request->contact;
            $user->update();

            $data = Userlang::where('userid',$id)->delete();

            foreach ($request->lang as $language) {
                $userlang = new Userlang();
                $userlang->userid = $user->id;
                $userlang->lang = $language;
                $userlang->save();
            }

            return back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function search(Request $request){
        $data = User::Where('name', 'like', '%' . $request->name . '%')->paginate(10);
        return view('auth.index', compact('data'));
    }

    public function login(){
        return view('auth.login');
    }
    public function userlogin(Request $request){
        // echo "<pre>";print_r($request->all());exit();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember_me') ? true : false; 

        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
        {
            // $user = auth()->user();
            // dd($user);
            return redirect()->route('index');
        }else{
            return back()->with('error','your username and password are wrong.');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
