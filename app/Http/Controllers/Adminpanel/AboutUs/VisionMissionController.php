<?php

namespace App\Http\Controllers\Adminpanel\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use DataTables;

class VisionMissionController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:vision-mission-edit', ['only' => ['index, update']]);
    }

    public function index()
    {
        $data = VisionMission::first();

        return view('adminpanel.aboutus.vision_mission', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'vision_heading' => 'required',
            'vision_description' => 'required',
            'mission_heading' => 'required',
            'mission_description' => 'required',
        ]);

        $data =  VisionMission::find($request->id);
        $data->vision_heading = $request->vision_heading;
        $data->vision_description = $request->vision_description;
        $data->mission_heading = $request->mission_heading;
        $data->mission_description = $request->mission_description;

        $data->save();

        \LogActivity::addToLog('vision and mission content updated.');

        return redirect()->route('vision-mission-edit')
            ->with('success', 'vision and mission content updated successfully.');
    }

}
