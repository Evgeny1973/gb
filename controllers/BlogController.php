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

    public function actionAdd(Request $request){
        if (empty($request->post())){
            $this->render('addblog.tmpl');
        }else{
            $data = $request->post();
            $blogModel = new Blog();
            $blogModel->create($data);
            header('Location: /blog/index');
        }
    }

    public function actionEdit(Request $request){
        echo 'Edit';
    }

    public function actionDelete(Request $request){
        echo 'Delete';
    }

    public function actionShow(Request $request) {
        $id = $request->get('id');
        $blogModel = new Blog;
        $blog = $blogModel->getOne($id);
        $this->render('blog.tmpl', ['blog' => $blog]);
    }
}