<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePageContent;
use Illuminate\Http\Request;
use DataTables;

class ServicesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:services-page-content-edit', ['only' => ['index,pageContentupdate']]);
        $this->middleware('permission:services-list|services-create|services-edit|services-delete', ['only' => ['list']]);
        $this->middleware('permission:services-create', ['only' => ['store', 'servicesCreate']]);
        $this->middleware('permission:services-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:services-delete', ['only' => ['block']]);
    }

    public function index()
    {
        $data = ServicePageContent::first();

        return view('adminpanel.services.page_content', compact('data'));
    }

    public function pageContentupdate(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $data = ServicePageContent::find($request->id);
        $data->description = $request->description;
        $data->save();

        \LogActivity::addToLog('Services page content updated.');

        return redirect()
            ->route('service-page-content-edit')
            ->with('success', 'Services page content updated successfully.');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::where('is_delete', 0)
                ->orderBy('heading', 'ASC')
                ->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-services/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function ($row) {
                    if ($row->status == 'Y') {
                        $status = 'fa fa-check';
                    } else {
                        $status = 'fa fa-remove';
                    }

                    $btn = '<a href="changestatus-services/' . $row->id . '/' . $row->cEnable . '"><i class="' . $status . '"></i></a>';

                    return $btn;
                })
                ->addColumn('blockservices', 'adminpanel.services.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockservices'])
                ->make(true);
        }

        return view('adminpanel.services.list');
    }

    public function servicesCreate()
    {
        return view('adminpanel.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image_1' => 'required',
            'image_2' => 'required',
            'image_3' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('image_1') == '') {
            $image_1 = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/services');
        } else {
            $pathimage_1 = '';
        }

        if (!$request->file('image_2') == '') {
            $image_2 = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/services');
        } else {
            $pathimage_2 = '';
        }

        if (!$request->file('image_3') == '') {
            $image_3 = $request->file('image_3')->getClientOriginalName();

            $pathimage_3 = $request->file('image_3')->store('public/services');
        } else {
            $pathimage_3 = '';
        }

        if (!$request->file('image_4') == '') {
            $image_4 = $request->file('image_4')->getClientOriginalName();

            $pathimage_4 = $request->file('image_4')->store('public/services');
        } else {
            $pathimage_4 = '';
        }

        if (!$request->file('image_5') == '') {
            $image_5 = $request->file('image_5')->getClientOriginalName();

            $pathimage_5 = $request->file('image_5')->store('public/services');
        } else {
            $pathimage_5 = '';
        }

        if (!$request->file('image_6') == '') {
            $image_6 = $request->file('image_6')->getClientOriginalName();

            $pathimage_6 = $request->file('image_6')->store('public/services');
        } else {
            $pathimage_6 = '';
        }
        $slug = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->heading))));
        $services = new Service();
        $services->heading = $request->heading;
        $services->slug = $slug;
        $services->short_description = $request->short_description;
        $services->long_description = $request->long_description;
        $services->image_1 = $pathimage_1;
        $services->image_2 = $pathimage_2;
        $services->image_3 = $pathimage_3;
        if (!empty($pathimage_4)) {
            $services->image_4 = $pathimage_4;
        }
        if (!empty($pathimage_5)) {
            $services->image_5 = $pathimage_5;
        }
        if (!empty($pathimage_6)) {
            $services->image_6 = $pathimage_6;
        }
        $services->status = $request->status;
        $services->save();
        $id = $services->id;

        \LogActivity::addToLog('Services ' . $request->heading . ' added(' . $id . ').');

        return redirect()
            ->route('services-list')
            ->with('success', 'Service record created successfully.');
    }

    public function edit($id)
    {
        $serviceId = decrypt($id);
        $data = Service::find($serviceId);

        return view('adminpanel.services.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image_1')) {
            $request->validate([
                'image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_1 = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/servicesimages');
        }

        if ($request->hasFile('image_2')) {
            $request->validate([
                'image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_2 = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/servicesimages');
        }

        if ($request->hasFile('image_3')) {
            $request->validate([
                'image_3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_3 = $request->file('image_3')->getClientOriginalName();

            $pathimage_3 = $request->file('image_3')->store('public/servicesimages');
        }

        if ($request->hasFile('image_4')) {
            $request->validate([
                'image_4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_4 = $request->file('image_4')->getClientOriginalName();

            $pathimage_4 = $request->file('image_4')->store('public/servicesimages');
        }

        if ($request->hasFile('image_5')) {
            $request->validate([
                'image_5' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_5 = $request->file('image_5')->getClientOriginalName();

            $pathimage_5 = $request->file('image_5')->store('public/servicesimages');
        }

        if ($request->hasFile('image_6')) {
            $request->validate([
                'image_6' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_6 = $request->file('image_6')->getClientOriginalName();

            $pathimage_6 = $request->file('image_6')->store('public/servicesimages');
        }

        $slug = preg_replace('/-+/', '-', preg_replace('/[^a-zA-Z0-9\s-]/', '', preg_replace('/\s+/', '-', strtolower($request->heading))));

        $data = Service::find($request->id);
        $data->heading = $request->heading;
        $data->slug = $slug;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        if (!empty($pathimage_1)) {
            $data->image_1 = $pathimage_1;
        }
        if (!empty($pathimage_2)) {
            $data->image_2 = $pathimage_2;
        }
        if (!empty($pathimage_3)) {
            $data->image_3 = $pathimage_3;
        }
        if (!empty($pathimage_4)) {
            $data->image_4 = $pathimage_4;
        }
        if (!empty($pathimage_5)) {
            $data->image_5 = $pathimage_5;
        }
        if (!empty($pathimage_6)) {
            $data->image_6 = $pathimage_6;
        }

        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Service record updated.');

        return redirect()
            ->route('services-list')
            ->with('success', 'Service record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data = Service::find($request->id);

        if ($data->status == 'Y') {
            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Service record ' . $data->heading . ' deactivated(' . $id . ').');

            return redirect()
                ->route('services-list')
                ->with('success', 'Service record deactivate successfully.');
        } else {
            $data->status = 'Y';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Service record ' . $data->heading . ' activated(' . $id . ').');

            return redirect()
                ->route('services-list')
                ->with('success', 'Service record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data = Service::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Service record ' . $data->heading . ' deleted(' . $id . ').');

        return redirect()
            ->route('services-list')
            ->with('success', 'Service record deleted successfully.');
    }
}
