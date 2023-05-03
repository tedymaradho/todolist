<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodoRepository.php";
require_once __DIR__ . "/../Service/TodoService.php";
require_once __DIR__ . "/../View/TodoView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";

use Entity\Todolist;
use Repository\TodoRepositoryImpl;
use Service\TodoServiceImpl;
use View\TodoView;

function testViewTodolist(): void
{
    $todoRepository = new TodoRepositoryImpl();
    $todoService = new TodoServiceImpl($todoRepository);
    $todoView = new TodoView($todoService);

    $todoService->add("menari");
    $todoService->add("memasak");
    $todoService->add("mandi");
    $todoService->add("makan");
    $todoService->add("minum");

    $todoView->show();
}
function testAddTodolist(): void
{
    $todoRepository = new TodoRepositoryImpl();
    $todoService = new TodoServiceImpl($todoRepository);
    $todoView = new TodoView($todoService);

    $todoService->add("menari");
    $todoService->add("memasak");
    $todoService->add("mandi");

    $todoView->show();
}
function testRemoveTodolist(): void
{
    $todoRepository = new TodoRepositoryImpl();
    $todoService = new TodoServiceImpl($todoRepository);
    $todoView = new TodoView($todoService);

    $todoService->add("menari");
    $todoService->add("memasak");
    $todoService->add("mandi");

    $todoView->show();
}

testRemoveTodolist();