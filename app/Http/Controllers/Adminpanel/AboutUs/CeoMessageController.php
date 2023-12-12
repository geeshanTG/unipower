<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\CeoMessage;
use Illuminate\Http\Request;
use DataTables;

class CeoMessageController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:ceo-message-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = CeoMessage::first();

        return view('adminpanel.aboutus.ceo_message', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ceo_name' => 'required',
            'position' => 'required',
            'company_name' => 'required',
            'message' => 'required',
        ]);

        if ($request->hasFile('ceo_image')) {

            $request->validate([
                'ceo_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $ceoimage = $request->file('ceo_image')->getClientOriginalName();

            $pathceoimage = $request->file('ceo_image')->store('public/aboutusimages');

        }

        $data =  CeoMessage::find($request->id);
        $data->ceo_name = $request->ceo_name;
        $data->position = $request->position;
        $data->company_name = $request->company_name;
        if(!empty($pathceoimage)) {
            $data->ceo_image = $pathceoimage;
        }
        $data->message = $request->message;

        $data->save();

        \LogActivity::addToLog('CEO message content updated.');

        return redirect()->route('ceo-message-edit')
            ->with('success', 'CEO message content updated successfully.');
    }

}
