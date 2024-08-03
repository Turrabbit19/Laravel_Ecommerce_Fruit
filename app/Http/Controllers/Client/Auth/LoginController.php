<?php 

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        $categories = Category::all();
        $cart = session()->get('cart', []);

        return view('client.harmics.auth.login', compact('categories', 'cart'));
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'wrong' => 'Tài khoản hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        \request()->session()->invalidate();
        return redirect('/');
    }

    public function verify($token) {
        $user = User::query()->where('email', base64_decode($token))
            ->where('email_verified_at', null)->first();
        if ($user) {
            $user->update(['email_verified_at' => Carbon::now()]);
            Auth::login($user);
            \request()->session()->regenerate();
            return redirect()->intended('/');
        }
    }
}