<?php

namespace controllers;


use components\Controller;

class IndexController extends Controller {

    public function actionIndex(){
        $this->render('index.tmpl');
    }

}