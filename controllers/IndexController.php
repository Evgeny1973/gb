<?php

namespace controllers;

use components\Controller;
use models\News;

class IndexController extends Controller {

    public function actionIndex() {
        $newsmodel = new News;
        $news = $newsmodel->getAllNews();
        $this->render('index.tmpl', $news);
    }
}