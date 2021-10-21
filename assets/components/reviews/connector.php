<?php
/**
 * Reviews Connector
 *
 * @package reviews
 */
require_once dirname(dirname(dirname(__DIR__))) . '/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('reviews.core_path',null,$modx->getOption('core_path').'components/reviews/');
require_once $corePath.'model/reviews/reviews.class.php';
$modx->reviews = new Reviews($modx);
$modx->lexicon->load('reviews:default');


/* handle request */
$path = $modx->getOption('processorsPath',$modx->reviews->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
