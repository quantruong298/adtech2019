<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function credentials(Request $request)
    {

        return [
            'email' => $request['email'],
            'password' => $request['password'],
            'status_id' => Status::ACTIVE,
        ];
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $email = $request->get($this->username());
        // Customization: It's assumed that email field should be an unique field
        $user = User::where($this->username(), $email)->first();
        $this->incrementLoginAttempts($request);
        if (!empty($user)) {
            if ($user->status_id === Status::NONE_ACTIVE) {
                return $this->sendFailedLoginResponse('auth.failed_non_active');
            }
            if ($user->status_id === Status::BLOCKED) {
                return $this->sendFailedLoginResponse('auth.failed_blocked');
            }
        }
        return $this->sendFailedLoginResponse();
    }
    public function sendFailedLoginResponse($trans = 'auth.failed')
    {
        throw ValidationException::withMessages([
            $this->username() => [trans($trans)],
        ]);
    }
}
