<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/dashboard'); // untuk user biasa
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $userModel = new User();
            $userModel->name = $request->name;
            $userModel->email = $request->email;
            $userModel->password = Hash::make($request->password);
            $userModel->role = 'user';
            $userModel->save();

            $model = new StudentModel();
            $model->user_id = $userModel->id;
            $model->status = 'register';
            $model->fill($request->all());
            $model->save();

            DB::commit();

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();

                $user = Auth::user();

                return redirect()->intended('/register/dashboard'); // untuk user biasa
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Registrasi gagal',
                'user' => $userModel
            ], 201);
        }
    }

    public function logout()
    {
        Auth::logout(); // keluar dari sesi
        request()->session()->invalidate(); // hapus sesi
        request()->session()->regenerateToken(); // regenerasi CSRF token

        return redirect()->route('login'); // arahkan ke halaman login
    }
}
