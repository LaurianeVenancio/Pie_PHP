<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user', ['controller' => 'user', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/show', ['controller' => 'user', 'action' => 'show']);
Router::connect('/profil', ['controller' => 'user', 'action' => 'profil']);
Router::connect('/edit_profil', ['controller' => 'user', 'action' => 'edit']);
Router::connect('/home', ['controller' => 'movie', 'action' => 'home']);
Router::connect('/detail', ['controller' => 'movie', 'action' => 'detail']);
Router::connect('/history', ['controller' => 'history', 'action' => 'show']);
Router::connect('/logout', ['controller' => 'user', 'action' => 'logout']);



https://order.cdiscount.com/ReturnPayment.htmlhttps://order.cdiscount.com/ReturnPayment.html