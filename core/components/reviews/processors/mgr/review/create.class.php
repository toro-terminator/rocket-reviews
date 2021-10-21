<?php
/**
 * @package reviews
 * @subpackage processors
 */
class ReviewCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'Review';
    public $languageTopics = array('reviews:default');
    public $objectType = 'reviews.review';

    public function beforeSave() {
        $name = $this->getProperty('name');
        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('reviews.review_err_ns_name'));
        } 
        //else if ($this->doesAlreadyExist(array('name' => $name))) {
          //  $this->addFieldError('name',$this->modx->lexicon('reviews.review_err_ae'));
        //}
        return parent::beforeSave();
    }
}
return 'ReviewCreateProcessor';
