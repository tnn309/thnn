@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4 bg-pink-200">
        <h2 class="text-4xl font-extrabold text-center text-white bg-navy-800 py-4 rounded-lg mb-8 animate__animated animate__fadeIn" style="background-color: #1e3a8a;">Tìm Freelancer</h2>

        <div class="bg-white shadow-xl rounded-2xl p-6 mb-8 animate__animated animate__fadeInUp">
            <form method="GET" action="{{ route('freelancers.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div>
                    <label for="field" class="block text-sm font-medium text-gray-700 mb-2">Lĩnh vực</label>
                    <input type="text" id="field" name="field" value="{{ request('field') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-navy-600 transition duration-200" placeholder="VD: IT, Marketing">
                </div>
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Đánh giá tối thiểu</label>
                    <input type="number" id="rating" name="rating" value="{{ request('rating') }}" step="0.1" min="1" max="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-navy-600 transition duration-200" placeholder="VD: 4.5">
                </div>
                <div>
                    <label for="hourly_rate" class="block text-sm font-medium text-gray-700 mb-2">Giá tối đa ($/giờ)</label>
                    <input type="number" id="hourly_rate" name="hourly_rate" value="{{ request('hourly_rate') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-navy-600 transition duration-200" placeholder="VD: 50">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-navy-800 text-white font-semibold py-3 rounded-lg hover:bg-navy-700 transition duration-300 transform hover:scale-105" style="background-color: #1e3a8a; hover:bg-color: #123456;">Tìm kiếm</button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($freelancers as $index => $freelancer)
                <div class="bg-white rounded-2xl shadow-lg p-6 transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 100 }}ms">
                    <div class="relative">
                        <img src="{{ asset($freelancer->avatar) }}" class="rounded-full w-24 h-24 mx-auto mb-4 object-cover border-4 border-pink-100 shadow-md" alt="{{ $freelancer->user->username }} Avatar" onerror="this.src='{{ asset('image/profile1.jpg') }}'">
                        <div class="absolute top-0 right-0 bg-navy-800 text-white text-xs font-bold px-2 py-1 rounded-full" style="background-color: #1e3a8a;">Đánh giá: {{ $freelancer->rating ?? 'N/A' }}</div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 text-center mb-2">{{ $freelancer->user->username }}</h4>
                    <p class="text-gray-600 text-center mb-1"><span class="font-medium text-navy-600">Lĩnh vực:</span> {{ ucfirst($freelancer->field) }}</p>
                    <p class="text-gray-600 text-center mb-4"><span class="font-medium text-navy-600">Giá:</span> ${{ $freelancer->hourly_rate ?? 'N/A' }}/giờ</p>
                    <button data-freelancer-id="{{ $freelancer->id }}" class="view-profile-btn block w-full text-center bg-navy-800 text-white font-semibold py-2 rounded-lg hover:bg-navy-700 transition duration-300 transform hover:scale-105" style="background-color: #1e3a8a; hover:bg-color: #123456;">Xem hồ sơ</button>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-600 py-8 animate__animated animate__fadeIn">
                    <p class="text-lg">Không tìm thấy freelancer nào. Vui lòng thử lại với điều kiện khác!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $freelancers->links('pagination::tailwind') }}
        </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
    <style>
        .pagination .page-item.active .page-link {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
            color: white;
        }
        .pagination .page-link {
            color: #1e3a8a;
            border-radius: 0.375rem;
            margin: 0 2px;
            transition: all 0.3s ease;
        }
        .pagination .page-link:hover {
            background-color: #e0e7ff;
        }
        .bg-navy-800 { background-color: #1e3a8a; }
        .bg-navy-700 { background-color: #123456; }
        .text-navy-600 { color: #1e40af; }
        .focus:ring-navy-600 { --tw-ring-color: #1e40af; }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.view-profile-btn').forEach(button => {
            button.addEventListener('click', function() {
                const freelancerId = this.getAttribute('data-freelancer-id');

                // Gửi request để lấy dữ liệu freelancer
                fetch(`/freelancers/${freelancerId}/json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const freelancer = data.freelancer;
                            Swal.fire({
                                title: `<strong>Hồ sơ của ${freelancer.user.username}</strong>`,
                                html: `
                                    <div class="text-center mb-4">
                                        <img src="${freelancer.avatar_url}" alt="${freelancer.user.username} Avatar" class="rounded-full w-24 h-24 mx-auto object-cover border-4 border-blue-100 shadow-md" onerror="this.src='{{ asset('image/profile1.jpg') }}'">
                                    </div>
                                    <div class="text-left">
                                        <p><strong>Lĩnh vực:</strong> ${freelancer.field || 'N/A'}</p>
                                        <p><strong>Giá:</strong> $${freelancer.hourly_rate || 'N/A'}/giờ</p>
                                        <p><strong>Đánh giá:</strong> ${freelancer.rating || 'N/A'}</p>
                                        <p><strong>Tiểu sử:</strong> ${freelancer.bio || 'Chưa có tiểu sử'}</p>
                                        <p><strong>Kỹ năng:</strong> ${freelancer.skills ? freelancer.skills.split(', ').join(', ') : 'Chưa có kỹ năng'}</p>
                                    </div>
                                `,
                                icon: 'info',
                                confirmButtonText: 'Đóng',
                                confirmButtonColor: '#1e3a8a',
                                customClass: {
                                    popup: 'rounded-lg shadow-lg',
                                    title: 'text-2xl font-bold',
                                    htmlContainer: 'text-gray-700'
                                },
                                width: '600px',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Không thể tải thông tin freelancer.',
                                confirmButtonColor: '#1e3a8a',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Có lỗi xảy ra khi tải dữ liệu.',
                            confirmButtonColor: '#1e3a8a',
                        });
                    });
            });
        });
    </script>
@endsection