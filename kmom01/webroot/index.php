<?php
require __DIR__.'/config_with_app.php'; 


//Länkar i front controller
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

//Index
$app->router->add('me', function() use ($app) {
 
 $app->theme->setTitle("Om mig");
 
 $content = $app->fileContent->get('me.md');
 $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

 $byline = $app->fileContent->get('byline.md');
 $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

 $app->views->add('me/page');
});
 
 //Redovisningar
$app->router->add('report', function() use ($app) {

 $app->theme->SetTitle("Redovisning");
 $content = $app->fileContent->get('report.md');
 $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
 
 $byline = $app->fileContent->get('byline.md');
 $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
 $app->views->add('me/page', 
 [
 'content' => $content,
 'byline' => $byline,
 ]);

});
 
 //Source
$app->router->add('source', function() use ($app) {

	$app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Source");
 
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});

//Theme config
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');

//Navbar
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

 
$app->router->handle();
$app->theme->render();


?>
