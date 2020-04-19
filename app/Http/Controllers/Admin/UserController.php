<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index() {
        $users = User::query()->paginate(5);
        return view('admin.users')->with(['users' => $users,
                                                'inactiveUserId' => Auth::user()->id,
                                                ]);
    }

    function setAdmin(User $user) {

        $user->isAdmin = true;
        $user->save();

        return redirect()->route('admin.users.index')->with(
            'success', "Пользоваетль <$user->name> успешно сделан администратором."
            );
    }

    function unsetAdmin(User $user) {

        $user->isAdmin = false;
        $user->save();

        return redirect()->route('admin.users.index')->with(
            'success', "Пользоваетль <$user->name> успешно исключён из администраторов."
        );
    }

    function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index')->with(
            'success', "Пользоваетль <$user->name> успешно удалён."
        );
    }
}
