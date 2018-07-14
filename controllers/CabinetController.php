<?php

namespace controllers;


use components\Controller;

class CabinetController extends Controller {

    public function actionIndex() {
        if (AuthController::actionCheck()) {
            $this->render('cabinet.tmpl');
        }else{
            $this->render('login.tmpl');
        }
    }
}