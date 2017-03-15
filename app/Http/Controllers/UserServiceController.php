<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Auth;
use Storage;

class UserServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')->get();

        return view('service.user.index',[
            'pageTitle' => 'TTHC của tôi',
            'services' => $services
        ]);
    }

    public function store(Request $request)
    {
        $service = new Service();
        $service->user_id = Auth::user()->id;
        $service->organization = $request->organization;
        $service->code = 'U'.Auth::user()->id.'T'.time();
        $service->fields = $request->fields;
        $service->type = $request->type;
        $service->description = $request->description;
        $service->attach = Storage::putFileAs(
            $request->user()->id, $request->file('attach'),
            $service->code.'-'.$request->file('attach')->getClientOriginalName()
        );
        $service->save();

        return redirect('/service/me')->with([
            'type' => 'success',
            'message' => "Yêu cầu của bạn đã được gửi"
        ]);
    }
}
