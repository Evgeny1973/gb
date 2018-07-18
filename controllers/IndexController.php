<?php

namespace controllers;

use components\Controller;
use components\Request;
use models\News;

class IndexController extends Controller {

    public function actionIndex() {
        $newsmodel = new News;
        $news = $newsmodel->getAll();
        $this->render('index.tmpl', $news);
    }

    public function actionShow(Request $request) {
        $id = $request->get('id');
        $newsModel = new News;
        $article = $newsModel->getOne($id);
        $this->render('article.tmpl', ['article' => $article]);
    }

}