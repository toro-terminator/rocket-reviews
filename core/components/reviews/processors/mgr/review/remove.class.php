<?php
/**
 * @package review
 * @subpackage processors
 */
class ReviewRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'Review';
    public $languageTopics = array('reviews:default');
    public $objectType = 'reviews.review';
}
return 'ReviewRemoveProcessor';
