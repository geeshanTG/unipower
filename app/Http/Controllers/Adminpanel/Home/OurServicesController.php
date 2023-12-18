<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;

class OurServicesController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:our-services-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $services = Service::where('is_delete', 0)->where('status', 'Y')->orderBy('heading', 'ASC')->get();
        $data = OurService::first();

        return view('adminpanel.home.our_services', compact('data', 'services'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'service_id_1' => 'required',
            'service_id_2' => 'required',
            'service_id_3' => 'required',
            'service_id_4' => 'required',
        ]);

        $data =  OurService::find($request->id);
        $data->service_id_1 = $request->service_id_1;
        $data->service_id_2 = $request->service_id_2;
        $data->service_id_3 = $request->service_id_3;
        $data->service_id_4 = $request->service_id_4;
        $data->save();

        \LogActivity::addToLog('Our service updated.');

        return redirect()->route('our-services-edit')
            ->with('success', 'Our services updated successfully.');
    }

}
