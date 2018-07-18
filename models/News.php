<?php

namespace models;


use components\Db;
use components\Model;

class News extends Model {

   protected $table = 'news';

    protected $fields = [
        'id',
        'title',
        'content',
        'author',
    ];

    protected $rules = [
        'id' => 'int',
        'title' => 'string',
        'content' => 'string',
        'author' => 'string',
    ];
}