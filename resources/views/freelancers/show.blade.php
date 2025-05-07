@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4 max-w-4xl">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-xl p-8 animate__animated animate__fadeIn">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Avatar -->
                <div class="relative">
                    <img src="{{ asset($freelancer->avatar) }}" class="rounded-full w-32 h-32 md:w-40 md:h-40 object-cover border-4 border-blue-100 shadow-lg" alt="{{ $freelancer->user->username }} Avatar" onerror="this.src='{{ asset('image/profile1.jpg') }}'">
                    <div class="absolute bottom-0 right-0 bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full shadow-md">Đánh giá: {{ $freelancer->rating ?? 'N/A' }}</div>
                </div>
                <!-- Thông tin -->
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $freelancer->user->username }}</h2>
                    <p class="text-gray-600 mb-2"><span class="font-medium text-blue-600">Lĩnh vực:</span> {{ ucfirst($freelancer->field) }}</p>
                    <p class="text-gray-600 mb-4"><span class="font-medium text-blue-600">Giá:</span> ${{ $freelancer->hourly_rate ?? 'N/A' }}/giờ</p>
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Tiểu sử</h3>
                        <p class="text-gray-600">{{ $freelancer->bio }}</p>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kỹ năng</h3>
                        <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                            @foreach (explode(', ', $freelancer->skills) as $skill)
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    @auth
                        <a href="{{ route('bookings.create', $freelancer->id) }}" class="inline-block bg-gradient-to-r from-green-600 to-green-800 text-white font-semibold py-3 px-6 rounded-lg hover:from-green-700 hover:to-green-900 transition duration-300 transform hover:scale-105">Đặt lịch ngay</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
@endsection