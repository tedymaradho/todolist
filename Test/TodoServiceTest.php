<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodoRepository.php";
require_once __DIR__ . "/../Service/TodoService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodoServiceImpl;
use Repository\TodoRepositoryImpl;

function testShowTodolist(): void
{
    $conn = \Config\Database::getConn();
    $todoRepository = new TodoRepositoryImpl($conn);

    $todoService = new TodoServiceImpl($todoRepository);

    $todoService->show();
}

function testAddTodolist(): void
{
    $conn = \Config\Database::getConn();
    $todoRepository = new TodoRepositoryImpl($conn);

    $todoService = new TodoServiceImpl($todoRepository);
    $todoService->add("Learn PHP Dasar");
    $todoService->add("PHP OOP");
    $todoService->add("PHP Database");
    $todoService->add("PHP Web");

    // $todoService->show();
}

function testRemoveTodolist(): void
{
    $conn = \Config\Database::getConn();
    $todoRepository = new TodoRepositoryImpl($conn);

    $todoService = new TodoServiceImpl($todoRepository);
    // $todoService->add("Website");
    // $todoService->add("Mobile App");
    // $todoService->add("Desktop app");
    // $todoService->add("Cloud service");
    $todoService->remove(9);
    $todoService->remove(2);

    // $todoService->show();
}

testShowTodolist();