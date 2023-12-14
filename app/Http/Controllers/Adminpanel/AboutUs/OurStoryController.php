<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\OurStory;
use Illuminate\Http\Request;
use DataTables;

class OurStoryController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:our-stories-list|our-stories-create|our-stories-edit|our-stories-delete', ['only' => ['list']]);
        $this->middleware('permission:our-stories-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:our-stories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:our-stories-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.aboutus.ourstories.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'order' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/aboutusimages');
        } else {
            $pathimage = "";
        }

        $ourstory = new OurStory();
        $ourstory->year = $request->year;
        $ourstory->heading = $request->heading;
        $ourstory->image = $pathimage;
        $ourstory->description = $request->description;
        $ourstory->order = $request->order;
        $ourstory->status = $request->status;
        $ourstory->save();
        $id = $ourstory->id;

        \LogActivity::addToLog('New story '.$request->heading.' added('.$id.').');

        return redirect()->route('our-stories-list')
            ->with('success', 'Our story record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = OurStory::where('is_delete', 0)->orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-our-stories/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-our-stories/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockourstories', 'adminpanel.aboutus.ourstories.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockourstories'])
                ->make(true);
        }

        return view('adminpanel.aboutus.ourstories.list');
    }

    public function edit($id)
    {
        $ourStoryId = decrypt($id);
        $data = OurStory::find($ourStoryId);

        return view('adminpanel.aboutus.ourstories.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'order' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/aboutusimages');

        }

        $data =  OurStory::find($request->id);
        $data->year = $request->year;
        $data->heading = $request->heading;
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }
        $data->description = $request->description;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Our story record updated.');

        return redirect()->route('our-stories-list')
            ->with('success', 'Our story record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  OurStory::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Our story record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('our-stories-list')
            ->with('success', 'Our story record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Our story record '.$data->heading.' activated('.$id.').');

            return redirect()->route('our-stories-list')
            ->with('success', 'Our sotry record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  OurStory::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Our story record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('our-stories-list')
            ->with('success', 'Our story record deleted successfully.');
    }

}
