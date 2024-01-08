<?php

namespace App\Http\Controllers\Adminpanel\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use DataTables;

class FaqController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:faq-list|faq-edit|faq-delete', ['only' => ['list', 'edit', 'update', 'block','index','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['block']]);
    }

    public function index()
    {
       
        return view('adminpanel.faq.index');
    }


    public function store(Request $request)
    {

        $request->validate([
            'heading' => 'required',
            'description' => 'required |max:500',
            'order' => 'required',
            'status' => 'required',
        ]);

        $data = new Faq();
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('New Faq '.$request->heading.' added('.$id.').');

        return redirect()->route('faq-list')
            ->with('success', 'Faq record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = Faq::orderBy('order', 'ASC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-faq/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-faq/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blockfaq', 'adminpanel.faq.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blockfaq'])
                ->make(true);
        }

        return view('adminpanel.faq.list');
    }

    public function edit($id)
    {
        $faqId = decrypt($id);
        $data = Faq::find($faqId);

        return view('adminpanel.faq.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {

      
        $request->validate([
            'heading' => 'required',
            'description' => 'required |max:500',
            'order' => 'required',
            'status' => 'required',
        ]);

        $data =  Faq::find($request->id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('FAQ record updated.');

        return redirect()->route('faq-list')
            ->with('success', 'FAQ record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  Faq::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('FAQ record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('faq-list')
            ->with('success', 'FAQ record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('FAQ record '.$data->heading.' activated('.$id.').');

            return redirect()->route('faq-list')
            ->with('success', 'FAQ record activate successfully.');
        }
    }

   
}
