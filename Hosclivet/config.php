<?php
$config = Config::singleton();
 
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('templatesFolder', 'templates/');
$config->set('cssFolder', $config->get('viewsFolder') . 'css/');
$config->set('jsFolder', $config->get('viewsFolder') . 'js/');
$config->set('imgFolder', $config->get('viewsFolder') . 'img/');

$config->set('htmlRoute','/Hosclivet/views/');

$config->set('dbhost', '127.0.0.1');
$config->set('dbname', 'Hosclivet');
$config->set('dbuser', 'user');
$config->set('dbpass', '');
?>