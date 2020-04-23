<?php


namespace App\Adaptors;
use App\User;
use Illuminate\Support\Facades\Auth;

class Adaptor
{
    public function getUserBySNW($user, string $SNWName) {

        $SNWUser = [
            'idInSNW' => !empty($user->getId())? $user->getId(): '',
            'email' => $user->getEmail(),
            'name' => !empty($user->getName())? $user->getName(): (!empty($user->getNickname())? $user->getNickname() : ''),
            'avatar' => !empty($user->getAvatar())? $user->getAvatar(): '',
            'type_auth' => $SNWName,
            'password' => '',

        ];

        switch ($SNWName) {
            case 'github':
                $SNWUser['email'] = $user->getEmail();
                break;
            case 'vk':
                $SNWUser['email'] = $user->accessTokenResponseBody['email'];
                break;
        }

        if (Auth::check()) {
            return redirect(route('Home'))->with("danger", 'Вы уже авторизованы. Для авторизации под другим пользователем необходимо сначала разлогиниться.');
        }

        $userInSystem = User::query()
            ->where('idInSNW', $SNWUser['idInSNW'])
            ->where('type_auth', $SNWName)
            ->first();


        if (is_null($userInSystem)) {

            $userInSystem = User::query()
                ->where('email',  $SNWUser['email'])
                ->where('idInSNW', '<>', '')
                ->first();

            if (!is_null($userInSystem)) {
                return redirect(route('Home'))->with('danger', 'В системе уже зарегистирован пользователь с таким же почтовым адресом, но дргугим кодом пользователя социальной сети. Авторизация отменена!');
            }

            $userInSystem = User::query()
                ->where('email',  $SNWUser['email'])
                ->where('idInSNW', '')
            ->first();

            if (is_null($userInSystem)) {
                $userInSystem = new User();
            }

            $userInSystem->fill($SNWUser);
            $userInSystem->save();
        }

        return $userInSystem;
    }
}
