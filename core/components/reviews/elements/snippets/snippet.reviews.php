<?php
/**
 * @package reviews
 */
$rev = $modx->getService('reviews','Reviews',$modx->getOption('reviews.core_path',null,$modx->getOption('core_path').'components/reviews/').'model/reviews/',$scriptProperties);
if (!($rev instanceof Reviews)) return '';

/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rr-rowtpl');
$sort = $modx->getOption('sort',$scriptProperties,'createdon');
$dir = $modx->getOption('dir',$scriptProperties,'DESC');
$limit = $modx->getOption('limit',$scriptProperties,'5');
$id = $modx->getOption('id', $scriptProperties);

/* build query */
$c = $modx->newQuery('Review');
if($id){
  $c->where(array('status'=>1,'resource_id'=>$id));
} else {
  $c->where(array('status'=>1));
}
$c->sortby($sort,$dir);
$c->limit($limit);
$reviews = $modx->getCollection('Review',$c);

/* iterate */
$output = '';
foreach ($reviews as $review) {
    $reviewArray = $review->toArray();
    $output .= $modx->getChunk($tpl,$reviewArray);
}

return $output;
