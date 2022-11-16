<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

echo '<br>1 Неймспейсы и автозагрузка в PHP <br>';
$author = new \MyProject\Models\Users\User('Иван');
$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);
var_dump($article);


echo '<br><br>2 Controller в MVC <br>';
$controller = new \MyProject\Controllers\MainController();

if (!empty($_GET['name'])) {
    $controller->sayHello($_GET['name']);
} else {
    $controller->main();
}

echo '<br><br>3 Фронт-контроллер и роутинг в PHP <br>';
$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);