<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Overriding reset to handle OTP
     */
    public function reset(\Illuminate\Http\Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Check if it's an OTP (6 digits)
        if (strlen($request->token) === 6 && is_numeric($request->token)) {
            $user = \App\Models\User::where('email', $request->email)
                ->where('otp_code', $request->token)
                ->where('otp_expires_at', '>', now())
                ->first();

            if ($user) {
                // Reset password manually
                $user->password = $request->password;
                $user->otp_code = null;
                $user->otp_expires_at = null;
                $user->setRememberToken(\Illuminate\Support\Str::random(60));
                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));

                $this->guard()->login($user);

                return redirect($this->redirectPath())
                    ->with('status', trans('passwords.reset'));
            }

            return back()->withInput($request->only('email'))
                ->withErrors(['token' => 'Invalid or expired OTP code.']);
        }

        // Default Laravel behavior for long tokens
        return $this->traitReset($request);
    }

    // Rename trait method to avoid conflict
    use ResetsPasswords {
        reset as traitReset;
    }
}
