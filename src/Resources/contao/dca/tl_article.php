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
    ->addLegend('digenio_theme_article_articlenavigation_legend', 'layout_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['digenio_articlenavigation_notlisted'], 'digenio_theme_article_articlenavigation_legend', PaletteManipulator::POSITION_APPEND)
    ->addField(['digenio_articlethumbnail_question'], 'digenio_theme_article_articlenavigation_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_article')
;

// Palettes

// Article navigation: prevent listing
// $GLOBALS['TL_DCA']['tl_article']['metasubpalettes']['digenio_articlenavigation_notlisted'] = ['digenio_articlenavigation_notlisted'];
// Article navigation: show thumbnail
$GLOBALS['TL_DCA']['tl_article']['metasubpalettes']['digenio_articlethumbnail_question'] = ['digenio_articlethumbnail_file'];

// Fields

// Article navigation: prevent listing
$GLOBALS['TL_DCA']['tl_article']['fields']['digenio_articlenavigation_notlisted'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['digenio_theme']['digenio_articlenavigation'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true],
    'sql' => "char(1) NOT NULL default ''"
];

// Article navigation: show thumbnail
$GLOBALS['TL_DCA']['tl_article']['fields']['digenio_articlethumbnail_question'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['digenio_theme']['digenio_articlethumbnail_question'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true],
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_article']['fields']['digenio_articlethumbnail_file'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_article']['digenio_theme']['digenio_articlethumbnail_file'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => [
        'files' => true,
        'filesOnly' => true,
        'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes'],
        'fieldType' => 'radio',
        'mandatory' => false,
        'tl_class' => 'clr w50'
    ],
    'save_callback' => array
    (
        array('tl_product_palette', 'saveFile')
    ),
    'load_callback' => array
    (
        array('tl_product_palette', 'loadFile')
    ),
    'sql' => "blob NULL default ''"
    ];

class tl_product_palette extends \Contao\Backend
{
    public $strName = 'tl_product_palette';

    public function saveFile($value)
    {
        $uuid = StringUtil::binToUuid($value);
        $objFile = FilesModel::findByUuid($uuid);
        $value = $objFile->path;
        return $value;
    }

    public function loadFile($value)
    {
        $objFile = FilesModel::findByPath($value);
        $value = $objFile->uuid;
        // $value->uuid = $objFile;
        return $value;
    }

}