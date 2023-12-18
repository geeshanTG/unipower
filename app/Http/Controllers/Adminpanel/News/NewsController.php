<?php

namespace App\Http\Controllers\Adminpanel\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use DataTables;

class NewsController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['list']]);
        $this->middleware('permission:news-create', ['only' => ['store', 'index']]);
        $this->middleware('permission:news-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:news-delete', ['only' => ['block']]);
    }

    public function index()
    {
        return view('adminpanel.news.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'news_date' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (!$request->file('image_1') == "") {

            $image_1 = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/newsimages');
        } else {
            $pathimage_1 = "";
        }

        if ($request->hasFile('image_2')) {

            $request->validate([
                'image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_2 = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/newsimages');

        }

        if ($request->hasFile('image_3')) {

            $request->validate([
                'image_3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_3 = $request->file('image_3')->getClientOriginalName();

            $pathimage_3 = $request->file('image_3')->store('public/newsimages');

        }

        if ($request->hasFile('image_4')) {

            $request->validate([
                'image_4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_4 = $request->file('image_4')->getClientOriginalName();

            $pathimage_4 = $request->file('image_4')->store('public/newsimages');

        }

        $news = new News();
        $news->heading = $request->heading;
        $news->news_date = $request->news_date;
        $news->image_1 = $pathimage_1;
        if(!empty($pathimage_2)) {
            $news->image_2 = $pathimage_2;
        }
        if(!empty($pathimage_3)) {
            $news->image_3 = $pathimage_3;
        }
        if(!empty($pathimage_4)) {
            $news->image_4 = $pathimage_4;
        }
        $news->description = $request->description;
        $news->status = $request->status;
        $news->save();
        $id = $news->id;

        \LogActivity::addToLog('New news '.$request->heading.' added('.$id.').');

        return redirect()->route('news-list')
            ->with('success', 'News record created successfully.');
    }

    public function list(Request $request) {

        if ($request->ajax()) {
            $data = News::where('is_delete', 0)->orderBy('news_date', 'DESC')->get();
            // die(var_dump($data));
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('edit', function ($row) {
                    $edit_url = url('/edit-news/' . encrypt($row->id) . '');
                    $btn = '<a href="' . $edit_url . '"><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->addColumn('activation', function($row){
                    if ( $row->status == "Y" )
                        $status ='fa fa-check';
                    else
                        $status ='fa fa-remove';

                    $btn = '<a href="changestatus-news/'.$row->id.'/'.$row->cEnable.'"><i class="'.$status.'"></i></a>';

                    return $btn;
                })
                ->addColumn('blocknews', 'adminpanel.news.actionsBlock')
                ->rawColumns(['edit', 'activation', 'blocknews'])
                ->make(true);
        }

        return view('adminpanel.news.list');
    }

    public function edit($id)
    {
        $newsId = decrypt($id);
        $data = News::find($newsId);

        return view('adminpanel.news.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'news_date' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image_1')) {

            $request->validate([
                'image_1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_1 = $request->file('image_1')->getClientOriginalName();

            $pathimage_1 = $request->file('image_1')->store('public/newsimages');

        }

        if ($request->hasFile('image_2')) {

            $request->validate([
                'image_2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_2 = $request->file('image_2')->getClientOriginalName();

            $pathimage_2 = $request->file('image_2')->store('public/newsimages');

        }

        if ($request->hasFile('image_3')) {

            $request->validate([
                'image_3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_3 = $request->file('image_3')->getClientOriginalName();

            $pathimage_3 = $request->file('image_3')->store('public/newsimages');

        }

        if ($request->hasFile('image_4')) {

            $request->validate([
                'image_4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $Image_4 = $request->file('image_4')->getClientOriginalName();

            $pathimage_4 = $request->file('image_4')->store('public/newsimages');

        }

        $data =  News::find($request->id);
        $data->heading = $request->heading;
        $data->news_date = $request->news_date;
        if(!empty($pathimage_1)) {
            $data->image_1 = $pathimage_1;
        }
        if(!empty($pathimage_2)) {
            $data->image_2 = $pathimage_2;
        }
        if(!empty($pathimage_3)) {
            $data->image_3 = $pathimage_3;
        }
        if(!empty($pathimage_4)) {
            $data->image_4 = $pathimage_4;
        }
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        \LogActivity::addToLog('News record updated.');

        return redirect()->route('news-list')
            ->with('success', 'News record updated successfully.');
    }

    public function activation(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  News::find($request->id);

        if ( $data->status == "Y" ) {

            $data->status = 'N';
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('News record '.$data->heading.' deactivated('.$id.').');

            return redirect()->route('news-list')
            ->with('success', 'News record deactivate successfully.');

        } else {

            $data->status = "Y";
            $data->save();
            $id = $data->id;

            \LogActivity::addToLog('News record '.$data->heading.' activated('.$id.').');

            return redirect()->route('news-list')
            ->with('success', 'News record activate successfully.');
        }
    }

    public function block(Request $request)
    {
        $request->validate([
            // 'status' => 'required'
        ]);

        $data =  News::find($request->id);
        $data->is_delete = 1;
        $data->save();
        $id = $data->id;

        \LogActivity::addToLog('News record '.$data->heading.' deleted('.$id.').');

        return redirect()->route('news-list')
            ->with('success', 'News record deleted successfully.');
    }

}
