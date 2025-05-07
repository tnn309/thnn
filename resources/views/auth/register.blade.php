@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4 max-w-md">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-8 animate__animated animate__fadeIn">Register</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 animate__animated animateAltogether animate__shakeX" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-2xl p-6 animate__animated animate__fadeInUp">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">UserName</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Re_Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>
            <div class="mb-6">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select id="role" name="role" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
                    <option value="user">User</option>
                    <option value="freelancer">Freelancer</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-3 rounded-lg hover:from-blue-700 hover:to-blue-900 transition duration-300 transform hover:scale-105">Đăng ký</button>
        </form>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
@endsection