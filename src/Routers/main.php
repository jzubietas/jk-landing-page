<?php

use Libs\Router;

Router::get('/',                'Controllers\Landing::home');
Router::get('/nosotros',        'Controllers\Landing::about');
Router::get('/contacto',        'Controllers\Landing::contact');
Router::get('/distribuidores',  'Controllers\Landing::distributions');
Router::get('/noticias',        'Controllers\Landing::news');