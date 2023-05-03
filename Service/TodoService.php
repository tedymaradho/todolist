<?php

namespace Service {
    require_once __DIR__ . "/../Entity/Todolist.php";
    require_once __DIR__ . "/../Repository/TodoRepository.php";

    use Entity\Todolist;
    use Repository\TodoRepository;

    interface TodoService
    {
        function show(): void;

        function add(string $todo): void;

        function remove(int $number): void;

    }

    class TodoServiceImpl implements TodoService
    {
        private TodoRepository $todoRepository;

        public function __construct(TodoRepository $todoRepository)
        {
            $this->todoRepository = $todoRepository;
        }

        function show(): void
        {
            echo "TODOLIST" . PHP_EOL;

            foreach ($this->todoRepository->findAll() as $value) {
                echo $value["id"] . ": " . $value["todo"] . PHP_EOL;
            }
        }

        function add(string $todo): void
        {
            $todoList = new Todolist($todo);
            $this->todoRepository->save($todoList);
            echo "Sukses menambah todolist" . PHP_EOL;
        }

        function remove(int $number): void
        {
            if ($this->todoRepository->remove($number)) {
                echo "Sukses remove task ke-$number" . PHP_EOL;
            } else {
                echo "Gagal remove task ke-$number" . PHP_EOL;
            }
        }
    }
}