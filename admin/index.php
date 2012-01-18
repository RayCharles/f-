<?php
error_reporting ( E_ALL );

define ( 'DS', '/' );
define ( 'ROOT', dirname ( dirname ( __FILE__ ) ) ); // same system folder
define ( 'FRAMEWORK', 'system' );
define ( 'APPS', 'admin/application' ); // only for admin folder
define ( 'CORE', 'core' );

require_once ROOT . DS . FRAMEWORK . DS . CORE . DS . 'Bootstrap.php';
