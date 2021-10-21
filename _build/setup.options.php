<?php
/**
 * Build the setup options form.
 *
 * @package reviews
 * @subpackage build
 */
/* set some default values */

/* get values based on mode */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        $output = '<h2>Rocket Reviews Installer</h2>
        <p>Thanks for installing Rocket Reviews! Please visit https://www.rocketcitydigital.com for customer support.</p><br />';
        break;
    case xPDOTransport::ACTION_UPGRADE:
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return $output;
