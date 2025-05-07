@extends('layouts.app')

@section('title', 'Giới Thiệu - Hệ Thống Đặt Lịch')

@section('content')
    <div class="container mx-auto py-10">
        <!-- Section 1: Tại sao không hiệu quả -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 transform transition duration-300 hover:-translate-y-2" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="md:w-1/2">
                    <img src="https://www.vlance.vn/img/vn/homepage-new/tai-sao-khong-hieu-qua.png" alt="Vấn đề của đơn vị truyền thống" class="rounded-lg shadow-md w-full h-64 object-cover">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Tại sao sử dụng dịch vụ đơn vị truyền thống không hiệu quả?</h2>
                    <p class="text-gray-600 mb-6">Nhiều đơn vị truyền thống không thực hiện báo cáo các bước triển khai khiến khách hàng không an tâm và không thấy được kết quả cụ thể.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-lg text-gray-700"><span class="text-red-500 mr-2">❌</span> Không kiểm soát chất lượng sản phẩm</li>
                        <li class="flex items-center text-lg text-gray-700"><span class="text-red-500 mr-2">❌</span> Quy trình triển khai phức tạp</li>
                        <li class="flex items-center text-lg text-gray-700"><span class="text-red-500 mr-2">❌</span> Trao đổi làm việc không rõ ràng</li>
                        <li class="flex items-center text-lg text-gray-700"><span class="text-red-500 mr-2">❌</span> Thiếu báo cáo hiệu quả công việc</li>
                    </ul>
                    <a href="#" class="mt-6 inline-block bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-blue-900 transition duration-300">Tìm hiểu các lợi ích từ QLT Finder</a>
                </div>
            </div>
        </div>

        <!-- Section 2: Giải pháp bền vững -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 transform transition duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">QLT Finder mang đến giải pháp <span class="text-blue-600 font-semibold">bền vững</span></h2>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start"><span class="text-green-500 mr-2 mt-1">📌</span> <span><strong>Quản lý chặt chẽ:</strong> Đều có chuyên gia kiểm soát và đánh giá từng bước thực hiện.</span></li>
                        <li class="flex items-start"><span class="text-green-500 mr-2 mt-1">📌</span> <span><strong>Quy trình tinh gọn:</strong> Chúng tôi giản lược các bước thực hiện không phù hợp.</span></li>
                        <li class="flex items-start"><span class="text-green-500 mr-2 mt-1">📌</span> <span><strong>Tương tác nhanh chóng:</strong> Trao đổi và hỗ trợ giải đáp thắc mắc mọi lúc.</span></li>
                        <li class="flex items-start"><span class="text-green-500 mr-2 mt-1">📌</span> <span><strong>Báo cáo thường xuyên:</strong> Báo cáo tiến độ và hiệu quả hàng tuần, hàng tháng.</span></li>
                    </ul>
                    <a href="#" class="mt-6 inline-block bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-blue-900 transition duration-300">Xem các dịch vụ do QLT Finder cung cấp</a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://www.vlance.vn/img/vn/design-business/benefit.png" alt="Giải pháp của QLT_Finder Business" class="rounded-lg shadow-md w-full h-64 object-cover">
                </div>
            </div>
        </div>

        <!-- Section 3: Dịch vụ -->
        <div class="text-center mb-8" data-aos="fade-up" data-aos-delay="200">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">QLT Finder đáp ứng nhu cầu phát triển toàn diện</h1>
            <p class="text-gray-600 mb-8">Xuyên suốt toàn bộ hoạt động của doanh nghiệp</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-4 transform transition duration-300 hover:-translate-y-2" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://vtc.edu.vn/wp-content/uploads/2022/06/nghanh-thiet-ke-do-hoa-la-gi.jpg" alt="Thiết kế" class="rounded-lg w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Thiết kế</h3>
                    <p class="text-gray-600 mt-2">Phong cách chuyên nghiệp hiện đại nâng cao nhận diện thương hiệu.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-4 transform transition duration-300 hover:-translate-y-2" data-aos="zoom-in" data-aos-delay="400">
                    <img src="https://courses.funix.edu.vn/asset-v1:FUNiX+WEB101x_03_VN+2019_T7+type@asset+block@Building-your-Own-Personal-Website.jpg" alt="Xây dựng website" class="rounded-lg w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Xây dựng website</h3>
                    <p class="text-gray-600 mt-2">Xây dựng website có giao diện thân thiện, dễ sử dụng.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-4 transform transition duration-300 hover:-translate-y-2" data-aos="zoom-in" data-aos-delay="500">
                    <img src="https://i0.wp.com/crmviet.vn/wp-content/uploads/2019/05/content-marketing-la-gi.jpg?fit=600%2C463&ssl=1" alt="Viết bài" class="rounded-lg w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Viết bài</h3>
                    <p class="text-gray-600 mt-2">Triển khai nội dung đạt chuẩn SEO truyền tải thông điệp tới khách hàng.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-4 transform transition duration-300 hover:-translate-y-2" data-aos="zoom-in" data-aos-delay="600">
                    <img src="https://vcdn1-kinhdoanh.vnecdn.net/2023/10/10/qq-8853-1696919956.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=WGJoNx_nkcaUI4XYQ6UwgA" alt="Triển khai quảng cáo" class="rounded-lg w-full h-40 object-cover mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Triển khai quảng cáo</h3>
                    <p class="text-gray-600 mt-2">Đa kênh Google, Facebook, Zalo... để đạt chuyển đổi cao nhất.</p>
                </div>
            </div>
        </div>

        <!-- Section 4: Form Liên Hệ -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 transform transition duration-300 hover:-translate-y-2" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Liên hệ với chúng tôi</h2>
            <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Họ và tên</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Tin nhắn</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold py-3 px-6 rounded-lg hover:from-blue-700 hover:to-blue-900 transition duration-300">Gửi Liên Hệ</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .highlight {
            color: #457b9d;
            font-weight: 600;
        }
        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }
        .space-y-4 > * + * {
            margin-top: 1rem;
        }
    </style>
@endsection