<?php
/**
 *
 *
 * @author Sam Schmidt <samuel@dersam.net>
 * @since 2016-03-16
 */

use LinusShops\Prophet\Events;
use LinusShops\Prophet\Magento;

$frameworkPath = __DIR__;
$prophetRoot = $argv[1];
$modulePath = $argv[2];
$magentoPath = $argv[3];

//Local autoloader
require($frameworkPath.'/vendor/autoload.php');
require($prophetRoot.'/Injector.php');

\LinusShops\Prophet\Injector::bootMagento($magentoPath);
\LinusShops\Prophet\Injector::injectAutoloaders($modulePath, $magentoPath, $prophetRoot);

\LinusShops\Prophet\Injector::setPaths(array(
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

return $runner->run($options, false);
