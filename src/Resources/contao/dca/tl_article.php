<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   Digenio
 * @author    digenio GmbH
 * @license   GNU/LGPL
 * @copyright digenio GmbH
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\FilesModel;
use Contao\StringUtil;

// Palettes
PaletteManipulator::create()
    ->addField(['cbsd_article_container'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->applyToPalette('default', 'tl_article')
;

$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_article_container'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        'container' => 'Feste Breite (container)',
        'container-fluid' => 'Über die ganze Breite (container-fluid)'
    ],
    'eval' => [
        'exclude' => true,
        'maxlength' => 255,
        'includeBlankOption' => true,
        'tl_class'=>'w50',
        'chosen' => true
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

if ($GLOBALS['TL_CONFIG']['cbsd_settings_container']=='container' && $GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] != 'container') {
    $GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] = 'container';
} elseif ($GLOBALS['TL_CONFIG']['cbsd_settings_container']=='container-fluid' && $GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] != 'container-fluid') {
    $GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] = 'container-fluid';
}