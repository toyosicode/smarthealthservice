<?php

// Database Constants
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");

defined('DB_NAME')   ? null : define("DB_NAME", "smart_service");

defined('ADMIN_EMAIL')        ? null : define("ADMIN_EMAIL", "support@smarthealthservice.com.ng");
defined('ADMIN_NAME')         ? null : define("ADMIN_NAME", "Smart Service");
defined('ADMIN_NAME_EMAIL')   ? null : define("ADMIN_NAME_EMAIL", "Smart Service <support@smarthealthservice.com.ng>");

$timezone = "Africa/Lagos";
date_default_timezone_set($timezone);

defined('RECAPTCHA_SITE_KEY') ? null : define('RECAPTCHA_SITE_KEY', '');
defined('RECAPTCHA_SECRET') ? null : define('RECAPTCHA_SECRET', '');

defined('SMTP_HOST') ? null : define('SMTP_HOST', 'smarthealthservice.com.ng');
defined('SMTP_USERNAME') ? null : define('SMTP_USERNAME', 'mailbox@smarthealthservice.com.ng');
defined('SMTP_PASSWORD') ? null : define('SMTP_PASSWORD', '');

defined('DOJAH_APP_ID') ? null : define('DOJAH_APP_ID', '');
defined('DOJAH_API_KEY') ? null : define('DOJAH_API_KEY', '');