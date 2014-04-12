<?php
return [
'views' => [
    
    //Header
    [
        'region'   => 'header', 
        'template' => 'me/header', 
        'data'     => [
            'siteTitle' => "phpmvc - Daniel",
            'siteTagline' => "Något vackert",
        ], 
        'sort'     => -1
    ],

    //Navbar
    [
        'region' => 'navbar',
        'stylesheets' => ['css/style.css', 'css/navbar.css'], 
        'template' => [
            'callback' => function() {
                return $this->di->navbar->create();
            },
        ], 
        'data' => [], 
        'sort' => -1

    ],

    
    //Footer
    [
    'region' => 'footer', 
    'template' => 'me/footer', 
    'data' => [], 
    'sort' => -1],
],


];
