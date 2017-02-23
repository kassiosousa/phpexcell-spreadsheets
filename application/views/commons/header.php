<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<head>
    <meta charset="utf-8">
	<meta name="description" content="PHPExcell Spreedsheets with CodeIgniter to simple read excell datas">
	<meta name="keywords" content="PHPExcell, Spreedsheets, PHP, CodeIgniter">
	<meta name="author" content="Kássio Sousa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <?php
        #Meta
        echo meta(array('name' => 'viewport' , 'content' => 'width=device-width, initial-scale=1.0'));
        #Latest compiled and minified CSS
        echo link_tag('assets/css/foundation.min.css');
        echo link_tag('https://fonts.googleapis.com/icon?family=Material+Icons');
        echo link_tag('assets/css/app.css');
    ?>
</head>
<body>