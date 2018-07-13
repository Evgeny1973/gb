<?php

namespace controllers;

use components\Controller;
use models\User;

class AuthController extends Controller {

    public function actionIndex() {
        $this->render('login.tmpl');
    }

    public function actionLogin() {
        $user = User::getUser($_POST['name'], $_POST['password']);
        if (false == $user) {
            $this->render('login.tmpl');
        } else {
            $userSessionId = hash('sha256', uniqid());
            setcookie('MYUSER', $userSessionId);
            User::saveUserSession($user, $userSessionId);
            $this->render('index.tmpl');
        }
    }

    /**
     * Если null, то пользователь не залогинен
     * @return bool
     */
    public static function actionCheck() {
        return (null != User::getCurrentUser());
    }

    public static function actionLogout() {
        session_destroy();
    }
}