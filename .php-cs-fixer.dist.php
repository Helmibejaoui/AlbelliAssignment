<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var');
$header = '@owner        : 20 mars street,Mateur, Bizerte, Tunisia
@contact      : bejaoui.helmi@gmail.com';

return (new PhpCsFixer\Config())
    ->setRules(rules: [
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        '@DoctrineAnnotation' => true,
        'phpdoc_align' => [
            'tags' => [
                'param', 'return', 'throws', 'type', 'var',
            ],
        ],
        'array_syntax' => ['syntax' => 'short'],
        'fopen_flags' => false,
        'protected_to_private' => false,
        'combine_nested_dirname' => true,
        'header_comment' => [
            'header' => $header,
            'separate' => 'both',
            'location' => 'after_open',
        ],
    ])
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setHideProgress(false)
    ->setFinder($finder);
