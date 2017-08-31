<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(
  '*' => array(
    // Whether "index.php" should be visible in URLs (true, false, "auto")
    'omitScriptNameInUrls' => auto,
    'usePathInfo'=> true,
    'cpTrigger' => 'admin',
    'allowAutoUpdates' => false,
    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 0,
    // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
    'enableCsrfProtection' => true,
  ),

  'advance.dev' => array(
    'devMode' => true,
    'useCompressedJs' => false,
    'allowAutoUpdates' => true,
    'environmentVariables' => array(
      'baseUrl' => 'http://advance.dev:8888/',
      'basePath' => '/applications/mamp/htdocs/advance/public/',
    ),
  ),

  'staging' => array(
    'environmentVariables' => array(
      'siteUrl' => '',
      'sitePath' => '',
    ),
  ),

);
