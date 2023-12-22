<?php

namespace App\Http\Controllers\Adminpanel;
use App\Models\MetaTag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class MetaTagController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:meta-tag-list|meta-tag-edit', ['only' => ['index', 'list']]);
        // $this->middleware('permission:meta-tag-edit', ['only' => ['edit', 'update']]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = MetaTag::where('status','Y')->get();
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
}
