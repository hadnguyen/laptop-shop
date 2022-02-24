<?php

namespace App\Http\Controllers;

use App\Models\Nhomsanpham;
use App\Models\Sanpham;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function dashboard()
    {
        $orders = Order::orderBy("created_at", "DESC")->get();
        $order_count = Order::count();
        $product_count = Sanpham::count();
        $category_count = Nhomsanpham::count();
        $customer_count = User::where('level',2)->count();
        if(request()->date_from && request()->date_to) {
            $orders = Order::where('trangthai',1)
            ->whereBetween('created_at', [request()->date_from, request()->date_to])->get();
        }
        return view('admin.dashboard', compact('orders','order_count','product_count','category_count','customer_count'));
    }

    public function getlogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login');
        }
    }
    public function postlogin(Request $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
        ];

        if (Auth::attempt($login, $request->chkRemember)) {
            $user = Auth::user();
            $request->session()->regenerate();

            if (($user->level == 0) || ($user->level == 1)) {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return redirect()->intended(route('home'));
            }
        } else {
            return redirect()->back()->with('status', 'Email hay Password không chính xác');
        }
    }
    public function getlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getlogin');
    }
}
