<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @return string
     */
    public function username(): string
    {
        return filter_var(request('phone'), FILTER_VALIDATE_EMAIL) ? 'phone' : 'login';
    }

    /**
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function registration(RegistrationRequest $request): RedirectResponse
    {
        User::create([
            'name'    => $request->get("name"),
            'phone'    => $request->get("phone"),
            'email'    => $request->get("email"),
            'password' => Hash::make($request->get("password")),
        ]);

        return response()->redirectTo('login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (filter_var($request->get('phone'), FILTER_VALIDATE_INT)) {
            if (Auth::attempt(['phone' => $request->get('phone'), 'password' =>  $request->get('password')])) {
                return redirect(Auth::id(). '/cards');
            }
        } else {
            if (Auth::attempt(['login' => $request->get('phone'), 'password' =>  $request->get('password')])) {
                return redirect('admin/cities');
            }
        }

        return Redirect::back()->withErrors(['phone' => 'Невірні дані!']);
    }
}
