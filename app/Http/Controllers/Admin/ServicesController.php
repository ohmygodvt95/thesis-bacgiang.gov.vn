<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    protected $perPage = 20;

    public function index(Request $request)
    {
        $services = null;
        if($request->has('query')){
            $services = Service::where('status', $request->input('query'))->orderBy('id', 'DESC')->paginate($this->perPage);
            $services->withPath('/admin/services?query='.$request->input('query'));
        }
        else $services = Service::orderBy('id', 'DESC')->paginate($this->perPage);

        return view('admin.services.index',[
            'pageTitle' => 'Management Services',
            'services' => $services
        ]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit',[
            'pageTitle' => 'Edit status request',
            'service' => $service
        ]);
    }

    public function update(Service $service, Request $request)
    {
        $service->status = $request->status;
        $service->update();

        return redirect()->action(
            'Admin\ServicesController@edit', ['id' => $service->id]
        )->with([
            'type' => 'success',
            'message' => 'Status update successful'
        ]);
    }
}
