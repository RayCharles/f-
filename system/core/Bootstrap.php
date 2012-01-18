<?php
/**
 * User: Arthur
 * Date: 27.03.11
 * Time: 18:45
 * Bootstrap file
 */

/*
 * ------------------------ Load configuration file ------------------------
 */
require_once ROOT . DS . APPS . DS . 'config' . DS . 'config.php'; // @todo:
                                                                   // Class for
                                                                   // this

/*
 * ---------------------- Load global functions ----------------------
 */
require_once ROOT . DS . FRAMEWORK . DS . CORE . DS . 'common.php';

/*
 * -------------------- Set error reporting --------------------
 */
setReporting ();

/*
 * ------------------------------------------------------------ Load the Router
 * class and redirect to the right Controller
 * -----------------------------------------------------------
 */
$ROUTER = Router::getInstance ();
$ROUTER->route ();