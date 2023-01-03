<?php

// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'student');
// for access right
define('ACTIVE_VALUE', 1);
define('DAFAULT_VALUE', 0);

// for user type
define('ADMIN_ID', 1);
define('NORMAL_USER_ID', 4);

// for performance
define('NORMAL', 1);
define('INTERMEDIATE', 2);
define('ADVANCE', 3);

// for status
define('SUSPEND', 2);


// Define App Root
define ('APPROOT', dirname(dirname(__FILE__)));

// Define URL Root
define ('URLROOT', 'http://localhost/student_registration');

// Define SITENAME
define('SITENAME', 'Student Registration');