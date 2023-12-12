<?php

namespace App\Http\Controllers\Adminpanel\ContactUs;
use DataTables;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EnquiryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:enquiry-list', ['only' => ['listEnquiry,view']]);
        // $this->middleware('permission:view-enquiry', ['only' => ['view']]);
    }
    public function listEnquiry(Request $request)
    {
        if ($request->ajax()) {
            $data = Enquiry::orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('view', function ($row) {
                    $view_url = url('view-enquiry/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $view_url . '"><i class="fa fa-file-text"></i></a>';
                    return $btn;
                })
                ->editColumn('created_at', function ($row) {
                    $created_at = $row->created_at->format('Y-m-d H:i:s');
                    return $created_at;
                })
                ->rawColumns(['view', 'created_at'])
                ->make(true);
        }
        return view('adminpanel.contactus.enquiry_list');
    }
    public function view($id)
    {
        $ID = decrypt($id);
        $data = Enquiry::find($ID);
        return view('adminpanel.contactus.view_enquiry', ['data' => $data]);
    }
}
