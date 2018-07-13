<?php

namespace components;


use Exceptions\DbException;

class Db {

    use Singleton;

    protected $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    public function __construct() {
        try {
            $this->dbh = new \PDO('mysql:host=localhost;dbname=gb', 'root', '');
        } catch (\PDOException $error) {
            throw new DbException ($error->getMessage());
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @return array
     * @throws DbException
     */
    public function query(string $sql, array $data = []) {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (!$result) {
            throw new DbException('Запрос query к базе не выполнен.');
        }
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     * @throws DbException
     */
    public function execute(string $query, array $params = []) {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        if (!$result) {
            throw new DbException('Запрос execute к базе не выполнен.');
        }
    }
}