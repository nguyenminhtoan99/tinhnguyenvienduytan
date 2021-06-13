<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feedback;
class FeedbackController extends Controller
{
    public function index()
    {
         return view('main.pages.contact');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $status = Feedback::create($data);
        // if ($data) {
        //     toastr()->success('Gởi phản hồi thành công!', 'Thông báo', ['timeOut' => 2000]);
        // } else {
        //     toastr()->error('Gởi phản hồi thất bại');
        //     return back();
        // }
        // return redirect();
        if ($status) {
            toastr()->success('Đã gửi phản hồi', 'Thông báo', ["positionClass" => "toast-top-right", 'timeOut' => 1000]);
        } else {
            toastr()->error('Phản hồi thất bại!');
            return redirect()->back();
        }
        return redirect()->route('home');

    }
}
