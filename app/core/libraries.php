<?php
use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\HomeController;
use App\Utility\DateHelper;

require "../vendor/autoload.php";

// Loading packages for environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

// Guzzle Library
$guzzle = new GuzzleHttp\Client();

// Simple-PHP-Router Library
Router::setDefaultNamespace('\App\Controllers');