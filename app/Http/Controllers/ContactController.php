<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Lưu vào database (cần tạo migration và model nếu muốn)
        // Ví dụ: Contact::create($data);

        return redirect()->back()->with('success', 'Cảm ơn bạn! Tin nhắn của bạn đã được gửi thành công.');
    }
}