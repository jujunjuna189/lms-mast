@extends('components/layout/layout')
@section('content')
<div class="w-full h-screen bg-gradient-to-r from-green-100 via-green-300 to-green-600 flex items-center justify-center">
    <!-- Card Login -->
    <div class="bg-white shadow-xl rounded-xl w-[50%] max-w-[50%] overflow-hidden">
        <div class="grid grid-cols-2">
            <div class="bg-slate-100">
                <img src="{{ asset('assets/image/image1.jpeg') }}" alt="logo" class="w-full h-full object-cover">
            </div>
            <div class="px-8 py-14">
                <div class="flex justify-center items-center mb-5">
                    <div class="w-20 h-20 rounded-full">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="w-full h-full">
                    </div>
                </div>
                <h1 class="text-xl font-bold text-center text-slate-800">Masuk dengan Akun</h1>
                <p class="text-center text-sm">Baru! Nikmati kemudahan sistem autentikasi tunggal untuk mengakses semua layanan dengan satu akun.</p>
                <form action="{{ route('login.auth') }}" method="POST" class="space-y-4 mt-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username/Email</label>
                        <input type="text" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Masukkan Username atau email">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="********">
                    </div>
                    <button type="submit" class="w-full bg-green-800 text-white py-2 rounded-lg hover:bg-green-700 transition">Masuk</button>
                </form>

                <p class="text-sm text-gray-500 text-center mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-800 underline">Daftar</a> atau Hubungi admin sekolah.</p>
            </div>
        </div>
    </div>
</div>
@endsection