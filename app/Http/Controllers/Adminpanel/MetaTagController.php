<?php

namespace App\Http\Controllers\Adminpanel;
use App\Models\MetaTag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Storage;

class MetaTagController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:meta-tag-list|meta-tag-edit', ['only' => ['index', 'list']]);
        $this->middleware('permission:meta-tag-edit', ['only' => ['edit', 'update']]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = MetaTag::select('*')->where('is_delete',0)->where('status','Y');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('edit-meta-tag/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['edit'])
                ->make(true);
        }

        return view('adminpanel.meta_tag.list');
    }

    public function edit($id)
    {
        $pageID = decrypt($id);
        $data = MetaTag::find($pageID);
        return view('adminpanel.meta_tag.edit', ['data' => $data]);
    }

  public function update(Request $request)
    {
        $request->validate([
            'page_title' => 'required',
        ]);

        if ($request->hasFile('og_image')) {
            $meta = $request->file('og_image')->getClientOriginalName();

            $path = $request->file('og_image')->store('public/og_file');
          

            $data = MetaTag::find($request->id);

            Storage::delete($data->og_image);

            $data->og_image = $path;
            $data->page_title = $request->page_title;
            $data->description = $request->description;
            $data->keywords = $request->keywords;
            $data->og_title = $request->og_title;
            $data->og_type = $request->og_type;
            $data->og_url = $request->og_url;
            $data->og_sitename = $request->og_sitename;
            $data->og_description = $request->og_description;
            $data->save();
            $id = $data->id;
        } else {
            $data = MetaTag::find($request->id);

            $data->page_title = $request->page_title;
            $data->description = $request->description;
            $data->keywords = $request->keywords;
            $data->og_title = $request->og_title;
            $data->og_type = $request->og_type;
            $data->og_url = $request->og_url;
            //$data->og_image = $path;
            $data->og_sitename = $request->og_sitename;
            $data->og_description = $request->og_description;

            $data->save();
            $id = $data->id;
        }

        \LogActivity::addToLog('Meta tag record ID ' . $id . ' updated.');

        return redirect()
            ->route('meta-tag-list')
            ->with('success', 'Meta tag updated successfully.');
    }
}
