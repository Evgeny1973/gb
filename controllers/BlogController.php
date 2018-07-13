<?php

namespace controllers;


use components\Controller;
use models\Blog;

class BlogController extends Controller {

    public function actionIndex() {
        $blogModel = new Blog;
        $blogs = $blogModel->getBlogs();
        $this->render('blogs.tmpl', $blogs);
    }

    public function actionAdd() {
        echo 'Blog -- add';
    }

    public function actionShow($id = 1) {
        $blogModel = new Blog;
        $blog = $blogModel->getBlog($id);
        $this->render('blogs.tmpl', $blog);

    }
}