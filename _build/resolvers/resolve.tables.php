<?php
/**
 * Resolve creating custom db tables during install.
 *
 * @package reviews
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('reviews.core_path',null,$modx->getOption('core_path').'components/reviews/').'model/';
            $modx->addPackage('reviews',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('Review');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;
