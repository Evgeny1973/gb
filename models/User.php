<?php

namespace models;


use components\Db;

class User {

    public static function getUser($name, $password) {
        $sql = 'SELECT * FROM users WHERE name=:name';
        $dbh = Db::instance();
        $data = $dbh->query($sql, [':name' => $name]);
        if (empty($data)) {
            return false;
        } else {
            if (password_verify($password, $data[0]['password'])) {
                return $data[0]['id'];
            }
        }
        return false;
    }

    public static function saveUserSession($user, $hash) {
        $sql = 'INSERT INTO user_sessions (user_id, hash) VALUES (:user, :hash)';
        $dbh = Db::instance();
        return $dbh->execute($sql, [':user' => $user, ':hash' => $hash]);

    }

    public static function getCurrentUser() {
        $hash = $_COOKIE['MYUSER'] ?? null;
        if (empty($hash)) {
            return null;
        } else {
            $sql = 'SELECT * FROM user_sessions WHERE hash=:hash';
            $dbh = Db::instance();
            $data = $dbh->query($sql, [':hash' => $hash]);
            if (empty($data[0])) {
                return null;
            } else {
                $sql = 'SELECT * FROM users WHERE id=:id';
                $dbh = Db::instance();
                return $dbh->query($sql, [':id' => $data[0]['user_id']]);
            }
        }
    }
}