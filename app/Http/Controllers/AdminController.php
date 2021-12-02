<?php

namespace App\Http\Controllers;

use App\Imports\GuardImport;

use App\Imports\AssetImport;
use App\Imports\EmergencyTypeImport;
use App\Imports\IncidentTypeImport;
use App\Imports\LocationImport;
use App\Imports\ScheduleImport;
use App\Imports\TurnoverItemsImport;
use App\Imports\ClientImport;
use App\Imports\AssignImport;

use App\Imports\Swim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;
use Carbon\Carbon;
use QrCode;
use Illuminate\Support\Facades\Crypt;
use Image;

class AdminController extends Controller
{

    public function get_students()
    {
        $data = db::table('v_get_schedules')
        ->where('RAT_TYPEID',1)
        ->orderby('ACTIVE_FLAG','DESC')->get();
        $location = db::table('r_location_information')->where('RLI_ACTIVE',1)->get();
        $shifts = db::table('t_shift_configs')->get();
        $guards = db::table('r_account_information')
        ->where('RAI_TYPE',1)->where('ACTIVE_FLAG',1)->get();
        
        return view('employee.manage_student',compact('data','location','shifts','guards'));
    }

    public function get_shift_supervisor()
    {
        $data = db::table('v_get_schedules')
        ->where('RAT_TYPEID',2)
        ->orderby('ACTIVE_FLAG','DESC')->get();
        $location = db::table('r_location_information')->where('RLI_ACTIVE',1)->get();
        $shifts = db::table('t_shift_configs')->get();
        $guards = db::table('r_account_information')
        ->where('RAI_TYPE',2)->where('ACTIVE_FLAG',1)->get();
        
        
        return view('employee.manage_student',compact('data','location','shifts','guards'));
    }

    public function import_student(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new ScheduleImport, $request->file('file') );
        }
    }

    public function get_assigned()
    {
        $temp = array(); $data = array();
        $rem_dup = db::table("v_get_locations_sched")
        ->where(strtolower('LOCATION_TYPE'), strtolower('Detachment Center'))
        ->where('RAI_TYPE',2)->get();
        
        // for ($i=0; $i<count($rem_dup); $i++) {
        //     array_push($temp, 
        //     [ "location_name" => $rem_dup[$i]->RLI_LOCATIONAME,
        //     "location_id" => $rem_dup[$i]->TGS_LOCATIONID,
        //     "RAI_FIRSTNAME" => $rem_dup[$i]->RAI_FIRSTNAME,
        //     "RAI_LASTNAME" => $rem_dup[$i]->RAI_LASTNAME ]);
        // }

        for ($i=0; $i<count($rem_dup); $i++) {
                array_push($temp, 
                [ "location_name" => $rem_dup[$i]->RLI_LOCATIONAME,
                "location_id" => $rem_dup[$i]->RLI_LOCATIONID
                ]);
            }
            
        $data = array_values(array_unique($temp, SORT_REGULAR));
        
        
        return view('employee.manage_assigned',compact('data') );
    }

    public function get_guards_assigned(Request $request)
    {
        $data = db::table('v_get_guards_assign')
        ->where('TGS_LOCATIONID',$request->get('location_id'))->get();
        return response()->json(['data' => $data ]);
    }

    public function import_assigned(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new AssignImport, $request->file('file') );
        }
    }
    

    public function get_guards()
    {
        $data = db::table('r_account_information as ai')
        ->join('r_account_type as at','ai.RAI_TYPE','at.RAT_TYPEID')
        ->where('RAI_TYPE',1)
        ->orderby('ai.ACTIVE_FLAG','DESC')->get();
        $type = db::table('r_account_type')->get();
        $stats = "1";
        
        
        return view('employee.manage_guards',compact('data','type','stats'));
    }

    public function get_supervisor()
    {
        $data = db::table('r_account_information as ai')
        ->join('r_account_type as at','ai.RAI_TYPE','at.RAT_TYPEID')
        ->where('RAI_TYPE',2)
        ->orderby('ai.ACTIVE_FLAG','DESC')->get();
        $type = db::table('r_account_type')->get();
        $stats = "2";
    
        return view('employee.manage_guards',compact('data','type','stats'));
    }

    public function import_guards(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new GuardImport, $request->file('file') );
        }
    }

    public function guard_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_account_information')->where('RAI_ACCOUNTID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_account_information')->where('RAI_ACCOUNTID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 1]);
        }
        else if($request->get('status') == "normal") {

            $dir = public_path('uploads/original_pictures/');
            $dir_p = public_path('uploads/profile/');
            $pin = db::table('r_account_information')->where('RAI_ACCOUNTID',$request->get('id'))->value('RAI_PASSWORD');
            $current_pic = db::table('r_account_information')->where('RAI_ACCOUNTID',$request->get('id'))->value('RAI_PICTURE');
            
            if($request->get('password') != "") {
                $pin = md5($request->get('password'));
            } 

            $file_name = $current_pic;
            
            
            if ($request->hasFile('file')) {
                
                if($current_pic != "default" ) {
                    if(file_exists($dir.$current_pic) && file_exists($dir_p.$current_pic)) {
                        File::delete($dir.$current_pic);
                        File::delete($dir_p.$current_pic);
                    }
                }

                $image = $request->file('file');
                $img = Image::make($image->path());
                $derive_name = md5("g_".$request->get('id'));
                
                $img->resize(64, 64, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/original_pictures').'/'.$derive_name);


                
                $file = $request->file('file');
                $file->move(public_path('uploads/profile'), $derive_name); 
                $file_name = $derive_name;
            }
            

            db::table('r_account_information')->where('RAI_ACCOUNTID',$request->get('id'))
            ->update([
                'RAI_FIRSTNAME' => $request->get('firstname')
                , 'RAI_MIDDLENAME' => ( empty($request->get('middlename')) ) ? "" : $request->get('middlename')
                , 'RAI_LASTNAME' => $request->get('lastname')
                , 'RAI_PASSWORD' => trim($pin)
                , 'RAI_TYPE' => $request->get('guard_type')
                , 'MOBILE_NUMBER' => $request->get('mobile_number')
                , 'HOME_ADDRESS' => $request->get('home_address')
                , 'CITY' => $request->get('city')
                , 'PROVINCE' => $request->get('province')
                , 'EMERGENCY_CONTACT_PERSON' => $request->get('contact_person')
                , 'EMERGENCY_CONTACT_NUMBER' => $request->get('contact_number')
                , 'RAI_PICTURE' => $file_name
                , 'HIRING_DATE' => $request->get('hiring_date')
                , 'JOB_STATUS' => $request->get('job_status')
                
            ]);
        }
        else if($request->get('status') == "add") 
        {

            
            
            $last_id = db::table('r_account_information')
            ->insertGetId([
                'RAI_FIRSTNAME' => $request->get('firstname')
                , 'RAI_MIDDLENAME' => ( empty($request->get('middlename')) ) ? "" : $request->get('middlename')
                , 'RAI_LASTNAME' => $request->get('lastname')
                , 'RAI_PASSWORD' => trim(md5($request->get('password')))
                , 'RAI_TYPE' => $request->get('guard_type')
                , 'MOBILE_NUMBER' => $request->get('mobile_number')
                , 'HOME_ADDRESS' => $request->get('home_address')
                , 'CITY' => $request->get('city')
                , 'PROVINCE' => $request->get('province')
                , 'EMERGENCY_CONTACT_PERSON' => $request->get('contact_person')
                , 'EMERGENCY_CONTACT_NUMBER' => $request->get('contact_number')
                , 'HIRING_DATE' => $request->get('hiring_date')
                , 'JOB_STATUS' => $request->get('job_status')
            
            ]);
            
            

            if ($request->hasFile('file')) 
            {
                $image = $request->file('file');
                $img = Image::make($image->path());
                $derive_name = md5("g_".$last_id);
                
                $img->resize(64, 64, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/original_pictures').'/'.$derive_name);

                $file = $request->file('file');
                $file->move(public_path('uploads/profile'), $derive_name); 
                $file_name = $derive_name;
            }
            else
            {
                $file_name = "default";
            }

            db::table('r_account_information')->where('RAI_ACCOUNTID',$last_id)
                ->update([
                        'RAI_PICTURE' => $file_name
                ]);
        }
    }

    public function validate_shift(Request $request)
    {
        $count = db::select("call SP_CHECK_SCHED(?,?,?)"
        ,array($request->get('guard_id')
        ,$request->get('shift_id')
        ,$request->get('guard_location')) );

        return response()->json(["count" => $count]);
    }

    public function guard_shift_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('t_guard_shifts')->where('TGS_SHIFTID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('t_guard_shifts')->where('TGS_SHIFTID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('t_guard_shifts')->where('TGS_SHIFTID',$request->get('id'))
            ->update([
                //'TGS_SHIFTDATEFROM' => $request->get('start')
                //, 'TGS_SHIFTDATETO' => $request->get('end')
                //'SHIFT_ID' => $request->get('shift_id'),
                'TGS_LOCATIONID' => $request->get('guard_location'),
                'VALIDITY_START' => $request->get('start'),
                'VALIDITY_END' => $request->get('end')
                
            ]);
        }
        else if($request->get('status') == "add") {
            db::table('t_guard_shifts')
            ->insert([
                'TGS_LOCATIONID' => $request->get('guard_location'),
                'TGS_GUARDID' => $request->get('guard_id'),
                'SHIFT_ID' => $request->get('shift_id'),
                'VALIDITY_START' => $request->get('start'),
                'VALIDITY_END' => $request->get('end')
               
            ]);
        }
    }

    public function incident_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_incident_type')->where('RIT_TYPEID',$request->get('id'))
            ->update(['RIT_ACTIVE' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_incident_type')->where('RIT_TYPEID',$request->get('id'))
            ->update(['RIT_ACTIVE' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('r_incident_type')->where('RIT_TYPEID',$request->get('id'))
            ->update(['RIT_TYPE' => $request->get('type')]);
        }
        else if($request->get('status') == "add") {
            db::table('r_incident_type')
            ->insert(['RIT_TYPE' => $request->get('type')]);
        }
    }

    public function items_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_turnover_items')->where('RTI_ITEMID',$request->get('id'))
            ->update(['RTI_ACTIVE' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_turnover_items')->where('RTI_ITEMID',$request->get('id'))
            ->update(['RTI_ACTIVE' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('r_turnover_items')->where('RTI_ITEMID',$request->get('id'))
            ->update(['RTI_ITEMNAME' => trim($request->get('type'))]);
        }
        else if($request->get('status') == "add") {
            db::table('r_turnover_items')
            ->insert(['RTI_ITEMNAME' => trim($request->get('type'))]);
        }
    }

    public function emergency_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_emergency_type')->where('RET_TYPEID',$request->get('id'))
            ->update(['RET_ACTIVE' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_emergency_type')->where('RET_TYPEID',$request->get('id'))
            ->update(['RET_ACTIVE' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('r_emergency_type')->where('RET_TYPEID',$request->get('id'))
            ->update(['RET_TYPENAME' => trim($request->get('type'))]);
        }
        else if($request->get('status') == "add") {
            db::table('r_emergency_type')
            ->insert(['RET_TYPENAME' => trim($request->get('type'))]);
        }
    }

    public function swim_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_swim_task')->where('RST_TASKID',$request->get('id'))
            ->update(['RST_ACTIVE' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_swim_task')->where('RST_TASKID',$request->get('id'))
            ->update(['RST_ACTIVE' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('r_swim_task')->where('RST_TASKID',$request->get('id'))
            ->update(['RST_TASKNAME' => trim($request->get('taskname')), 'RST_TYPE' => $request->rst_type ]);
        }
        else if($request->get('status') == "add") {
            db::table('r_swim_task')
            ->insert([
                'RST_TASKNAME' => trim($request->get('taskname'))
                , 'RST_TYPE' => $request->rst_type
            ]);
        }
    }

    public function job_role_crud(Request $request)
    {
        
        if($request->get('status') == "normal") {
            
            db::table('r_account_type')->where('RAT_TYPEID',$request->get('id'))
            ->update(['RAT_TYPE' => trim($request->get('taskname')) ]);
        }
        else if($request->get('status') == "add") {
            db::table('r_account_type')
            ->insert(['RAT_TYPE' => trim($request->get('taskname')) ]);
        }
    }

    public function asset_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_assets')->where('ASSET_ID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_assets')->where('ASSET_ID',$request->get('id'))
            ->update(['ACTIVE_FLAG' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('r_assets')->where('ASSET_ID',$request->get('id'))
            ->update([
                'ASSET_NAME' => trim($request->get('asset_name')),
                'ASSET_TYPE' => trim($request->get('asset_purpose')),
                'LOCATION_ID' => $request->get('location_id')
            ]);
        }
        else if($request->get('status') == "add") {
            db::table('r_assets')
            ->insert([
                'ASSET_NAME' => trim($request->get('asset_name')),
                'ASSET_TYPE' => trim($request->get('asset_purpose')),
                'LOCATION_ID' => $request->get('location_id')
            ]);
        }
    }

    public function client_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('t_clients')->where('client_id',$request->get('id'))
            ->update(['active_flag' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('t_clients')->where('client_id',$request->get('id'))
            ->update(['active_flag' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('t_clients')->where('client_id',$request->get('id'))
            ->update([
                'client_name' => $request->get('client_name')
                , 'client_representative' => $request->get('client_representative')
                , 'client_contact' => $request->get('client_contact')
                , 'client_address' => $request->get('client_address')
                , 'client_email' => $request->get('client_email')
            ]);
        }
        else if($request->get('status') == "add") {

            db::table('t_clients')
            ->insert([
                'client_name' => $request->get('client_name')
                , 'client_representative' => $request->get('client_representative')
                , 'client_contact' => $request->get('client_contact')
                , 'client_address' => $request->get('client_address')
                , 'client_email' => $request->get('client_email')
            ]);
        }
    }

    

    public function location_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('r_location_information')->where('RLI_LOCATIONID',$request->get('id'))
            ->update(['RLI_ACTIVE' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('r_location_information')->where('RLI_LOCATIONID',$request->get('id'))
            ->update(['RLI_ACTIVE' => 1]);
        }
        else if($request->get('status') == "normal") {

            $client_id = ($request->get('client_id') == "N\A") ? NULL : $request->get('client_id');
            
            if($request->get('loc_type')== "post") {
                db::table('r_location_information')->where('RLI_LOCATIONID',$request->get('id'))
                ->update([
                    'RLI_LOCATIONAME' => trim($request->get('asset_name')),
                    'LOCATION_TYPE' => $request->get('loc_type'),
                    'DETACHMENT_ID' => $request->get('location_id'),
                    'CLIENT_ID' => $client_id,
                    'RLI_LAT' => $request->get('lat'),
                    'RLI_LONG' => $request->get('long'),
                    'ADDRESS' => $request->get('address'),
                    'PROVINCE' => $request->get('province'),
                    'CITY' => $request->get('city'),
                    'CONTACT' => $request->get('contact'),
                    
                ]);
            }
            else {
                db::table('r_location_information')->where('RLI_LOCATIONID',$request->get('id'))
                    ->update([
                    'RLI_LOCATIONAME' => trim($request->get('asset_name')),
                    'LOCATION_TYPE' => $request->get('loc_type'),
                    'DETACHMENT_ID' => null,
                    'CLIENT_ID' => $client_id,
                    'RLI_LAT' => $request->get('lat'),
                    'RLI_LONG' => $request->get('long'),
                    'ADDRESS' => $request->get('address'),
                    'PROVINCE' => $request->get('province'),
                    'CITY' => $request->get('city'),
                    'CONTACT' => $request->get('contact'),
                
                ]);
            }
        }
        else if($request->get('status') == "add") {
            
            $client_id = ($request->get('client_id') == "N\A") ? NULL : $request->get('client_id');

            if($request->get('loc_type')=="post") {
                db::table('r_location_information')
                ->insert([
                    'RLI_LOCATIONAME' => trim($request->get('asset_name')),
                    'LOCATION_TYPE' => $request->get('loc_type'),
                    'DETACHMENT_ID' => $request->get('location_id'),
                    'CLIENT_ID' => $client_id,
                    'RLI_LAT' => $request->get('lat'),
                    'RLI_LONG' => $request->get('long'),
                    'ADDRESS' => $request->get('address'),
                    'PROVINCE' => $request->get('province'),
                    'CITY' => $request->get('city'),
                    'CONTACT' => $request->get('contact'),
                    
                ]);
            }
            else {
                db::table('r_location_information')
                ->insert([
                    'RLI_LOCATIONAME' => trim($request->get('asset_name')),
                    'LOCATION_TYPE' => $request->get('loc_type'),
                    'CLIENT_ID' => $client_id,
                    'RLI_LAT' => $request->get('lat'),
                    'RLI_LONG' => $request->get('long'),
                    'ADDRESS' => $request->get('address'),
                    'PROVINCE' => $request->get('province'),
                    'CITY' => $request->get('city'),
                    'CONTACT' => $request->get('contact'),
                ]);
            }

            
        }
        else if($request->get('status') == "assign") {

            db::table('r_location_information')->where('RLI_LOCATIONID',$request->get('id'))
            ->update([
                
                'DETACHMENT_ID' => $request->get('detach_id')
            ]);
        }
    }

    public function shift_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('t_shift_configs')->where('tsc_config',$request->get('id'))
            ->update(['active_flag' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('t_shift_configs')->where('tsc_config',$request->get('id'))
            ->update(['active_flag' => 1]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('t_shift_configs')->where('tsc_config',$request->get('shift_id'))
            ->update([
                'tsc_value' => $request->get('txt_shift_name')
                , 'tsc_start' => $request->get('txt_start')
                , 'tsc_end' => $request->get('txt_end')
            ]);
        }
        else if($request->get('status') == "add") {

            db::table('t_shift_configs')
            ->insert([
                'tsc_value' => $request->get('txt_shift_name')
                , 'tsc_start' => $request->get('txt_start')
                , 'tsc_end' => $request->get('txt_end')
            ]);
        }
    }
    public function get_employees(Request $request)
    {
        $data = db::table('users')->where('email','<>','duterterodelb@gmail.com')->get();
        return view('employee.manage_employees',compact('data'));
    }

    public function employee_crud(Request $request)
    {
        if($request->get('status') == "deact") {
            db::table('users')->where('id',$request->get('id'))
            ->update(['active_flag' => 0]);
        }
        else if($request->get('status') == "act") {
            db::table('users')->where('id',$request->get('id'))
            ->update(['active_flag' => 1]);
        }
        else if($request->get('status') == "grant") {
            db::table('users')->where('id',$request->get('id'))
            ->update(['full_access' => 1]);
        }
        else if($request->get('status') == "remove") {
            db::table('users')->where('id',$request->get('id'))
            ->update(['full_access' => 0]);
        }
        else if($request->get('status') == "normal") {
            
            db::table('users')->where('id',$request->get('id'))
            ->update([
                'name' => trim($request->get('taskname')),
                'email' => trim($request->get('email')),
                'password' => bcrypt($request->get('password')),
                'updated_at' => db::raw("CURRENT_TIMESTAMP")
            ]);
        }
        else if($request->get('status') == "profile") {
            
            db::table('users')->where('id',Auth::user()->id)
            ->update([
                'name' => trim($request->get('taskname')),
                'email' => trim($request->get('email')),
                'password' => bcrypt($request->get('password')),
                'updated_at' => db::raw("CURRENT_TIMESTAMP")
            ]);
        }
        else if($request->get('status') == "add") {
            db::table('users')
            ->insert([
                'name' => trim($request->get('taskname')),
                'email' => trim($request->get('email')),
                'password' => bcrypt($request->get('password')),
                'role' => 'admin'
                
            ]);
        }
    }

    public function get_sessions()
    {
        $data = db::table('v_get_current_sessions')->get();
        return view('employee.manage_sessions',compact('data'));
    }

    public function admin_dashboard()
	{	
		return view('admin.admin-dashboard');
	}
    
    public function wv_emergency($pubkey)
    {
        $type = db::table('r_emergency_type')->where('RET_ACTIVE',1)->orderby('RET_TYPENAME','ASC')->get();
        session(['session_public_key' => $pubkey]);
        return view('employee.wv_emergency', compact('type'));
    }

    public function submit_emergency(Request $request)
    {
        $pubkey = session('session_public_key');
        $loc_id = db::table('t_guard_shifts')->where('TGS_GUARDID',$pubkey)->where('TGS_LOCATIONID','<>',87)->value('TGS_LOCATIONID');
        $lat = db::table('t_location_logs')->where('USER_ID',$pubkey)->orderby('DATE_ADDED','DESC')->limit(1)->value('LAT');
        $longh = db::table('t_location_logs')->where('USER_ID',$pubkey)->orderby('DATE_ADDED','DESC')->limit(1)->value('LONGH');

        $log_type = $request->get('selType');
        $log_desc = $request->get('description');
        $derive_name = "";

       

        $last_id = db::table('r_emergency_log')
        ->insertgetid([
            'REL_EMERGENCYTYPE' => $log_type
            , 'REL_EMERGENCYDESC' => $log_desc
            , 'REL_USERID' => $pubkey
            , 'REL_LOCATION' => $loc_id
            , 'REL_LAT' => $lat
            , 'REL_LONG' => $longh
            
        ]);
        
        if ($request->hasFile('file')) 
        {
            $derive_name = md5("e_".$last_id);
            $file = $request->file('file');
            $file->move(public_path('uploads/emergency'), $derive_name); 
        }

        db::table('r_emergency_log')->where('REL_LOGID',$last_id)
        ->update([
            'REL_FILE_NAME' => $derive_name
        ]);

        
        session()->forget('session_public_key');
        return response()->json(['data' => "success" ]);
    }

    public function wv_incident($pubkey)
    {
        
        $type = db::table('r_incident_type')->where('RIT_ACTIVE',1)->orderby('RIT_TYPE','ASC')->get();
        session(['session_public_key' => $pubkey]);
        return view('employee.wv_incident', compact('type'));
    }

    public function submit_incident(Request $request)
    {
        $pubkey = session('session_public_key');
        $loc_id = db::table('t_guard_shifts')->where('TGS_GUARDID',$pubkey)->where('TGS_LOCATIONID','<>',87)->value('TGS_LOCATIONID');
        $lat = db::table('t_location_logs')->where('USER_ID',$pubkey)->orderby('DATE_ADDED','DESC')->limit(1)->value('LAT');
        $longh = db::table('t_location_logs')->where('USER_ID',$pubkey)->orderby('DATE_ADDED','DESC')->limit(1)->value('LONGH');

        $log_type = $request->get('selType');
        $log_desc = $request->get('description');
        $derive_name = "";

        

        $last_id = db::table('r_incident_log')
        ->insertgetid([
            'RIL_LOGTYPE' => $log_type
            , 'RIL_DESC' => $log_desc
            , 'RIL_USERID' => $pubkey
            , 'RIL_LOCATIONID' => $loc_id
            , 'RIL_LAT' => $lat
            , 'RIL_LONGH' => $longh
           
        ]);

        if ($request->hasFile('file')) 
        {
            $derive_name = md5("i_".$last_id);
            $file = $request->file('file');
            $file->move(public_path('uploads/incident'), $derive_name); 
        }

        db::table('r_incident_log')->where('RIL_LOGID',$last_id)
        ->update([
            'RIL_FILE_NAME' => $derive_name
        ]);

        
        session()->forget('session_public_key');
        return response()->json(['data' => "success" ]);
    }

    

    public function admin_get_locations(Request $request)
    {
        if($request->get('type') == "all") 
            $data = db::table('v_admin_get_locations')->where('TGS_STATUS',1)->get();
        else
            $data = db::table('v_admin_get_locations')
            ->where('RAI_TYPE',$request->get('type'))
            ->where('TGS_STATUS',1)->get();
        
        return response()->json(['data' => $data ]);
    }

    public function get_assets()
    {
        $data = db::table('r_assets as ra')
        ->join('r_location_information as rli','ra.LOCATION_ID','rli.RLI_LOCATIONID')
        ->orderby('ACTIVE_FLAG','DESC')->get();

        $location = db::table('r_location_information')->where('RLI_ACTIVE',1)->get();
        return view('employee.manage_assets',compact('data','location'));
    }

    public function import_assets(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new AssetImport, $request->file('file') );
        }
    }

    public function get_emergency_type()
    {
        $data = db::table('r_emergency_type')->orderby('RET_ACTIVE','desc')->get();
        return view('employee.manage_emergency_type',compact('data'));
    }

    public function import_emergency_type(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new EmergencyTypeImport, $request->file('file') );
        }
    }

    public function get_incident_type()
    {
        $data = db::table('r_incident_type')->orderby('RIT_ACTIVE','desc')->get();
        return view('employee.manage_incident_type',compact('data'));
    }

    public function import_incident_type(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new IncidentTypeImport, $request->file('file') );
        }
    }
    
    public function get_location()  
    {
        
        $data = db::table('r_location_information')->where('RLI_ACTIVE',1)->get();

        // ->where(strtolower('LOCATION_TYPE'),'post')        
        $detach = db::table('r_location_information')
        ->where( strtolower('LOCATION_TYPE'), strtolower('Detachment Center'))
        ->get();

        $post = db::table('r_location_information')
        ->where( strtolower('LOCATION_TYPE'),  strtolower('Post'))        
        ->get();

        $client = db::table('t_clients')->where('active_flag',1)->get();
        
        return view('employee.manage_location',compact('data','detach','post','client'));
    }

    public function import_location(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new LocationImport, $request->file('file') );
        }
    }


    public function get_turnover_items()
    {
        $data = db::table('r_turnover_items')->orderby('RTI_ACTIVE','desc')->get();
        return view('employee.manage_turnover_items',compact('data'));
    }

    public function import_turnover_items(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new TurnoverItemsImport, $request->file('file') );
        }
    }
    
    public function get_shifts()
    {
        $data = db::table('v_get_shifts')->orderby('active_flag','desc')->get();
        return view('employee.manage_shifts',compact('data'));
    }

    public function get_notif()
    {
        $data = db::table('r_notifications')->get();
        return view('employee.manage_notif',compact('data'));
    }

    public function notif_crud(Request $request)
    {
        if($request->get('status') == "normal") {
            
            db::table('r_notifications')->where('notif_id',$request->get('notif_id'))
            ->update([
                'title' => $request->get('title')
                , 'body' => $request->get('body')
                , 'date_post' => $request->get('date_post')
            ]);
        }
        else if($request->get('status') == "add") {

            db::table('r_notifications')
            ->insert([
                'title' => $request->get('title')
                , 'body' => $request->get('body')
                , 'date_post' => $request->get('date_post')
            ]);
        }
    }

    public function add_shifts()
    {

    }
    
    public function get_client()
    {
        $data = db::table('t_clients')->orderby('active_flag','desc')->get();
        
        
        return view('employee.manage_client',compact('data'));
    }

    public function import_client(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new ClientImport, $request->file('file') );
        }
    }
    
    public function update_shifts(Request $request)
    {
        db::table('t_shift_configs')->where('tsc_config',$request->get('shift_id'))
        ->update([
            'tsc_value' => $request->get('txt_shift_name')
            , 'tsc_start' => $request->get('txt_start')
            , 'tsc_end' => $request->get('txt_end')
        ]);
            
    }

    public function generateQrCode(Request $request) 
    {
        $guard_id = $request->get('guard_id');
        $name = db::table('r_account_information')->where('RAI_ACCOUNTID',$guard_id)->get();
        
        $qr_name = $guard_id.$name[0]->RAI_LASTNAME.".png";
        $path = public_path('qr-codes/').$qr_name;

        \QrCode::size(500)
                ->format('png')
                ->generate($guard_id, $path);
        
        
        $view = View('qr_printable',compact('name','qr_name'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
           
    }
    
    public function generate_location_qr_all()
    {
        set_time_limit(300);
        $guards = db::table('r_location_information')->where('RLI_ACTIVE',1)->get();
        for($i=0; $i<count($guards); $i++) {

            $qr_name = $guards[$i]->RLI_LOCATIONID.$guards[$i]->RLI_LOCATIONAME.".png";
            $path = public_path('qr-codes/').$qr_name;

            \QrCode::size(500)
                    ->format('png')
                    ->generate($guards[$i]->RLI_LOCATIONID, $path);
                    
        }

        $view = View('all_location_qr_printable',compact('guards'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function generate_location_qr(Request $request) 
    {
        $guard_id = $request->get('asset_id');
        $name = db::table('r_location_information')->where('RLI_LOCATIONID',$guard_id)->get();
        
        $qr_name = $guard_id.$name[0]->RLI_LOCATIONAME.".png";
        $path = public_path('qr-codes/').$qr_name;

        \QrCode::size(500)
                ->format('png')
                ->generate($guard_id, $path);
        
        
        $view = View('location_qr_printable',compact('name','qr_name'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
        
    }

    public function generate_asset_qr(Request $request) 
    {
        
        $guard_id = $request->get('asset_id');
        $name = db::table('r_assets as a')
        ->join('r_location_information as l','a.LOCATION_ID','l.RLI_LOCATIONID')
        ->where('ASSET_ID',$guard_id)
        ->where('a.ACTIVE_FLAG',1)->get();
        
        
        $qr_name = $guard_id.$name[0]->ASSET_NAME.".png";
        $qr_name = (substr_count ($qr_name, '/')>0) ? str_replace("/", "", $qr_name) : $qr_name;
        
        $path = public_path('qr-codes/').$qr_name;

        \QrCode::size(500)
                ->format('png')
                ->generate($guard_id, $path);

        
        $view = View('asset_qr_printable',compact('name','qr_name'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
        
    }

    public function generate_asset_qr_all()
    {
        set_time_limit(300);
        $guards = db::table('r_assets as a')
        ->join('r_location_information as l','a.LOCATION_ID','l.RLI_LOCATIONID')
        ->where('a.ACTIVE_FLAG',1)->get();
        
        
        for($i=0; $i<count($guards); $i++) 
        {

            $qr_name[$i] = (substr_count ($guards[$i]->ASSET_ID.$guards[$i]->ASSET_NAME.".png", '/')>0) ? str_replace("/", "", $guards[$i]->ASSET_ID.$guards[$i]->ASSET_NAME.".png") : $guards[$i]->ASSET_ID.$guards[$i]->ASSET_NAME.".png";
            $path[$i] = public_path('qr-codes/').$qr_name[$i];

            \QrCode::size(500)
                    ->format('png')
                    ->generate($guards[$i]->ASSET_ID, $path[$i]);                    
        }

        $view = View('all_asset_qr_printable',compact('guards'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }


    public function generateAll(Request $request)
    {
        $job_role = $request->get('job_role');
        set_time_limit(300);
        $guards = db::table('r_account_information')->where('RAI_TYPE',$job_role)
        ->where('ACTIVE_FLAG',1)->get();
        for($i=0; $i<count($guards); $i++) {

            $qr_name = $guards[$i]->RAI_ACCOUNTID.$guards[$i]->RAI_LASTNAME.".png";
            $path = public_path('qr-codes/').$qr_name;

            \QrCode::size(500)
                    ->format('png')
                    ->generate($guards[$i]->RAI_ACCOUNTID, $path);
                    
        }

        $view = View('all_qr_printable',compact('guards'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view->render());
        return $pdf->stream();
    }

    public function import_swim(Request $request)
    {
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
            Excel::import(new Swim, $request->file('file') );
        }
    }
    
    public function get_swim()
    {
        $rst_type = "1";
        $data = db::table('r_swim_task')->where('RST_TYPE',1)->orderby('RST_ACTIVE','DESC')->get();
        return view('employee.manage_swim',compact('data','rst_type'));
    }

    public function get_job_role()
    {
        
        $data = db::table('r_account_type')->orderby('RAT_DATEADDED','DESC')->get();
        return view('employee.manage_job_role',compact('data'));
    }

    public function get_swim_super()
    {
        $rst_type = "2";
        $data = db::table('r_swim_task')->where('RST_TYPE',2)->orderby('RST_ACTIVE','DESC')->get();
        return view('employee.manage_swim_super',compact('data','rst_type'));
    }

    public function filters(Request $request)
    {
        $type = $request->get('type');

        if($type == "emergency") {
            $data = db::table('v_admin_get_emergency')->where(DB::raw('DATE(REL_DATEADDED)'), DB::raw('CURRENT_DATE'))->get();
        } else if($type == "incident") {
            $data = db::table('v_admin_get_incidents')->where(DB::raw('DATE(RIL_DATEADDED)'), DB::raw('CURRENT_DATE'))->get();
        } else if($type == "locations") {
            $data = db::table('v_get_detachments')->where('RLI_ACTIVE',1)->get();
        } else if($type == "current_e") {
            $data = db::table('v_admin_get_emergency')->where('REL_LOGID',$request->get('id'))->get();
        } else if($type == "current_i") {
            $data = db::table('v_admin_get_incidents')->where('RIL_LOGID',$request->get('id'))->get();
        }
        
        
        return response()->json(['data' => $data ]);
    }

    public function sp_get_name(Request $request)
    {
        $loc_id = $request->get('id');
        $names = db::select("call SP_GET_MAP(?)",array($loc_id));
        return response()->json(['names' => $names ]);
    }

    public function get_current_status(Request $request)
    {
        $guard_id = $request->get('id');
        $current_status = db::select("call SP_GET_CURRENT_STATUS(?)",array($guard_id));
        return response()->json(['current_status' => $current_status ]);
    }

    

    public function get_client_loc(Request $request)
    {
        if($request->get('id') == 0) {
            $data = db::table('r_location_information')
            ->where('location_type','detachment center')->where('RLI_ACTIVE',1)
            ->get(['RLI_LOCATIONID','RLI_LOCATIONAME']);
        }
        else {
            $data = db::table('r_location_information')
            ->where('location_type','detachment center')
            ->where('RLI_ACTIVE',1)
            ->where('CLIENT_ID',$request->get('id'))
            ->get(['RLI_LOCATIONID','RLI_LOCATIONAME']);
        }

        return response()->json(['data' => $data ]);
    }


    public function filter_inactive(Request $request)
    {
        $status = $request->get('status');
        $inactive = db::select("call SP_GET_INACTIVE_HITS_P(?)",array($status));
        $emergency = db::select("call SP_GET_EMERGENCY_COUNT_P(?)",array($status));
        $incident = db::select("call SP_GET_INCIDENT_COUNT_P(?)",array($status));
        $total_hours = db::select("call SP_GET_DUTY_HOURS_P(?)",array($status));
        
        return response()->json([
            'inactive' => $inactive
            , 'emergency' => $emergency
            , 'incident' => $incident
            , 'total_hours' => $total_hours
            ]);
    }
}
