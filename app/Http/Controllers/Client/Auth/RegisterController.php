<?php 

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    public function index() {
        $categories = Category::all();
        $cart = session()->get('cart', []);

        return view('client.harmics.auth.register', compact('categories', 'cart'));
    }

    public function register(Request $request) {
        $messages = [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'name.string' => 'Họ và tên phải là một chuỗi ký tự.',
            'name.max' => 'Họ và tên không được vượt quá 55 ký tự.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.string' => 'Địa chỉ email phải là một chuỗi ký tự.',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.max' => 'Địa chỉ email không được vượt quá 101 ký tự.',
            'email.unique' => 'Địa chỉ email đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu.',
        ];

        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|max:101|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ], $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $data = $request->all();
        // Băm mật khẩu trước khi lưu
        $data['password'] = Hash::make($data['password']);

        // Tạo tài khoản
        $user = User::create($data);
        
        // Gửi email xác nhận
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($user->name, $token));

        return redirect()->route('verify');
    }

    public function verify() {
        $categories = Category::all();
        $cart = session()->get('cart', []);
        
        return view('client.harmics.auth.verify', compact('categories', 'cart'));
    }
}