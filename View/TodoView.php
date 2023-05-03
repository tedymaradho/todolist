<?php

namespace View {
    use Service\TodoService;
    use Helper\InputHelper;

    class TodoView
    {
        private TodoService $todoService;

        public function __construct(TodoService $todoService)
        {
            $this->todoService = $todoService;
        }

        function show(): void
        {
            while (true) {
                $this->todoService->show();

                echo "MENU" . PHP_EOL;
                echo "1. Add TodoList" . PHP_EOL;
                echo "2. Remove TodoList" . PHP_EOL;
                echo "3. Exit" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1") {
                    $this->add();
                } else if ($pilihan == "2") {
                    $this->remove();
                } else if ($pilihan == "3") {
                    echo "Sampai Jumpa" . PHP_EOL;
                    break;
                } else {
                    echo "Pilihan tidak ada" . PHP_EOL;
                }
            }
        }

        function add(): void
        {
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo");

            $this->todoService->add($todo);
        }

        function remove(): void
        {
            echo "MENGHAPUS TODO" . PHP_EOL;
            $pilihan = InputHelper::input("Nomor");
            $this->todoService->remove($pilihan);
        }
    }
}