<?php
/**
 * @package reviews
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_reviews.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'rr-rowtpl',
        'lexicon' => 'reviews:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_reviews.tpl_limit',
        'type' => 'textfield',
        'options' => '',
        'value' => '5',
        'lexicon' => 'reviews:properties',
    ),
    array(
        'name' => 'sort',
        'desc' => 'prop_reviews.sort_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'createdon',
        'lexicon' => 'reviews:properties',
    ),
    array(
        'name' => 'dir',
        'desc' => 'prop_reviews.dir_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'prop_reviews.ascending','value' => 'ASC'),
            array('text' => 'prop_reviews.descending','value' => 'DESC'),
        ),
        'value' => 'DESC',
        'lexicon' => 'reviews:properties',
    ),
);
return $properties;
