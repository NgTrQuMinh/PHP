<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controller/bookcontroller.php';

$database = new Database();
$db = $database->connect();

$bookcontroller = new bookcontroller($db);

$act = $_GET['act'] ?? 'index';
$id  = $_GET['id']  ?? null;

switch ($act) {
    case 'index':
        $bookcontroller->index();
        break;
    case 'read':
        $bookcontroller->read($id);
        break;
    case 'create':
        $bookcontroller->create();
        break;
    case 'store':
        $bookcontroller->store();
        break;
    case 'edit':
        $bookcontroller->edit($id);
        break;
    case 'update':
        $bookcontroller->update();
        break;
    case 'delete':
        $bookcontroller->delete($id);
        break;
    default:
        $bookcontroller->index();
        break;
}
