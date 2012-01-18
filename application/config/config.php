<?php
define ( 'DEVELOPMENT_ENVIRONMENT', TRUE ); // !important
define ( 'ABS', 'http://localhost/store1212/2' ); // without backslash at the end
                                          // //!important //Change in htdocs
                                          // RewriteBase
                                          
// Do not change
define ( 'TEMPLATE_PATH', ROOT . DS . APPS . DS . 'Views' );
define ( 'DB_CONFIG', ROOT . DS . APPS . DS . 'config' . DS . 'db.config.php' );