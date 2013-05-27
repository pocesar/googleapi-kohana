<?php defined('SYSPATH') OR die('No direct script access.');

define('GOOGLE_APIS_PATH', realpath(dirname(__FILE__).'/vendor').DIRECTORY_SEPARATOR);

require_once GOOGLE_APIS_PATH . 'src/Google_Client.php';