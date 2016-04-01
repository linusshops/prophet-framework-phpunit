<?php
/**
 *
 *
 * @author Sam Schmidt <samuel@dersam.net>
 * @since 2016-04-01
 */

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>

<phpunit colors="true">
    <testsuites>
        <testsuite name="Prophet Test Suite">
            <directory suffix="Test.php">./tests/</directory>
        </testsuite>
    </testsuites>

    <filter>
        <whitelist>
            <directory>./src</directory>
        </whitelist>
    </filter>
</phpunit>

XML;

return [
    'name' => 'phpunit',
    'validation' =>[
        'files' =>[
            'phpunit.xml'
        ]
    ],
    'init' => [
        'dirs' => [
            './tests/phpunit'
        ],
        'files' => [
            'phpunit.xml' => $xml
        ]
    ]
];
