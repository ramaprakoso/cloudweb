<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\MSchedule; 
use Illuminate\Http\Request;


class ScheduleController extends BaseController
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        // $request->session()->invalidate();

        // var_dump($request->session()->get('username'));
        // var_dump($request->session()->get('role')); 
        // exit; 

        $datas = DB::table('mschedule')
        ->whereNull('deleted_at')
        ->get();

        return view('pages.schedule.index', compact('datas'));
    }

    public function postSchedule(Request $request){
        $data = $request->all(); 

        if(isset($data['id'])){
            $update_schedule_query = MSchedule::where('id', $data['id'])
            ->whereNull('deleted_at')
            ->update([
                'description' => $data['description'],
                'time_schedule' => $data['date_time'],
                'url' => $data['url'],
                'requirement' => $data['requirement'],
                'updated_at' => date('Y-m-d H:i:s')
            ]); 
        } else {
            $create_schedule_query = MSchedule::insert([
                'description' => $data['description'],
                'time_schedule' => $data['date_time'],
                'url' => $data['description'],
                'requirement' => $data['requirement'],
                'created_at' => date('Y-m-d H:i:s')
            ]); 
        }
        
        
        $return = [
            'status' => 'success'
        ]; 

        return $return; 
    }

    public function getSchduleJson(Request $request){
        $id = $request->id; 
        
        $data = DB::table('mschedule')
        ->where('id', $id)
        ->whereNull('deleted_at')
        ->get(); 

        return json_encode($data[0]); 
    }

    public function deleteSchedule(Request $request){
        $id = $request->id; 
        $create_sql = MSchedule::update([
            'deleted_at' => date('Y-m-d H:i:s')
        ])
        ->whereNull('deleted_at')
        ->where('id', $id); 
    }
}

