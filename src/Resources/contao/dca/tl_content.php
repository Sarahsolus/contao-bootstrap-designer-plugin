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

$headline_class_options = ['h1','h2','h3','h4','h5','h6'];

$text_type_options = ['cbsd-text','cbsd-link','cbsd-hl'];

$element_value_options = ['shadow','cbsd-shadow-dark','rounded','cbsd-kenburns-img'];

$image_responsive_options = ['standard','always-responsive','always-responsive-desktop','always-responsive-tablet','no-responsive'];

$button_value_options = ['btn-primary','btn-secondary','btn-success','btn-danger','btn-warning','btn-info','btn-light','btn-dark'];


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_display'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_display_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_display_type'],
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
            'cbsd_display_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_display_viewport'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_bgcolor'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'hideButtons'=>true,
        'columnFields' => [
            'cbsd_bgcolor_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_bgcolor_type'],
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
            'cbsd_bgcolor_property' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_bgcolor_property'],
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
            'cbsd_bgcolor_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_bgcolor_value'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_margin'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'cbsd_margin_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_margin_type'],
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
            'cbsd_margin_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_margin_viewport'],
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
            'cbsd_margin_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_margin_value'],
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

$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_padding'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_padding_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_padding_type'],
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
            'cbsd_padding_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_padding_viewport'],
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
            'cbsd_padding_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_padding_value'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_text'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_text_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_text_type'],
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
            'cbsd_text_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_text_value'],
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


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_element'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'cbsd_element_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_element_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $element_value_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:260px',
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


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_headline'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'cbsd_headline_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_text_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $text_value_options,
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:260px',
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

$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_headline_class'] = [
    'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_headline_class'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options' => $headline_class_options,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'                  => [
        'exclude' => true,
        'style' => 'width:260px',
        'tl_class'=>'w50',
        'includeBlankOption' => true,
    ],
    'sql'                   => "varchar(255) NOT NULL default ''",
];




$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_image_responsive'] = [
    'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_image_responsive'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options' => $image_responsive_options,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'                  => ['tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''",
];


$GLOBALS['TL_DCA'][$strName]['fields']['cbsd_button'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'clr w50',
        'columnFields' => [
            'cbsd_button_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_button_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['button'],
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_button_outline' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_button_outline'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['outline'],
                'reference' => &$GLOBALS['TL_LANG']['tl_content'],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'cbsd_button_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['cbsd_button_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => $button_value_options,
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
        'hideButtons' => true,
    ],
    'sql' => "blob NULL",
];





$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette) && $key !== 'headline' ) {
            PaletteManipulator::create()
                ->addLegend('cbsd_design_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE, true)
                ->addField('cbsd_display', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('cbsd_bgcolor', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('cbsd_margin', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('cbsd_padding', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('cbsd_text', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('cbsd_element', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
                ->applyToPalette($key, $dc->table);
        }
    }

    // Headline
    PaletteManipulator::create()
        ->addLegend('cbsd_design_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE, true)
        ->addField('cbsd_display', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->addField('cbsd_bgcolor', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->addField('cbsd_margin', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->addField('cbsd_padding', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->addField('cbsd_headline', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->addField('cbsd_headline_class', 'cbsd_design_legend', PaletteManipulator::POSITION_APPEND)
        ->applyToPalette('headline', 'tl_content');


    // Button Link Option
    PaletteManipulator::create()
        ->addField('cbsd_button', 'rel')
        ->applyToPalette('hyperlink', 'tl_content');
    PaletteManipulator::create()
        ->addField('cbsd_button', 'linkTitle')
        ->applyToPalette('toplink', 'tl_content');


    // Responsive Option
    PaletteManipulator::create()
        ->addField('cbsd_image_responsive', 'size')
        ->applyToPalette('image', 'tl_content');
    PaletteManipulator::create()
        ->addField('cbsd_image_responsive', 'addImage')
        ->applyToPalette('text', 'tl_content');
    PaletteManipulator::create()
        ->addField('cbsd_image_responsive', 'useImage')
        ->applyToPalette('hyperlink', 'tl_content');
    PaletteManipulator::create()
        ->addField('cbsd_image_responsive', 'playerSize')
        ->applyToPalette('player', 'tl_content');

    if (!empty($GLOBALS['TL_CONFIG']['cbsd_settings_responsive'])) {
        if ($GLOBALS['TL_DCA']['tl_content']['fields']['cbsd_image_responsive']['default'] != $GLOBALS['TL_CONFIG']['cbsd_settings_responsive']) {
            $GLOBALS['TL_DCA']['tl_content']['fields']['cbsd_image_responsive']['default'] = $GLOBALS['TL_CONFIG']['cbsd_settings_responsive'];
        }
    }

};
