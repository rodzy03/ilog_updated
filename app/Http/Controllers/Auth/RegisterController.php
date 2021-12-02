<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\User;
use App\t_business_information;
use App\t_business_requirement;
use App\t_b_info_req;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user'
        ]);
    }

    
    public function registeruser(Request $request) 
    {
        // insert business info
        $business_name = explode(',', $request->get('business_name'));
        $tin_no = explode(',', $request->get('tin_no'));

        $business = new t_business_information();
        $business->business_name = $business_name[0];
        $business->tin_number = $tin_no[0];
        $business->save();

        // insert business requirement
        
        $photos = $request->file('myfiles');

        for ($i=0; $i<count($photos); $i++) {

            $business_req = new t_business_requirement();
            $business_req->file_path = $photos[$i]->getClientOriginalName();
            $business_req->file_type = $photos[$i]->getClientOriginalExtension();
            $business_req->save();
            $photos[$i]->move(public_path('uploads/'),$photos[$i]->getClientOriginalName()); 

            $business_and_req = new t_b_info_req();
            $business_and_req->business_id = $business->id;
            $business_and_req->requirement_id = $business_req->id;
            $business_and_req->status = 'pending';

            
            $business_and_req->save();
        }
        
        // insert business infor and requirements
        

        $fullname = explode(',', $request->get('fullname'));
        $gender = explode(',', $request->get('gender'));
        
        $user = new User();
        $user->name = $fullname[0];
        $user->sex = '';
        $user->email = 'rodel@gmail.com';
        $user->password = bcrypt('supplier');
        $user->role = $gender[0];
        $user->business_id = $business->id;
        $user->save();

        return response()->json(['response' => "success"]);
        
    }
}
