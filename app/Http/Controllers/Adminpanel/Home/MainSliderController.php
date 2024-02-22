<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\MainSlider;
use Illuminate\Http\Request;
use DataTables;

class MainSliderController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:main-slider-list|main-slider-create|main-slider-edit|main-slider-delete', ['only' => ['list']]);
        $this->middleware('permission:main-slider-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:main-slider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:main-slider-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.home.main_slider.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
             'sub_heading' => 'required|max:60',
            'order' => 'required',
            'status' => 'required',
            'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'desktop_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'mobile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('icon') == "") {

            $icon = $request->file('icon')->getClientOriginalName();

            $pathimage_icon = $request->file('icon')->store('public/homeimages');
        } else {
            $pathimage_icon = "";
        }

        if (!$request->file('desktop_image') == "") {

            $image = $request->file('desktop_image')->getClientOriginalName();

            $pathimage = $request->file('desktop_image')->store('public/homeimages');
        } else {
            $pathimage = "";
        }

        if (!$request->file('mobile_image') == "") {

            $image = $request->file('mobile_image')->getClientOriginalName();

            $pathimageMobile = $request->file('mobile_image')->store('public/homeimages');
        } else {
            $pathimageMobile = "";
        }

        $mainslider = new MainSlider();
        $mainslider->heading = $request->heading;
        $mainslider->sub_heading = $request->sub_heading;
        $mainslider->icon = $pathimage_icon;
        $mainslider->desktop_image = $pathimage;
        $mainslider->mobile_image = $pathimageMobile;
        $mainslider->order = $request->order;
        $mainslider->status = $request->status;
        $mainslider->save();
        $id = $mainslider->id;

        \LogActivity::addToLog('New main slider '.$request->heading.' added('.$id.').');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = MainSlider::where('is_delete', 0)->orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-main-slider/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-main-slider/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockmainslider', 'adminpanel.home.main_slider.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockmainslider'])
                ->make(true);
        }

        return view('adminpanel.home.main_slider.list');
    }

    public function edit($id)
    {
        $mainSliderId = decrypt($id);
        $data = MainSlider::find($mainSliderId);

        return view('adminpanel.home.main_slider.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
             'sub_heading' => 'required|max:60',
            'order' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('icon')) {

            $request->validate([
                'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Icon = $request->file('icon')->getClientOriginalName();

            $pathimage_icon = $request->file('icon')->store('public/homeimages');

        }

        if ($request->hasFile('desktop_image')) {

            $request->validate([
                'desktop_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('desktop_image')->getClientOriginalName();

            $pathimage = $request->file('desktop_image')->store('public/homeimagess');

        }

        if ($request->hasFile('mobile_image')) {

            $request->validate([
                'mobile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('mobile_image')->getClientOriginalName();

            $pathimageMobile = $request->file('mobile_image')->store('public/homeimagess');

        }

        $data =  MainSlider::find($request->id);
        $data->heading = $request->heading;
        $data->sub_heading = $request->sub_heading;
        if(!empty($pathimage_icon)) {
            $data->icon = $pathimage_icon;
        }
        if(!empty($pathimage)) {
            $data->desktop_image = $pathimage;
        }
        if(!empty($pathimageMobile)) {
            $data->mobile_image = $pathimageMobile;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Main slider record updated.');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainSlider::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main slider record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('main-slider-list')
            ->with('success', 'Main slider record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Main slider record '.$data->heading.' activated('.$id.').');

            return redirect()->route('main-slider-list')
            ->with('success', 'Main slider record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  MainSlider::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Main slider record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('main-slider-list')
            ->with('success', 'Main slider record deleted successfully.');
    }

}
