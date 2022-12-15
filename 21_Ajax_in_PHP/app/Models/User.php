<?php

namespace app\Models;

class User extends Model
{
    protected $table = 'users';

    public function create($name, $lastName, $email, $password)
    {
        $sql = "insert into {$this->table}(firstName, email, lastName, password) values(:firstName, :email, :lastName, :password)";

        $create = $this->connection->prepare($sql);

        $create->bindValue(':firstName', $name);
        $create->bindValue(':lastName', $lastName);
        $create->bindValue(':email', $email);
        $create->bindValue(':password', $password);

        $create->execute();

        return $this->connection->lastInsertId();
    }
}