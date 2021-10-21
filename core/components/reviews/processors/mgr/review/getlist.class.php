<?php
/**
 * Get a list of Reviews
 *
 * @package reviews
 * @subpackage processors
 */
class ReviewGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'Review';
    public $languageTopics = array('reviews:default');
    public $defaultSortField = 'name';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'reviews.review';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                'name:LIKE' => '%'.$query.'%',
                'OR:description:LIKE' => '%'.$query.'%',
            ));
        }
        return $c;
    }
}
return 'ReviewGetListProcessor';
