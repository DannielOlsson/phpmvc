<?php
require __DIR__.'/config_with_app.php'; 
 
$app->router->add('', function() use ($app) {
 
});
 
$app->router->add('redovisning', function() use ($app) {
 
});
 
$app->router->add('source', function() use ($app) {
 
});
 
$app->router->handle();
$app->theme->render();


?>