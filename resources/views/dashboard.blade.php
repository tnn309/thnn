@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-8 animate__animated animate__fadeIn">Bảng điều khiển</h2>
        @if (auth()->check())
            <div class="text-center mb-8 animate__animated animate__fadeIn">
                <p class="text-lg text-gray-600">Chào <span class="font-semibold text-blue-600">{{ auth()->user()->username }}</span>! Vai trò: <span class="font-semibold text-blue-600">{{ ucfirst(auth()->user()->role) }}</span></p>
            </div>
        @endif

        <!-- Hiển thị lịch sử booking -->
        <div class="bg-white shadow-xl rounded-2xl p-6 mb-8 animate__animated animate__fadeInUp">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Lịch sử đặt lịch</h3>
            @if ($bookings->isEmpty())
                <p class="text-gray-600">Bạn chưa có lịch đặt nào.</p>
            @else
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($bookings as $booking)
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <p><strong>Freelancer:</strong> {{ $booking->freelancer->user->username }}</p>
                            <p><strong>Thời gian:</strong> {{ $booking->booking_date->format('d/m/Y H:i') }}</p>
                            <p><strong>Trạng thái:</strong> {{ ucfirst($booking->status) }}</p>
                            @if ($booking->description)
                                <p><strong>Mô tả:</strong> {{ $booking->description }}</p>
                            @endif
                            @if ($booking->duration)
                                <p><strong>Thời lượng:</strong> {{ $booking->duration }} giờ</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Danh sách lĩnh vực -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($fields as $field)
                @php
                    $count = \App\Models\Freelancer::where('field', $field)->count();
                    $freelancer = \App\Models\Freelancer::where('field', $field)->first();
                @endphp
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 animate__animated animate__fadeInUp">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $field }}</h3>
                    <p class="text-gray-600 mb-4">Số lượng: <span class="font-medium text-blue-600">{{ $count }}</span></p>
                    <a href="{{ route('freelancers.index') }}?field={{ urlencode($field) }}" class="block text-center bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-2 rounded-lg hover:from-blue-700 hover:to-blue-900 transition duration-300 transform hover:scale-105 mb-2">Xem Freelancer</a>
                    @if ($freelancer && auth()->check())
                        <a href="{{ route('bookings.create', $freelancer->id) }}" class="block text-center bg-gradient-to-r from-green-600 to-green-800 text-white font-semibold py-2 rounded-lg hover:from-green-700 hover:to-green-900 transition duration-300 transform hover:scale-105">Đặt lịch</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
@endsection