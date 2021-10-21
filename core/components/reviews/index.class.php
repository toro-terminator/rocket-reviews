<?php
/**
 * @package reviews
 * @subpackage controllers
 */
require_once dirname(__FILE__) . '/model/reviews/reviews.class.php';
abstract class ReviewsManagerController extends modExtraManagerController {
    /** @var Reviews $reviews */
    public $reviews;
    public function initialize() {
        $this->reviews = new Reviews($this->modx);

        $this->addCss($this->reviews->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->reviews->config['jsUrl'].'mgr/reviews.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            Reviews.config = '.$this->modx->toJSON($this->reviews->config).';
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('reviews:default');
    }
    public function checkPermissions() { return true;}
}
/**
 * @package reviews
 * @subpackage controllers
 */
class IndexManagerController extends ReviewsManagerController {
    public static function getDefaultController() { return 'home'; }
}
