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
    'omitScriptNameInUrls' => true,
    'usePathInfo'=> 'auto',
    'cpTrigger' => 'admin',

    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 0,
    // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
    'enableCsrfProtection' => true,

    // enable fuzzy searching in the CP on a global level
    'defaultSearchTermOptions' => array(
      'subLeft' => true,
      'subRight' => true,
    ),
  ),

  'dev' => array(
    'devMode' => true,
    'useCompressedJs' => false,
    'allowAutoUpdates' => true,
    'environmentVariables' => array(
      'siteUrl' => 'http://site.dev:8888/',
      'sitePath' => '/Applications/MAMP/htdocs/****/public/',
    ),
  ),

  'staging' => array(
    'allowAutoUpdates' => false,
    'environmentVariables' => array(
      'siteUrl' => 'http://staging.com/',
      'sitePath' => '/path/to/public',
    ),
  ),

);
