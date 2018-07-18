<?php

namespace components;
/** @var Db $this */

class Model {

    protected $table = '';

    /**
     * @return null
     */
    public function getAll() {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . $this->table . ' ORDER BY id DESC';
        return $db->query($sql) ?? null;
    }

    /**
     * @param $id
     * @return null
     */
    public function getOne($id) {
        $db = Db::instance();
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $result = $db->query($sql, [':id' => $id]);
        return $result[0] ?? null;
    }

    /**
     * @param $fields
     * @return bool
     * @throws \Exception
     */
    public function create($fields) {
        if (!$this->validate($fields, $this->rules)) {
            return false;
        }
        $cols = [];
        $values = [];
        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $values[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', array_keys($values)) . ')';
        //echo $sql;die;
        $db = Db::instance();
        return $db->execute($sql, $values);
    }

    /**
     * @param $id
     * @param $fields
     * @return bool
     * @throws \Exception
     */
    public function update($id, $fields) {
        if (!$this->validate($fields, $this->rules)) {
            return false;
        }
        $values = [];
        $data = [];
        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $values[] = $name . '=:' . $name;
        }
        $sql = 'UPDATE ' . $this->table .
            ' SET ' . implode(', ', $values) . ' WHERE id=:id';
        $db = Db::instance();
        return $db->execute($sql, $data);
    }

    /**
     * @return bool
     * @throws \Exceptions\DbException
     */
    public function delete($id) {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id=:id';
        $db = Db::instance();
        return $db->execute($sql, ['id' => $id]);
    }

    /**
     * @param $values
     * @param array $rules
     * @return bool
     * @throws \Exception
     */
    public function validate($values, array $rules) {
        if (!empty(array_diff_key($values, $rules))) {
            return false;
        }
        foreach ($rules as $key => $rule) {
            if (!isset($values[$key])) {
                continue;
            }
            switch ($rule) {
                case 'string':
                    if (!is_string($values[$key])) {
                        return false;
                    }
                    break;
                case 'int':
                    if (!is_numeric($values[$key])) {
                        return false;
                    }
                    break;
                default:
                    throw new \Exception('Неизвестное правило валидации');
            }
        }
        return true;
    }
}