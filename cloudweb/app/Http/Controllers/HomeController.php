<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {

        $datas = DB::table('mschedule')
        ->whereNull('deleted_at')
        ->get();
        
        return view('pages.member.index', compact('datas'));
     
    }
}

