<?php
/**
 * @package reviews
 */

$formFields = $hook->getValues();

$rev = $modx->getService('reviews','Reviews',$modx->getOption('reviews.core_path',null,$modx->getOption('core_path').'components/reviews/').'model/reviews/',$scriptProperties);
if (!($rev instanceof Reviews)) return '';

$reviews = $modx->getCollection('Review');

$new_review = $modx->newObject('Review');
$new_review->fromArray(array(
    'name' => $formFields['name'],
    'email' => $formFields['email'],
    'description' => $formFields['review'],
    'rating' => $formFields['rating'],
    'resource_id' => $formFields['resource_id']
));
$new_review->save();

return true;
