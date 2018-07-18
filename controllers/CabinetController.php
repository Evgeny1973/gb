<?php

namespace controllers;


use components\Controller;
use models\Blog;

class CabinetController extends Controller {

    public function actionIndex() {
        if (AuthController::actionCheck()) {
            $blogModel = new Blog;
            $blogs = $blogModel->getAll();
            $this->render('cabinet.tmpl', $blogs);
        }else{
            $this->render('login.tmpl');
        }
    }
}