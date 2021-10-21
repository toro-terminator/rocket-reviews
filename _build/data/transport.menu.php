<?php
/**
 * Add modMenu into package
 *
 * @package reviews
 * @subpackage build
 */

$menu = $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'Reviews',
    'parent' => 'components',
    'description' => 'Customer Reviews',
    'icon' => '',
    'menuindex' => 10,
    'namespace' => 'reviews',
    'action' => 'index',
    'params' => '',
    'handler' => '',
),'',true,true);

return $menu;
