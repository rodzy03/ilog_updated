<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ReportsController extends Controller
{
    public function view_reports()
    {
        $guards = db::table('v_get_schedules')->get();
        return view('employee.reports',compact('guards'));
    }

    public function incident_reports()
    {
        $guards = db::table('v_get_schedules')->get();
        return view('employee.incident_reports',compact('guards'));
    }

    public function emergency_reports()
    {
        $guards = db::table('v_get_schedules')->get();
        return view('employee.emergency_reports',compact('guards'));
    }

    public function performance_reports()
    {
        $guards = db::table('v_get_schedules')->get();
        return view('employee.performance_reports',compact('guards'));   
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
            $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)
                ->where(DB::raw('DATE(REL_DATEADDED)'), $start)
                ->get();
            } 
            else 
            {
                $logs = db::table('v_get_emergency')->where('REL_USERID',$guard_id)
                ->whereBetween(DB::raw('DATE(REL_DATEADDED)'), array($start, $end))
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
            $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)
                ->where(DB::raw('DATE(RIL_DATEADDED)'), $start)
                ->get();
            } 
            else 
            {
                $logs = db::table('v_get_incidents')->where('RIL_USERID',$guard_id)
                ->whereBetween(DB::raw('DATE(RIL_DATEADDED)'), array($start, $end))
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
            $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)
                ->where(DB::raw('DATE(TAL_DATEADDED)'), $start)
                ->get();
                
            } 
            else 
            {
                $logs = db::table('v_get_logs')->where('TAL_ACCOUNTID',$guard_id)
                ->whereBetween('TAL_DATEADDED', array($start, $end))
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
            $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)->get();
        }
        else 
        {
            if(!empty($start) && empty($end)) 
            {
                $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)
                ->where(DB::raw('DATE(RSL_DATEADDED)'), $start)
                ->get();
                
            } 
            else 
            {
                $logs = db::table('v_get_swim_logs')->where('RSL_GUARDID',$guard_id)
                ->whereBetween('RSL_DATEADDED', array($start, $end))
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
