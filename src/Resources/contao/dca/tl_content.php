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

// $GLOBALS['TL_DCA'][$strName]['palettes']['default'] = '{type_legend},type,content_margin';

// $GLOBALS['TL_DCA'][$strName]['subpalettes']['content_margin'] = 'content_margin_all';

/*
$GLOBALS['TL_DCA'][$strName]['fields']['content_margin_all'] = [
    'label'                 => &$GLOBALS['TL_LANG'][$strName]['fields']['content_margin_all'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options'               => ['1', '2', '3', '4', '5'],
    'eval'                  => ['maxlength'=>255, 'includeBlankOption'=>true, 'multiple'=>false, 'chosen'=>true],
    'sql'                   => "varchar(255) NOT NULL default ''"
];
*/

$GLOBALS['TL_DCA'][$strName]['fields']['content_margin'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 clr',
        'columnFields' => [
            'content_margin_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_margin_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'mt' => 'Außenabstand oben (mt)',
                    'mr' => 'Außenabstand rechts (mr)',
                    'mb' => 'Außenabstand unten (mb)',
                    'ml' => 'Außenabstand links (ml)',
                    'm' => 'Außenabstand allseitig (m)',
                    'pt' => 'Innenabstand oben (pt)',
                    'pr' => 'Innenabstand rechts (pr)',
                    'pb' => 'Innenabstand unten (pb)',
                    'pl' => 'Innenabstand links (pl)',
                    'p' => 'Innenabstand allseitig (p)'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_margin_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_margin_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'sm' => 'sm (Handy)',
                    'md' => 'md (Tablet)',
                    'lg'  => 'lg (Monitor)',
                    'xl'  => 'xl (Monitor HD)'
                    ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:140px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_margin_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_margin_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => ['0','1', '2', '3', '4', '5', 's1', 's2', 's3','auto'],
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

$GLOBALS['TL_DCA'][$strName]['fields']['content_display'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50',
        'columnFields' => [
            'content_display_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_display_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'none' => 'Ausblenden (None)',
                    'block' => 'Block',
                    'inline-block' => 'Inline-Block',
                    'inline' => 'Inline'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:230px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_display_viewport' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_display_viewport'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'sm' => 'sm (Handy)',
                    'md' => 'md (Tablet)',
                    'lg'  => 'lg (Monitor)',
                    'xl'  => 'xl (Monitor HD)'
                ],
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
        'tl_class'=>'w50 m12',
        'hideButtons'=>true,
        'columnFields' => [
            'content_bgcolor_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_bgcolor_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'hintergrund' => 'Hintergrundfarbe'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:170px',
                    'maxlength' => 255,
                    'chosen' => true
                ],
            ],
            'content_bgcolor_property' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_bgcolor_property'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'transparent' => 'Transparent'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:120px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_bgcolor_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_bgcolor_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'transparent' => 'Keine (Transparent)',
                    'branding-primary' => 'Brand-Primary',
                    'branding-secondary' => 'Brand-Secondary',
                    'background' => 'Hintergrund (Body)',
                    'weiss' => 'Weiß',
                    'schwarz' => 'Schwarz',
                    'grau' => 'Grau',
                    'rot' => 'Rot',
                    'gelb' => 'Gelb',
                    'gruen' => 'Grün',
                    'blau' => 'Blau',
                    'orange' => 'Orange',
                    'braun' => 'Braun',
                    'pink' => 'Pink',
                    'violoett' => 'Violett',
                    'cyan' => 'Cyan'
                ],
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


$GLOBALS['TL_DCA'][$strName]['fields']['content_color'] = [
    'inputType' => 'multiColumnWizard',
    'exclude' => true,
    'eval' => [
        'tl_class'=>'w50 m12',
        'columnFields' => [
            'content_color_type' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_color_type'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'text' => 'Text',
                    'link' => 'Link',
                    'ueberschrift' => 'Überschrift'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:170px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_color_property' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_color_property'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'schatten' => 'Schatten',
                    'unterstrichen' => 'Unterstrichen',
                    'breit' => 'Breit',
                    'uppercase' => 'Hochgestellt'
                ],
                'eval' => [
                    'exclude' => true,
                    'style' => 'width:120px',
                    'maxlength' => 255,
                    'includeBlankOption' => true,
                    'chosen' => true
                ],
            ],
            'content_color_value' => [
                'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_color_value'],
                'exclude' => true,
                'inputType' => 'select',
                'options' => [
                    'branding-primary' => 'Brand-Primary',
                    'branding-secondary' => 'Brand-Secondary',
                    'weiss' => 'Weiß',
                    'schwarz' => 'Schwarz',
                    'grau' => 'Grau',
                    'rot' => 'Rot',
                    'gelb' => 'Gelb',
                    'gruen' => 'Grün',
                    'blau' => 'Blau',
                    'orange' => 'Orange',
                    'braun' => 'Braun',
                    'pink' => 'Pink',
                    'violoett' => 'Violett',
                    'cyan' => 'Cyan'
                ],
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
    'label' => &$GLOBALS['TL_LANG'][$strName]['fields']['content_image_responsive'],
    'exclude'               => true,
    'inputType'             => 'select',
    'options' => [
        'standard' => 'Standard',
        'always-responsive' => 'Immer aufspannen',
        'always-responsive-desktop' => 'Bis Desktop aufspannen',
        'always-responsive-tablet' => 'Bis Tablet aufspannen',
        'no-responsive' => 'Nicht responsive'
    ],
    'eval'                  => ['tl_class'=>'w50'],
    'sql'                   => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function (DataContainer $dc): void {
    foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $key => $palette) {
        if (\is_string($palette)) {
            PaletteManipulator::create()
                ->addLegend('content_design_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE, true)
                ->addField('content_margin', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_display', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_bgcolor', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
                ->addField('content_color', 'content_design_legend', PaletteManipulator::POSITION_APPEND)
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

};
