<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\OurValue;
use Illuminate\Http\Request;
use DataTables;

class OurValuesController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:our-values-list|our-values-edit', ['only' => ['list']]);
        $this->middleware('permission:our-values-edit', ['only' => ['edit', 'update']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = OurValue::orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('icon', function ($row) {
                    $imgpath = "storage/app/$row->icon";
                    $img = '<img src="'.$imgpath.'">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/our-values-edit/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['icon','edit'])
                ->make(true);
        }

        return view('adminpanel.aboutus.ourvalues.index');
    }

    public function edit($id)
    {
        $ourValueId = decrypt($id);
        $data = OurValue::find($ourValueId);

        return view('adminpanel.aboutus.ourvalues.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('icon')) {

            $request->validate([
                'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $iconImage = $request->file('icon')->getClientOriginalName();

            $pathiconimage = $request->file('icon')->store('public/aboutusimages');

        }

        $data =  OurValue::find($request->id);
        $data->heading = $request->heading;
        if(!empty($pathiconimage)) {
            $data->icon = $pathiconimage;
        }
        $data->description = $request->description;
        $data->order = $request->order;

        $data->save();

        \LogActivity::addToLog('Our values content updated.');

        return redirect()->route('our-values-list')
            ->with('success', 'Our values content updated successfully.');
    }

}
