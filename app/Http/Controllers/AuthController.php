<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Routing\Redirector;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Contracts\Foundation\Application;
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
            'password' => bcrypt($request->get("password")),
        ]);

        return response()->redirectTo('login');
    }

    /**
     * @param LoginRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function login(LoginRequest $request)
    {
        if (filter_var($request->get('phone'), FILTER_VALIDATE_INT)) {
            if (Auth::attempt(['phone' => $request->get('phone'), 'password' =>  $request->get('password')])) {
                return redirect(Auth::id(). '/cards');
            }

        }

        if ($dataCard = Card::whereNumber($request->get('phone'))->firstOrFail()){
            $user = User::findOrFail($dataCard->user_id);

            if (Auth::attempt(['phone' => $user->phone, 'password' =>  $request->get('password')])) {
                return redirect(Auth::id(). '/cards');
            }
        }

        if (Auth::attempt(['login' => $request->get('phone'), 'password' =>  $request->get('password')])) {
            return redirect('admin/cities');
        }

        return Redirect::back()->withErrors(['phone' => 'Невірні дані!']);
    }
}
