<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function update(Request $request) {

        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
            $request->flash();
            if ($user->password == '' || Hash::check($request->post('oldPassword'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('password')),
                ]);


                $this->validate( $request, [
                    'name' => ['required', 'string', 'max:100', 'min:3'],
                    'password' => ['required', 'string', 'min:1', 'max:100', 'confirmed'],
                ]);

                $user->save();

                $request->session()->flash('success', 'Данные пользователя изменены!');
            } else {
                $errors['oldPassword'][] = "Неверно введен текущий пароль";
            }
            return redirect()->route('editProfile')->withErrors($errors);
        }

        return view('editProfile', [
            'user' => $user
        ]);
    }
}
