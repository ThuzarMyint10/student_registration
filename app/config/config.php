<?php

// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'student');
// for access right
define('IS_LOGIN', 1);
define('NO_LOGIN', 0);
define('IS_CONFIRM', 1);
define('NO_CONFIRM', 0);
define('IS_ACTIVE', 1);
define('NO_ACTIVE', 0);

define('NO_ADDRESS', 0);
define('NO_EDUCATION', 0);
// for user type
define('ADMIN_ID', 1);
define('NORMAL_USER_ID', 4);

// for performance
define('NORMAL', 1);
define('INTERMEDIATE', 2);
define('ADVANCE', 3);

// for education
define('NO_SEMESTER', 0);
// for status
define('ACTIVE', 1);
define('SUSPEND', 2);


// Define App Root
define ('APPROOT', dirname(dirname(__FILE__)));

// Define URL Root
define ('URLROOT', 'http://localhost/student_registration');

// Define SITENAME
define('SITENAME', 'Student Registration');