<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\StringUtil;

PaletteManipulator::create()
    ->addField(['cbsd_settings_container'], 'doNotCollapse', PaletteManipulator::POSITION_AFTER)
    ->addField(['cbsd_settings_responsive'], 'cbsd_settings_container', PaletteManipulator::POSITION_AFTER)
    ->applyToPalette('default', 'tl_settings')
;


$GLOBALS['TL_DCA']['tl_settings']['fields']['cbsd_settings_container'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['cbsd_settings_container'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        'container',
        'container-fluid'
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_settings'],
    'eval' => [
        'exclude' => true,
        'maxlength' => 255,
        'includeBlankOption' => true,
        'tl_class'=>'w50 clr',
        'chosen' => true
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['cbsd_settings_responsive'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_settings']['cbsd_settings_responsive'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        'standard',
        'always-responsive',
        'always-responsive-desktop',
        'always-responsive-tablet',
        'no-responsive'
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_settings'],
    'eval' => [
        'exclude' => true,
        'maxlength' => 255,
        'includeBlankOption' => true,
        'tl_class'=>'w50',
        'chosen' => true
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];