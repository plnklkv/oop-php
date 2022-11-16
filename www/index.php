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