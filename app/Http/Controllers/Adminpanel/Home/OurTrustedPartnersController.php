<?php

namespace App\Http\Controllers\Adminpanel\Home;

use App\Http\Controllers\Controller;
use App\Models\OurTrustedPartner;
use Illuminate\Http\Request;
use DataTables;

class OurTrustedPartnersController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:our-trusted-partners-list|our-trusted-partners-create|our-trusted-partners-edit|our-trusted-partners-delete', ['only' => ['list']]);
        $this->middleware('permission:our-trusted-partners-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:our-trusted-partners-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:our-trusted-partners-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.home.our_trusted_partners.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('image') == "") {

            $image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/homeimages');
        } else {
            $pathimage = "";
        }

        $ourtrustedpartners = new OurTrustedPartner();
        $ourtrustedpartners->image = $pathimage;
        $ourtrustedpartners->order = $request->order;
        $ourtrustedpartners->status = $request->status;
        $ourtrustedpartners->save();
        $id = $ourtrustedpartners->id;

        \LogActivity::addToLog('New our trusted partners added('.$id.').');

        return redirect()->route('our-trusted-partners-list')
            ->with('success', 'Our trusted partners created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = OurTrustedPartner::where('is_delete', 0)->orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    $imgpath = "storage/app/$row->image";
                    $img = '<img src="'.$imgpath.'">';
                    return $img;
                })
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-our-trusted-partners/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-our-trusted-partners/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockourtrustedpartners', 'adminpanel.home.our_trusted_partners.actionsBlock')
                ->rawColumns(['image','edit', 'activation', 'blockourtrustedpartners'])
                ->make(true);
        }

        return view('adminpanel.home.our_trusted_partners.list');
    }

    public function edit($id)
    {
        $ourTrustedPartnerId = decrypt($id);
        $data = OurTrustedPartner::find($ourTrustedPartnerId);

        return view('adminpanel.home.our_trusted_partners.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'order' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image = $request->file('image')->getClientOriginalName();

            $pathimage = $request->file('image')->store('public/homeimages');

        }

        $data =  OurTrustedPartner::find($request->id);
        if(!empty($pathimage)) {
            $data->image = $pathimage;
        }
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('Our trusted partner record updated.');

        return redirect()->route('our-trusted-partners-list')
            ->with('success', 'Our trusted partner record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  OurTrustedPartner::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Our trusted partner record deactivated('.$id.').');

            return redirect()->route('our-trusted-partners-list')
            ->with('success', 'Our trusted partner record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('Our trusted partner record activated('.$id.').');

            return redirect()->route('our-trusted-partners-list')
            ->with('success', 'Our trusted partner record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  OurTrustedPartner::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('Our trusted partner record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('our-trusted-partners-list')
            ->with('success', 'Our trusted partner record deleted successfully.');
    }

}
