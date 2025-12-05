<?php
session_start();

use Pecee\SimpleRouter\SimpleRouter as Router;

require "../app/core/init.php";

// Start Routing
Router::start();