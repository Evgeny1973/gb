<?php

namespace models;


use components\Db;

class News extends Db {

    public function getAllNews() {
        $db = Db::instance();
        $sql = 'SELECT * FROM news';
        return $db->query($sql);
    }
}