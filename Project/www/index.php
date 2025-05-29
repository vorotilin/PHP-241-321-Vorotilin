<?php
session_start();

spl_autoload_register(function(string $className) {
    $baseDir = dirname(__DIR__) . '/src/';
    $file = $baseDir . str_replace(['\\', 'src/'], ['/', ''], $className) . '.php';
    $file = str_replace('/', DIRECTORY_SEPARATOR, $file);
    
    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("Class {$className} not found. Tried: {$file}");
    }
});

$route = $_GET['route'] ?? '';
$patterns = require('route.php');
$findRoute = false;

foreach ($patterns as $pattern => $controllerAndAction) {
    if (preg_match($pattern, $route, $matches)) {
        $findRoute = true;
        unset($matches[0]);
        
        [$controllerClass, $action] = $controllerAndAction;
        
        if (!class_exists($controllerClass)) {
            throw new Exception("Контроллер {$controllerClass} не найден");
        }
        
        $controller = new $controllerClass();
        $controller->$action(...$matches);
        break;
    }
}

if (!$findRoute) {
    http_response_code(404);
    echo 'Страница не найдена';
}
?>
<script src="script.js"></script>


