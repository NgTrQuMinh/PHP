<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controller/bookController.php';

$database = new Database();
$db = $database->connect();
$bookController = new BookController($db);

$act = $_GET['act'] ?? 'index';
$id  = $_GET['id']  ?? null;

switch ($act) {
    case 'index':   $bookController->index();        break;
    case 'read':    $bookController->read($id);      break;
    case 'create':  $bookController->create();       break;
    case 'store':   $bookController->store();        break;
    case 'edit':    $bookController->edit($id);      break;
    case 'update':  $bookController->update();       break;  // ← thêm update riêng
    case 'delete':  $bookController->delete($id);   break;
    default:        $bookController->index();        break;
}
