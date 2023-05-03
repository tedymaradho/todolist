<?php

namespace Repository {

    use Entity\Todolist;

    interface TodoRepository
    {
        function save(Todolist $todolist): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodoRepositoryImpl implements TodoRepository
    {
        public array $todolist = array();

        private \PDO $conn;

        public function __construct(\PDO $conn)
        {
            $this->conn = $conn;
        }

        function save(Todolist $todolist): void
        {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;

            $sql = "INSERT INTO todolist(todo) VALUE (?)";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$todolist->getTodo()]);
        }

        function remove(int $number): bool
        {
            // if ($number > sizeof($this->todolist)) {
            //     return false;
            // }

            // for ($i = $number; $i < sizeof($this->todolist); $i++) {
            //     $this->todolist[$i] = $this->todolist[$i + 1];
            // }

            // unset($this->todolist[sizeof($this->todolist)]);

            // return true;

            $sql = "SELECT*FROM todolist WHERE id=?";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                $sql = "DELETE FROM todolist WHERE id=?";
                $statement = $this->conn->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }

        }

        function findAll(): array
        {
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->conn->query($sql);
            $this->todolist = $statement->fetchAll();

            return $this->todolist;
        }
    }
}