<?php

namespace App\Http\Controllers\Adminpanel;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use DataTables;
use DB;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

}
