<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 *
 * @package   Digenio
 * @author    digenio GmbH
 * @license   GNU/LGPL
 * @copyright digenio GmbH
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$strName = 'tl_content';

$display_viewport_options = ['sm','md','lg','xl'];
$display_type_options = ['none','block','inline-block','inline'];

$text_value_options = ['left','center','right','justify','shadow','underline','bold','italic','uppercase','brand-primary','brand-secondary','background','white','black','grey','red','yellow','green','blue','orange','brown','pink','violet','cyan'];
$bgcolor_value_option = ['transparent','brand-primary','brand-secondary','background','white','black','grey','red','yellow','green','blue','orange','brown','pink','violet','cyan'];

$margin_type_options =  ['mt','mr','mb','ml','m'];
$padding_type_options =  ['pt','pr','pb','pl','p'];

$margin_value_options = ['0','1', '2', '3', '4', '5', 'auto', 's1', 's2', 's3'];
$padding_value_options = ['0','1', '2', '3', '4', '5', 's1', 's2', 's3'];

$text_type_options = ['cbsd-text','cbsd-link','cbsd-hl'];

$image_responsive_options = ['standard','always-responsive','always-responsive-desktop','always-responsive-tablet','no-responsive'];


$GLOBALS['TL_DCA'][$strName]['fields']['content_display'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'content_display_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_display_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_display_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_display_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
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


$GLOBALS['TL_DCA'][$strName]['fields']['content_bgcolor'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'hideButtons'=>true,
        'columnFields' => [
            'content_bgcolor_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_bgcolor_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['cbsd-bg'],
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:170px',
                    'maxlength' => 255,
                    'chosen' => true
                ],
            ],
            'content_bgcolor_property' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_bgcolor_property'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['opacity'],
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:120px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_bgcolor_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_bgcolor_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $bgcolor_value_option,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['content_margin'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'content_margin_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_margin_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $margin_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_margin_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_margin_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_margin_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_margin_value'],
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

$GLOBALS['TL_DCA'][$strName]['fields']['content_padding'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'content_padding_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_padding_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $padding_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_padding_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_padding_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $display_viewport_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_padding_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_padding_value'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['content_text'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'content_text_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_text_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $text_type_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:170px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_text_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['content_text_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $text_value_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
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

$GLOBALS['TL_DCA'][$strName]['fields']['content_image_responsive'] = [
    'label' => &$GLOBALS['TL_LANG'][$strName]['content_image_responsive'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options' => $image_responsive_options,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'                  => ['tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette)) {
            PaletteManipulator::create()
                ->addLegend('content_design_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE, true)
                ->addField('content_display', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_bgcolor', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_margin', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_padding', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_text', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, $dc->table)
            ;
        }
    }

    // Responsive Option
    PaletteManipulator::create()
        ->addField('content_image_responsive', 'size')
        ->applyToPalette('image', 'tl_content');
    PaletteManipulator::create()
        ->addField('content_image_responsive', 'addImage')
        ->applyToPalette('text', 'tl_content');
    PaletteManipulator::create()
        ->addField('content_image_responsive', 'useImage')
        ->applyToPalette('hyperlink', 'tl_content');
    PaletteManipulator::create()
        ->addField('content_image_responsive', 'playerSize')
        ->applyToPalette('player', 'tl_content');

    if (!empty($GLOBALS['TL_CONFIG']['cbsd_settings_responsive'])) {
        if ($GLOBALS['TL_DCA']['tl_content']['fields']['content_image_responsive']['default'] != $GLOBALS['TL_CONFIG']['cbsd_settings_responsive']) {
            $GLOBALS['TL_DCA']['tl_content']['fields']['content_image_responsive']['default'] = $GLOBALS['TL_CONFIG']['cbsd_settings_responsive'];
        }
    }

};
