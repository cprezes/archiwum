<?php

define('URL', 'http://localhost/archiwum/');
define('dbhost' , "localhost");
define('dbuser'   , "root");
define('dbpassword' , "");
define('dbumowy',    "umowy");
define('dbarch', "umowy_archiwum");
define('dbpieczecie', 'umowy_pieczecie');
define('PDF_JPG', constant('URL') . "images/pdf.png" );
define('Bug', "<br/><center><b>Nie masz uprawnień do tego modułu.</b></center><br/>" );
define("KATALOG_UMOWY", $_SERVER['DOCUMENT_ROOT'] . "/archiwum/files/" );
define("KATALOG_ARCH", $_SERVER['DOCUMENT_ROOT'] . "/archiwum/files/arch/" );
define("KATALOG_PIECZATKI", $_SERVER['DOCUMENT_ROOT'] . "/archiwum/files/pieczatki/" );
define('admin_user', "admin");
define('admin_pass', "admin");
define('LOG_DB_HOST',"localhost" );
define('LOG_DB_NAME',"log" );
define('LOG_DB_USER',"root" );
define('LOG_DB_PASSWD',"" );
define('LOG_DB_TABLE',"komputery" );

require_once ('include/session.php');
Session::init();
require_once 'include/log_add.php';
