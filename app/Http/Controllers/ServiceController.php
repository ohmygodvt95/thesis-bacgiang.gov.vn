<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $today = Service::whereDate('updated_at', Carbon::now()->toDateString())
            ->orderBy('id', 'DESC')
            ->where('status', 2)->limit(5)->get();
        $receive = Service::all()->count();
        $success = Service::where('status', 2)->count();
        return view('service.index', [
            'pageTitle' => 'Hành chính công',
            'today' => $today,
            'receive' => $receive,
            'success' => $success
        ]);
    }

    public function check(Request $request)
    {
        $service = Service::where('code', $request->code)->first();
        return view('service.check', [
            'item' => $service
        ]);
    }
}
