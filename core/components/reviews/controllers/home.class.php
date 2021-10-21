<?php
/**
 * @package reviews
 * @subpackage controllers
 */
class ReviewsHomeManagerController extends ReviewsManagerController {
    public function process(array $scriptProperties = array()) {

    }
    public function getPageTitle() { return $this->modx->lexicon('reviews'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->reviews->config['jsUrl'].'mgr/widgets/reviews.grid.js');
        $this->addJavascript($this->reviews->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->reviews->config['jsUrl'].'mgr/sections/index.js');
    }
    public function getTemplateFile() { return $this->reviews->config['templatesPath'].'home.tpl'; }
}
