<?php
/**
 * @package reviews
 * @subpackage build
 */
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = trim(str_replace(array('<?php','?>'),'',$o));
    return $o;
}
$snippets = array();

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'Reviews',
    'description' => 'Displays a list of Reviews.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.reviews.php'),
),'',true,true);
$properties = include $sources['data'].'properties/properties.reviews.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'ReviewsSave',
    'description' => 'Save Reviews via a FormIt Hook.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.reviewssave.php'),
    'properties' => NULL
),'',true,true);

return $snippets;
