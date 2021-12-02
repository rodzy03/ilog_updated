<?php
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Lang;
use DB;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    //use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $maxAttempts = 2;
    protected $decayMinutes = 60;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 5;
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $this->maxAttempts()
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
    }
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }

    protected function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }

    protected function sendLockoutResponse(Request $request)
    {
        $value = '';
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        if($seconds < 60) {
            $value = $seconds.' seconds.';

        } else {
            $value = ceil($seconds / 60).' minutes.';
            
        }
        
        throw ValidationException::withMessages([
            // $this->username() => [Lang::get('auth.throttle', [
            //     'seconds' => $seconds,
            //     'minutes' => ceil($seconds / 60),
            // ])],
            $this->username() => ['Too many login attempts. Please try again in '.$value],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        $active_flag = db::table('users')->where('email',$request->email)->value('active_flag');
        

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if($active_flag == 0) {
            session(['deact' => "Your account is deactivated. Please contact admin"]);
            return redirect('login');
        }
        else
        {
            if ($this->guard()->attempt($credentials)) {
            
                return $this->sendLoginResponse($request);
                
            }
        }
        

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath($request->email));
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function redirectPath($email)
    {
        // if (method_exists($this, 'redirectTo')) {
        //     return $this->redirectTo();
        // }

        //return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        
        if(Auth::user()->role == "admin") 
            return '/admin/dashboard';
        else if(Auth::user()->role == "student")
            return '/student/dashboard';
    }
    protected function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }

    protected function limiter()
    {
        return app(RateLimiter::class);
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input($this->username())).'|'.$request->ip();
    }

    protected function authenticated(Request $request, $user)
    {
        //
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string|min:5|max:50',
        ]);

        
    }

    public function username()
    {
        return 'email';
    }

    public function logout(Request $request)
    {

        //For Delete All Files From  Given Directory.
        
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/login');
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    
}
