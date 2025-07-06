@extends('components/layout/layout')
@section('content')
<div class="w-full h-screen bg-gradient-to-r from-green-100 via-green-300 to-green-600 flex items-center justify-center">
    <!-- Card Login -->
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <div class="px-8 py-14">
            <div class="flex justify-center items-center mb-5">
                <div class="w-20 h-20 rounded-full">
                    <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" class="w-full h-full">
                </div>
            </div>
            <h1 class="text-xl font-bold text-center text-slate-800">Daftar Siswa MASTERPAK Pakunagara</h1>
            <p class="text-center text-sm">Selamat datang di halaman Daftar Siswa MASTERPAK</p>
            <form action="{{ route('register.auth') }}" method="POST" class="space-y-4 mt-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Masukkan Nama Lengkap anda">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No Wa/Hp</label>
                    <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Masukkan Nama Lengkap anda">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username/Email</label>
                    <input type="text" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Masukkan Username atau email">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="********">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="********">
                </div>
                <button type="submit" class="w-full bg-green-800 text-white py-2 rounded-lg hover:bg-green-700 transition">Daftar</button>
            </form>

            <p class="text-sm text-gray-500 text-center mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-800 underline">Masuk</a> Aplikasi.</p>
        </div>
    </div>
</div>
@endsection