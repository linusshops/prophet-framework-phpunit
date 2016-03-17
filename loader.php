<?php
/**
 *
 *
 * @author Sam Schmidt <samuel@dersam.net>
 * @since 2016-03-16
 */

use LinusShops\Prophet\Events;
use LinusShops\Prophet\Injector;

$frameworkPath = __DIR__;
$prophetRoot = $argv[1];
$modulePath = $argv[2];
$magentoPath = $argv[3];

//Local autoloader
require($frameworkPath.'/vendor/autoload.php');
require($prophetRoot.'/Injector.php');

Injector::bootMagento($magentoPath);
Injector::injectAutoloaders($modulePath, $magentoPath, $prophetRoot);

Injector::setPaths(array(
    'module' => $modulePath,
    'magento' => $magentoPath,
    'prophet' => $prophetRoot,
    'framework' => $frameworkPath
));

$runner = new \PHPUnit_TextUI_Command();
$options = array(
    '--configuration',
    $modulePath.'/phpunit.xml'
);

array_unshift($options, 'phpunit');

Injector::dispatchPremodule();
$runner->run($options, false);
Injector::dispatchPostmodule();
