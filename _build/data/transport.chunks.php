<?php
/**
 * @package reviews
 * @subpackage build
 */

$chunks = array();

/* course snippets */
$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'rr-rowtpl',
    'description' => 'Displays a Review.',
    'snippet' => file_get_contents($sources['elements'].'chunks/rowtpl.chunk.tpl'),
    'properties' => NULL
),'',true,true);

return $chunks;
