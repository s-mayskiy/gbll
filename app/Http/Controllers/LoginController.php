<?php

namespace App\Http\Controllers;

use App\Adaptors\Adaptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
//use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK() {
        if (Auth::check()) {
            return redirect(route('Home'))->with("danger", 'Вы уже авторизованы. Для авторизации под другихм пользователем необходимо сначала разлогиниться.');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor) {

        if (Auth::check()) {
            return redirect(route('Home'))->with("danger", 'Вы уже авторизованы. Для авторизации под другихм пользователем необходимо сначала разлогиниться.');
        }

        $user = Socialite::driver('vkontakte')->user();

        $userInSystem = $userAdaptor->getUserBySNW($user, 'vk');

        Auth::login($userInSystem);

        return redirect(route('Home'))->with("success", "Вы успешно авторизовались через $userInSystem->type_auth");
    }

//-----------------------------------------------------------------

    public function loginGitHub() {
        if (Auth::check()) {
            return redirect(route('Home'))->with("danger", 'Вы уже авторизованы. Для авторизации под другихм пользователем необходимо сначала разлогиниться.');
        }

        return Socialite::with('github')->redirect();
    }

    public function responseGitHub(Adaptor $userAdaptor) {

        if (Auth::check()) {
            return redirect(route('Home'))->with("danger", 'Вы уже авторизованы. Для авторизации под другихм пользователем необходимо сначала разлогиниться.');
        }

        $user = Socialite::driver('github')->user();

        $userInSystem = $userAdaptor->getUserBySNW($user, 'github');

        Auth::login($userInSystem);

        return redirect(route('Home'))->with("success", "Вы успешно авторизовались через $userInSystem->type_auth");
    }
}
