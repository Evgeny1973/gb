<?php

namespace models;

use components\Model;

class Blog extends Model {

    protected $table = 'blog';

    protected $fields = [
        'id',
        'title',
        'content',
    ];

    protected $rules = [
        'id' => 'int',
        'title' => 'string',
        'content' => 'string',
    ];

}