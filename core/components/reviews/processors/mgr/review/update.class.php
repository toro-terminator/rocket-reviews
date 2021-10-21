<?php
/**
 * @package review
 * @subpackage processors
 */
class ReviewUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'Review';
    public $languageTopics = array('reviews:default');
    public $objectType = 'reviews.review';
}
return 'ReviewUpdateProcessor';
