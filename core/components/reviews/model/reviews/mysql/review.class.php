<?php
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/review.class.php');
class Review_mysql extends Review {
    public function __construct(& $xpdo) {
        parent :: __construct($xpdo);
    }
}
?>
