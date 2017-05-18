<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2015
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'composermodules',
    'title'       => '[MBX] Composer Module Loader',
    'description' => array(
        'de' => 'Erlaubt die verwendung von Modulen über Composer',
        'en' => 'Allow to use modules from composer',
    ),
    'version'     => '1.0.0',
    'author'      => 'Mibexx',
    'url'         => 'http://www.mibexx.de',
    'email'       => 'contact@mibexx.de',
    'extend'      => array(
        'oxModuleList' => 'mbx/composermodules/ext/core/mbx_composermodules_oxmodulelist'
    )
);
