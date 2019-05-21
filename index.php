<?php
include __DIR__ . '/lib/php-component-magic/index.php';

$options_dir = path::get('root', 'options/components');
$components_dir = path::get('components');

global $component_magic;
$component_magic['root'] = [$options_dir, $components_dir];