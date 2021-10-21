<?php
/**
 * @package reviews
 * @subpackage build
 */

$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'rr-rowtpl',
    'description' => 'Displays a Review.',
    'snippet' => file_get_contents($sources['elements'].'chunks/rowtpl.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'rr-form',
    'description' => 'FormIt Form to save a review.',
    'snippet' => file_get_contents($sources['elements'].'chunks/form.chunk.tpl'),
    'properties' => NULL
),'',true,true);

return $chunks;
