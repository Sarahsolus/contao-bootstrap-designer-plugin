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


$display_viewport_options = ['sm','md','lg','xl'];
$display_type_options = ['none','block'];

$bgcolor_value_option = ['transparent','brand-primary','brand-secondary','background','white','black','grey','red','yellow','green','blue','orange','brown','pink','violet','cyan'];

$margin_type_options =  ['mt','mr','mb','ml','m'];
$padding_type_options =  ['pt','pr','pb','pl','p'];

$margin_value_options = ['0','1', '2', '3', '4', '5', 'auto', 's1', 's2', 's3'];
$padding_value_options = ['0','1', '2', '3', '4', '5', 's1', 's2', 's3'];


// Palettes
$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_article_container'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => [
        'container',
        'container-fluid'
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_article'],
    'eval' => [
        'exclude' => true,
        'maxlength' => 255,
        'includeBlankOption' => true,
        'tl_class'=>'w50',
        'chosen' => true
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];

// Design

$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_display'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_display_type' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_display_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:270px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_display_viewport' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_display_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:190px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
        ],
        'disableSorting' => true,
    ],
    'sql' => "blob NULL",
];


$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_bgcolor'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'hideButtons'=>true,
        'columnFields' => [
            'cbsd_bgcolor_type' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_bgcolor_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['cbsd-bg'],
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:150px',
                    'maxlength' => 255,
                    'chosen' => true
                ],
            ],
            'cbsd_bgcolor_property' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_bgcolor_property'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['opacity'],
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:110px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_bgcolor_value' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_bgcolor_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $bgcolor_value_option,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:160px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
        ],
        'disableSorting' => true,
    ],
    'sql' => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_margin'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'cbsd_margin_type' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_margin_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $margin_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_margin_viewport' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_margin_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_margin_value' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_margin_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $margin_value_options,
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:80px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
        ],
        'disableSorting' => true,
    ],
    'sql' => "blob NULL",
];

$GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_padding'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_padding_type' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_padding_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $padding_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_padding_viewport' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_padding_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_article'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_padding_value' => [
                'label' => &$GLOBALS['TL_LANG']['tl_article']['cbsd_padding_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $padding_value_options,
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:80px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
        ],
        'disableSorting' => true,
    ],
    'sql' => "blob NULL",
];




PaletteManipulator::create()
    ->addField(['cbsd_padding'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->addField(['cbsd_margin'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->addField(['cbsd_bgcolor'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->addField(['cbsd_display'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->addField(['cbsd_article_container'], 'inColumn', PaletteManipulator::POSITION_AFTER)
    ->applyToPalette('default', 'tl_article')
;




$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'] = [['cbsd_tl_article', 'checkDefaultArticleContainer']];

class cbsd_tl_article extends tl_article
{
    public function checkDefaultArticleContainer(DataContainer $dc = null): void
    {
        if (!empty($GLOBALS['TL_CONFIG']['cbsd_settings_container'])) {
            if ($GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] != $GLOBALS['TL_CONFIG']['cbsd_settings_container']) {
                $GLOBALS['TL_DCA']['tl_article']['fields']['cbsd_article_container']['default'] = $GLOBALS['TL_CONFIG']['cbsd_settings_container'];
            }
        }
        return;
    }
}
