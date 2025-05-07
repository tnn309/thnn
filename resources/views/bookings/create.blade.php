@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Đặt lịch với {{ $freelancer->user->username }}</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach         
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
            <div class="mb-3">
                <label for="booking_date" class="form-label">Ngày đặt lịch</label>
                <input type="datetime-local" class="form-control" id="booking_date" name="booking_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Đặt lịch</button>
        </form>
    </div>
@endsection