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
