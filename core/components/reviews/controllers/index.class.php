<?php
require_once dirname(dirname(__FILE__)) . '/model/reviews/reviews.class.php';
class ReviewsIndexManagerController extends modExtraManagerController {
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
    public function process(array $scriptProperties = array()) {}
    public function getPageTitle() { return $this->modx->lexicon('reviews'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->reviews->config['jsUrl'].'mgr/widgets/reviews.grid.js');
        $this->addJavascript($this->reviews->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->reviews->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() {
        return $this->reviews->config['templatesPath'].'home.tpl';
    }
}
