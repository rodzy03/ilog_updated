<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportsController extends Controller
{
    public function get_schedules()
    {
        
        return db::table('v_get_schedules')->whereIn('RLI_LOCATIONAME',$this->locationName())->get();
    }

    public function view_reports()
    {
        $guards = $this->get_schedules();
        return view('employee.reports',compact('guards'));
    }

    public function incident_reports()
    {
        $guards = $this->get_schedules();
        return view('employee.incident_reports',compact('guards'));
    }

    public function emergency_reports()
    {
        $guards = $this->get_schedules();
        return view('employee.emergency_reports',compact('guards'));
    }

    public function performance_reports()
    {
        $guards = $this->get_schedules();
        return view('employee.performance_reports',compact('guards'));   
    }

    public function locationName()
    {
        $locations = db::table('r_location_information')
        ->where('CLIENT_ID',session('client_id'))
        ->get(['RLI_LOCATIONAME']);
        
        $data = [];
        for($i=0, $len = count($locations); $i<$len; $i++) {
            array_push($data, $locations[$i]->RLI_LOCATIONAME);
        }

        return $data;
    }

    public function print_emergency(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);
        $start = empty($request->get('start')) ? "" : $request->get('start') ;
        $end = empty($request->get('end')) ? "" : $request->get('end');
        $guard_id = $request->get('guard_id');
        $name = $request->get('fullname');
        $job_role = $request->get('job_role');

        if(empty($start) && empty($end)) {
            $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)
            ->where('RLI_LOCATIONAME',$this->locationName())
            ->whereRaw('DATE(REL_DATEADDED) = CURDATE()')
            ->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)
                ->where(DB::raw('DATE(REL_DATEADDED)'), $start)
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            } 
            else 
            {
                $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)
                ->whereBetween(DB::raw('DATE(REL_DATEADDED)'), array($start, $end))
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            }
        }
        
        $view = View('emergency_printable',compact('logs','name','job_role','start','end'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function print_incidents(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);
        $start = empty($request->get('start')) ? "" : $request->get('start') ;
        $end = empty($request->get('end')) ? "" : $request->get('end');
        $guard_id = $request->get('guard_id');
        $name = $request->get('fullname');
        $job_role = $request->get('job_role');

        if(empty($start) && empty($end)) {
            $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)
            ->where('RLI_LOCATIONAME',$this->locationName())
            ->whereRaw('DATE(RIL_DATEADDED) = CURDATE()')
            ->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)
                ->where(DB::raw('DATE(RIL_DATEADDED)'), $start)
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            } 
            else 
            {
                $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)
                ->whereBetween(DB::raw('DATE(RIL_DATEADDED)'), array($start, $end))
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            }
        }
        
        $view = View('incidents_printable',compact('logs','name','job_role','start','end'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function print_logs(Request $request)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(300);

        $start = empty($request->get('start')) ? "" : $request->get('start') ;
        $end = empty($request->get('end')) ? "" : $request->get('end');
        $guard_id = $request->get('guard_id');
        $name = $request->get('fullname');
        $job_role = $request->get('job_role');
        
        if(empty($start) && empty($end)) {
            $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)
            ->where('RLI_LOCATIONAME',$this->locationName())
            ->whereRaw('DATE(TAL_DATEADDED) = CURDATE()')
            ->get();
        }
        else 
        {
            
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)
                ->where(DB::raw('DATE(TAL_DATEADDED)'), $start)
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            } 
            else 
            {
                $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)
                ->whereBetween('TAL_DATEADDED', array($start, $end))
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            }
        }
        
        $view = View('logs_printable',compact('logs','name','job_role','start','end'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function print_task_logs(Request $request)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(300);

        $start = empty($request->get('start')) ? "" : $request->get('start') ;
        $end = empty($request->get('end')) ? "" : $request->get('end');
        $guard_id = $request->get('guard_id');
        $name = $request->get('fullname');
        $job_role = $request->get('job_role');

        
        
        if(empty($start) && empty($end)) {
            $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)
            ->where('RLI_LOCATIONAME',$this->locationName())
            ->whereRaw('DATE(RSL_DATEADDED) = CURDATE()')
            ->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)
                ->where(DB::raw('DATE(RSL_DATEADDED)'), $start)
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
                
            } 
            else 
            {
                $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)
                ->whereBetween('RSL_DATEADDED', array($start, $end))
                ->whereIn('RLI_LOCATIONAME',$this->locationName())
                ->get();
            }
        }

        
        $view = View('task_printable',compact('logs','name','job_role','start','end'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    

    // DB::RAW('CURRENT_TIMESTAMP')
}
