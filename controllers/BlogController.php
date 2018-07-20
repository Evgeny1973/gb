<?php

namespace controllers;

use components\Controller;
use components\Request;
use models\Blog;

class BlogController extends Controller {

    public function actionIndex() {
        if (!AuthController::actionCheck()) {
            exit('Вы не авторизованы!');
        }
        $blogModel = new Blog;
        $blogs = $blogModel->getAll();
        $this->render('blogs.tmpl', $blogs);
    }

    /**
     * Добавление новой записи в блог
     * @param Request $request
     * @throws \Exception
     */
    public function actionAdd(Request $request) {
        if (!AuthController::actionCheck()) {
            exit('Вы не авторизованы!');
        }
        if (empty($request->post())) {
            $this->render('addblog.tmpl');
        } else {
            $data = $request->post();
            $blogModel = new Blog;
            $blogModel->create($data);
            header('Location: /blog/index');
        }
    }

    /**
     * Редактирование записи
     * @param Request $request
     * @throws \Exception
     */
    public function actionEdit(Request $request) {
        if (!AuthController::actionCheck()) {
            exit('Вы не авторизованы!');
        }
        $blogModel = new Blog;
        $id = $request->get('id');
        $blog = $blogModel->getOne($id);
        if (!empty($request->post())) {
            $blogModel->update($id, $request->post());
            header('Location: /blog/index');
        }
        $this->render('editblog.tmpl', ['blog' => $blog]);
    }

    /**
     * Удаление записи по id
     * @param Request $request
     * @throws \Exceptions\DbException
     */
    public function actionDelete(Request $request) {
        if (!AuthController::actionCheck()) {
            exit('Вы не авторизованы!');
        }
        $blogModel = new Blog;
        $id = $request->get('id');
        $blogModel->delete($id);
        header('Location: /blog/index');
    }

    /**
     * Вывод одной записи по id
     * @param Request $request
     */
    public function actionShow(Request $request) {
        if (!AuthController::actionCheck()) {
            exit('Вы не авторизованы!');
        }
        $id = $request->get('id');
        $blogModel = new Blog;
        $blog = $blogModel->getOne($id);
        $this->render('blog.tmpl', ['blog' => $blog]);
    }
}