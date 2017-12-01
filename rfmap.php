#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Ontic\RFMap\Repository\PluginRepository;
use Ontic\RFMap\Service\PluginScanner;

$connection = new PDO('sqlite:data/rfmap.sqlite');

// Refresh plugin list on start-up
$pluginDir = __DIR__ . '/plugins';
$plugins = (new PluginScanner())->scan($pluginDir);
(new PluginRepository($connection))->updatePlugins($plugins);
