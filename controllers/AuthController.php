<?php

namespace controllers;

use components\Controller;
use models\User;

class AuthController extends Controller {

    public function actionIndex() {
        if (self::actionCheck()) {
            $this->render('cabinet.tmpl');
        } else {
            $this->render('login.tmpl');
        }
    }

    public function actionLogin() {
        $user = User::getUser($_POST['name'], $_POST['password']);
        if (false == $user) {
            $this->render('login.tmpl');
        } else {
            $userSessionId = hash('sha256', uniqid());
            setcookie('MYUSER', $userSessionId, time() + 60 * 60 * 24 * 30, '/');
            User::saveUserSession($user, $userSessionId);
            $this->render('cabinet.tmpl');
        }
    }

    /**
     * Если null, то пользователь не залогинен
     * @return bool
     */
    public static function actionCheck(): bool {
        return (null != User::getCurrentUser());
    }

    /**
     *Выход: удаляем куку и перенаправляем на индекс
     */
    public static function actionLogout() {
        setcookie('MYUSER', '', time() - 10, '/');
        header('Location: /index');
    }
}