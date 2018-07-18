<?php

namespace controllers;


use components\Controller;
use components\Request;
use models\Blog;

class BlogController extends Controller {

    public function actionIndex() {
        if (!AuthController::actionCheck()){
            exit('Вы не авторизованы!');
        }
        $blogModel = new Blog;
        $blogs = $blogModel->getAll();
        $this->render('blogs.tmpl', $blogs);
    }

    public function actionAdd(Request $request) {

    }

    public function actionShow(Request $request) {
        $id = $request->get('id');
        $blogModel = new Blog;
        $blog = $blogModel->getOne($id);
        $this->render('blog.tmpl', ['blog' => $blog]);
    }
}