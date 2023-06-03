<?php

namespace App\Http\Controllers\Web\Auth;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('view.dashboard');
        }else{
            return redirect()->route('view.login')->with('message','Email Or Password is Not Correct !!');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        if(User::create($data)){
            return redirect()->route('view.login');
        }else{
            return redirect()->route('view.register')->with('message','Failed to register');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('view.login');
    }

    public function forgot(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|exists:users',
        // ]);

        // $token = Str::random(64);

        // DB::table('password_resets')->insert([
        //     'email' => $request->email,
        //     'token' => $token,
        //     'created_at' => Carbon::now()
        // ]);

        // Mail::send('email.forgot_password', ['token' => $token], function($message) use($request)){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // }

        // return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function reset_password($token)
    {
        return view('view.reset_password', ['token' => $token]);
    }

    public function FunctionName(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'pasword_confirm' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email,
                               'token' => $request->token
                             ])
                             ->first();

        if (!$updatePassword){
            return back()->withInput()->with('message', 'Invalid password reset link');
        }

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('login')->with('message', 'Your password has been changed!');
    }

    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('view.acount')->with('message', 'Data has been edited successfully');
    }
}
