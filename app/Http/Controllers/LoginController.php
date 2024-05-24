<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
class LoginController 
{
    public function showLoginForm()
    {
        return view('login'); // Make sure the view name is correct
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'TenUser' => ['required'],
            'MatKhau' => ['required'],
        ]);

        // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
        $user = User::where('TenUser', $request->TenUser)->first(); // Tìm người dùng theo TenUser

        if ($user && $request->MatKhau == $user->MatKhau) {
            // Đăng nhập thành công
            Auth::login($user); // Đăng nhập người dùng
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'TenUser' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // ...
}
