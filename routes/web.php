<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function() {
    return redirect()->intended(route('login'));
});

Route::post('/mobile/incident/', 'AdminController@submit_incident')->name('submit_incident');
Route::get('/mobile/view/incident/{pubkey}', 'AdminController@wv_incident')->name('wv_incident');

Route::post('/mobile/emergency/', 'AdminController@submit_emergency')->name('submit_emergency');
Route::get('/mobile/view/emergency/{pubkey}', 'AdminController@wv_emergency')->name('wv_emergency');

Route::get('/admin/get/guards','AdminController@get_guards')->name('get_guards');
Route::post('/import/guards', 'AdminController@import_guards')->name('import_guards');

Route::get('/admin/get/assets','AdminController@get_assets')->name('get_assets');
Route::post('/import/assets', 'AdminController@import_assets')->name('import_assets');

Route::get('/admin/get/emergency_type','AdminController@get_emergency_type')->name('get_emergency_type');
Route::post('/import/emergency_type', 'AdminController@import_emergency_type')->name('import_emergency_type');

Route::get('/admin/get/incident_type','AdminController@get_incident_type')->name('get_incident_type');
Route::post('/import/incident_type', 'AdminController@import_incident_type')->name('import_incident_type');

Route::get('/admin/get/location','AdminController@get_location')->name('get_location');
Route::post('/import/location', 'AdminController@import_location')->name('import_location');


Route::get('/admin/get/turnover_items','AdminController@get_turnover_items')->name('get_turnover_items');
Route::post('/import/turnover_items', 'AdminController@import_turnover_items')->name('import_turnover_items');

Route::get('guards/reports/list','ReportsController@view_reports')->name('view_reports');
Route::post('guards/reports/print','ReportsController@print_logs')->name('print_logs');

Route::get('/get/shifts','AdminController@get_shifts')->name('get_shifts');
Route::post('/add/shifts','AdminController@add_shifts')->name('add_shifts');
Route::post('/update/shifts','AdminController@update_shifts')->name('update_shifts');
// QR Codes
Route::post('generate/qrcode', 'AdminController@generateQrCode')->name('generate/qrcode');
Route::post('generate/asset/qrcode', 'AdminController@generate_asset_qr')->name('generate_asset_qr');
Route::post('generate/asset/all', 'AdminController@generate_asset_qr_all')->name('generate_asset_qr_all');
Route::post('generate/all', 'AdminController@generateAll')->name('generate/all');
Route::post('generate/location/all', 'AdminController@generate_location_qr_all')->name('generate_location_qr_all');
Route::post('generate/location/qrcode', 'AdminController@generate_location_qr')->name('generate_location_qr');



Route::get('/get/swim','AdminController@get_swim')->name('get_swim');
Route::post('/import/swim','AdminController@import_swim')->name('import_swim');



// Crud
Route::post('/guard/crud','AdminController@guard_crud')->name('guard_crud');
Route::post('/guard/shift/crud','AdminController@guard_shift_crud')->name('guard_shift_crud');
Route::post('/incident/crud','AdminController@incident_crud')->name('incident_crud');
Route::post('/incident/asset/crud','AdminController@asset_crud')->name('asset_crud');
Route::post('/incident/location/crud','AdminController@location_crud')->name('location_crud');


// Admin

Route::post('/admin/get/locations/','AdminController@admin_get_locations')->name('admin_get_locations');

Route::post('/admin/get/filters/','AdminController@filters')->name('filters');


Route::group(['middleware' => ['validateBackHistory']], function () {

	Route::group(['middleware' => ['authenticate']], function () {

		Route::group(['middleware' => ['admin']], function () {

            
            Route::post('/import/student', 'AdminController@import_student')->name('import_student');
            Route::get('/admin/dashboard','AdminController@admin_dashboard')->name('admin_dashboard');
            Route::get('/student/dashboard','AdminController@student_dashboard')->name('student_dashboard');
            Route::get('/guards/schedule','AdminController@get_students')->name('get_students');
            
            Route::get('/supervisors/schedule','AdminController@get_shift_supervisor')->name('get_shift_supervisor');
            
            Route::get('/guards','AdminController@get_guards')->name('get_guards');
            Route::get('/supervisors','AdminController@get_supervisor')->name('get_supervisor');
            

            Route::post('/import/guards', 'AdminController@import_guards')->name('import_guards');
            
            Route::get('/admin/get/assets','AdminController@get_assets')->name('get_assets');
            Route::post('/import/assets', 'AdminController@import_assets')->name('import_assets');
            
            Route::get('/admin/get/emergency_type','AdminController@get_emergency_type')->name('get_emergency_type');
            Route::post('/import/emergency_type', 'AdminController@import_emergency_type')->name('import_emergency_type');
            
            Route::get('/admin/get/incident_type','AdminController@get_incident_type')->name('get_incident_type');
            Route::post('/import/incident_type', 'AdminController@import_incident_type')->name('import_incident_type');
            
            Route::get('/admin/get/location','AdminController@get_location')->name('get_location');
            Route::post('/import/location', 'AdminController@import_location')->name('import_location');
            
            Route::get('/admin/get/turnover_items','AdminController@get_turnover_items')->name('get_turnover_items');
            Route::post('/import/turnover_items', 'AdminController@import_turnover_items')->name('import_turnover_items');
            
            
            
            Route::get('/get/shifts','AdminController@get_shifts')->name('get_shifts');
            Route::post('/add/shifts','AdminController@add_shifts')->name('add_shifts');
            Route::post('/update/shifts','AdminController@update_shifts')->name('update_shifts');

            Route::get('/admin/get/client','AdminController@get_client')->name('get_client');
            Route::post('/import/import/client', 'AdminController@import_client')->name('import_client');
            // QR Codes
            Route::post('generate/qrcode', 'AdminController@generateQrCode')->name('generate/qrcode');
            Route::post('generate/asset/qrcode', 'AdminController@generate_asset_qr')->name('generate_asset_qr');
            Route::post('generate/asset/all', 'AdminController@generate_asset_qr_all')->name('generate_asset_qr_all');
            Route::post('generate/all', 'AdminController@generateAll')->name('generate/all');
            Route::post('generate/location/all', 'AdminController@generate_location_qr_all')->name('generate_location_qr_all');
            Route::post('generate/location/qrcode', 'AdminController@generate_location_qr')->name('generate_location_qr');
            
            Route::get('/job/role','AdminController@get_job_role')->name('get_job_role');
            Route::post('/crud/job_role','AdminController@job_role_crud')->name('job_role_crud');
            
            Route::get('/supervisor/swim','AdminController@get_swim_super')->name('get_swim_super');
            Route::get('/guard/swim','AdminController@get_swim')->name('get_swim');
            Route::post('/import/swim','AdminController@import_swim')->name('import_swim');
            
            Route::get('/admin/get/assign','AdminController@get_assigned')->name('get_assigned');
            Route::post('/import/assigned', 'AdminController@import_assigned')->name('import_assigned');
            Route::post('/view/assigned', 'AdminController@get_guards_assigned')->name('get_guards_assigned');
            
            
            // Crud
            Route::post('/guard/crud','AdminController@guard_crud')->name('guard_crud');
            Route::post('/guard/shift/crud','AdminController@guard_shift_crud')->name('guard_shift_crud');
            Route::post('/incident/crud','AdminController@incident_crud')->name('incident_crud');
            Route::post('/incident/asset/crud','AdminController@asset_crud')->name('asset_crud');
            Route::post('/incident/location/crud','AdminController@location_crud')->name('location_crud');
            Route::post('/swim/crud','AdminController@swim_crud')->name('swim_crud');
            Route::post('/emergency/crud','AdminController@emergency_crud')->name('emergency_crud');
            Route::post('/items/crud','AdminController@items_crud')->name('items_crud');
            Route::post('/shift/crud','AdminController@shift_crud')->name('shift_crud');
            
            Route::post('/client/crud','AdminController@client_crud')->name('client_crud');

            Route::post('/notif/crud','AdminController@notif_crud')->name('notif_crud');
            
            
            
            Route::post('/admin/get/locations/','AdminController@admin_get_locations')->name('admin_get_locations');
            Route::post('/admin/get/filters/','AdminController@filters')->name('filters');

            
            Route::post('/employee/crud','AdminController@employee_crud')->name('employee_crud');
			
		   // Reports
            Route::get('reports/activity/logs','ReportsController@view_reports')->name('view_reports');
            Route::get('reports/task/logs','ReportsController@performance_reports')->name('performance_reports');
            
            
            Route::post('reports/task/print','ReportsController@print_task_logs')->name('print_task_logs');
            Route::post('reports/activity/print','ReportsController@print_logs')->name('print_logs');

            Route::get('reports/incidents/logs','ReportsController@incident_reports')->name('incident_reports');
            Route::post('reports/incidents/print','ReportsController@print_incidents')->name('print_incidents');
           
            Route::get('reports/emergency/logs','ReportsController@emergency_reports')->name('emergency_reports');
            Route::post('reports/emergency/print','ReportsController@print_emergency')->name('print_emergency');
            Route::post('get_client_loc','AdminController@get_client_loc')->name('get_client_loc');

            // Filters

            Route::post('filter_inactive','AdminController@filter_inactive')->name('filter_inactive');
            Route::get('personnel/sessions','AdminController@get_sessions')->name('get_sessions');
            Route::post('sp_get_name','AdminController@sp_get_name')->name('sp_get_name');
            Route::post('get_current_status','AdminController@get_current_status')->name('get_current_status');
            

            Route::get('employees','AdminController@get_employees')->name('get_employees');
            
            Route::get('notifications','AdminController@get_notif')->name('get_notif');
            //validation routes

            
            
            Route::post('validate_shift','AdminController@validate_shift')->name('validate_shift');
		});





	});

});
