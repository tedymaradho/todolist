<?php
require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodoRepository.php";
require_once __DIR__ . "/Service/TodoService.php";
require_once __DIR__ . "/View/TodoView.php";
require_once __DIR__ . "/Config/Database.php";

use Repository\TodoRepositoryImpl;
use Service\TodoServiceImpl;
use View\TodoView;
use Config\Database;

echo "Aplikasi todo list" . PHP_EOL;

$conn = Database::getConn();
$todoRepository = new TodoRepositoryImpl($conn);
$todoService = new TodoServiceImpl($todoRepository);
$todoView = new TodoView($todoService);

$todoView->show();