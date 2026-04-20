<?php
session_start();
require_once __DIR__ . '/config/database.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/index.php', '', $uri);

if (!isset($_SESSION['user_id']) && $uri !== '/login') {
    header('Location: /login');
    exit;
}

$route = explode('/', trim($uri, '/'));
$controller = $route[0] ?: 'dashboard';
$action = isset($route[1]) ? $route[1] : 'index';

switch ($controller) {
    case 'login':
        require_once __DIR__ . '/controllers/AuthController.php';
        $auth = new AuthController($pdo);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login($_POST['username'], $_POST['password']);
        } else {
            $auth->showLogin();
        }
        break;
    case 'logout':
        require_once __DIR__ . '/controllers/AuthController.php';
        $auth = new AuthController($pdo);
        $auth->logout();
        break;
    case 'dashboard':
        require_once __DIR__ . '/controllers/DashboardController.php';
        $dash = new DashboardController($pdo);
        $dash->index();
        break;
    case 'suppliers':
        require_once __DIR__ . '/controllers/SupplierController.php';
        $supp = new SupplierController($pdo);
        if ($action === 'create') {
            $_SERVER['REQUEST_METHOD'] === 'POST' ? $supp->store($_POST) : $supp->create();
        } elseif ($action === 'edit' && isset($route[2])) {
            $_SERVER['REQUEST_METHOD'] === 'POST' ? $supp->update($route[2], $_POST) : $supp->edit($route[2]);
        } else {
            $supp->index();
        }
        break;
    case 'payments':
        require_once __DIR__ . '/controllers/PaymentController.php';
        $pay = new PaymentController($pdo);
        if ($action === 'create') {
            $_SERVER['REQUEST_METHOD'] === 'POST' ? $pay->store($_POST) : $pay->create();
        } elseif ($action === 'edit' && isset($route[2])) {
            $_SERVER['REQUEST_METHOD'] === 'POST' ? $pay->update($route[2], $_POST) : $pay->edit($route[2]);
        } else {
            $pay->index();
        }
        break;
    case 'batches':
        require_once __DIR__ . '/controllers/BatchController.php';
        $batch = new BatchController($pdo);
        if ($action === 'create') {
            $_SERVER['REQUEST_METHOD'] === 'POST' ? $batch->store($_POST) : $batch->create();
        } elseif ($action === 'show' && isset($route[2])) {
            $batch->show($route[2]);
        } elseif ($action === 'finalize' && isset($route[2])) {
            $batch->finalize($route[2]);
        } else {
            $batch->index();
        }
        break;
    case 'export':
        require_once __DIR__ . '/controllers/ExportController.php';
        $exp = new ExportController($pdo);
        if (isset($route[1])) {
            $exp->exportBatch($route[1]);
        }
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
