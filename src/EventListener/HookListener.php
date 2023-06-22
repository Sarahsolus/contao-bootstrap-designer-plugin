<?php

declare(strict_types=1);

namespace Sarahsolus\ContaoBsDesigner\EventListener;

use Contao\ContentModel;
use Contao\Widget;

class HookListener
{
    public function onGetContentElement(ContentModel $element, string $buffer): string
    {
        return $this->processBuffer($buffer, $element);
    }

    public function onParseWidget(string $buffer, Widget $widget): string
    {
        return $this->processBuffer($buffer, $widget);
    }

    /**
     * @param object $object
     */
    private function processBuffer(string $buffer, $object): string
    {
        if (TL_MODE === 'BE' || (!$object->content_margin && !$object->content_padding && !$object->content_display && !$object->content_color)) {
            return $buffer;
        }

        $classes = '';

        // Content Margin
        if ($object->content_margin) {
            $content_margin = unserialize($object->content_margin,['']);
            foreach ($content_margin as $content_margin_row) {
                if ($content_margin_row['content_margin_type'] && ($content_margin_row['content_margin_value'] || $content_margin_row['content_margin_value']==0) ) {
                    $classes.= $content_margin_row['content_margin_type'].'-';
                    if ($content_margin_row['content_margin_viewport']) {
                        $classes.= $content_margin_row['content_margin_viewport'].'-';
                    }
                    $classes.= $content_margin_row['content_margin_value'].' ';
                }
            }
        }

        // Content Padding
        if ($object->content_padding) {
            $content_padding = unserialize($object->content_padding,['']);
            foreach ($content_padding as $content_padding_row) {
                if ($content_padding_row['content_padding_type'] && ($content_padding_row['content_padding_value'] || $content_padding_row['content_padding_value']==0) ) {
                    $classes.= $content_padding_row['content_padding_type'].'-';
                    if ($content_padding_row['content_padding_viewport']) {
                        $classes.= $content_padding_row['content_padding_viewport'].'-';
                    }
                    $classes.= $content_padding_row['content_padding_value'].' ';
                }
            }
        }

        // Contao Display
        if ($object->content_display) {
            $content_display = unserialize($object->content_display,['']);
            foreach ($content_display as $content_display_row) {
                if ($content_display_row['content_display_type']) {
                    $classes .= 'd-';
                    if ($content_display_row['content_display_viewport']) {
                        $classes.= $content_display_row['content_display_viewport'].'-';
                    }
                    $classes .= $content_display_row['content_display_type'].' ';
                }
            }
        }

        // Content Color Background
        if ($object->content_bgcolor) {
            $content_bgcolor = unserialize($object->content_bgcolor,['']);
            foreach ($content_bgcolor as $content_bgcolor_row) {
                if ($content_bgcolor_row['content_bgcolor_type'] && $content_bgcolor_row['content_bgcolor_value']) {
                    $classes.= $content_bgcolor_row['content_bgcolor_type'].'-';
                    if ($content_bgcolor_row['content_bgcolor_property']) {
                        $classes.= $content_bgcolor_row['content_bgcolor_property'].'-';
                    }
                    $classes.= $content_bgcolor_row['content_bgcolor_value'].' ';
                }
            }
        }

        // Content Text Propertys
        if ($object->content_text) {
            $content_text = unserialize($object->content_text,['']);
            foreach ($content_text as $content_text_row) {
                if ($content_text_row['content_text_type']) {
                    if ($content_text_row['content_text_value']) {
                        $classes.= $content_text_row['content_text_type'].'-';
                        $classes.= $content_text_row['content_text_value'].' ';
                    }
                }
            }
        }

        if ($object->content_image_responsive) {
            $content_image_responsive = $object->content_image_responsive;
            if ($content_image_responsive != 'standard') {
                $classes.= $content_image_responsive;
            }
        }

        $buffer = \preg_replace_callback(
            '|<([a-zA-Z0-9]+)(\s[^>]*?)?(?<!/)>|',
            function ($matches) use ($classes) {
                $tag = $matches[1];
                $attributes = $matches[2];

                $attributes = preg_replace('/class="([^"]+)"/', 'class="$1 '.$classes.'"', $attributes, 1, $count);
                if (0 === $count) {
                    $attributes .= ' class="'.$classes.'"';
                }

                return "<{$tag}{$attributes}>";
            },
            $buffer, 1
        );

        return $buffer;
    }

    public function parseTemplate($objTemplate)
    {
        if ($objTemplate->getName() == 'mod_article') {
            $temp_obj = $objTemplate->getData();

            if (!empty($temp_obj['cbsd_article_container'])) {
                $class_obj= '';
                if ($temp_obj['cbsd_article_container'] == 'container') {
                    $class_obj= 'container cbsd-container';
                } elseif ($temp_obj['cbsd_article_container'] == 'container-fluid') {
                    $class_obj= 'container-fluid cbsd-container-fluid';
                }
                array_unshift($temp_obj['elements'],'<div class="'.$class_obj.'">');
                $temp_obj['elements'][] = '</div>';
                $objTemplate->setData($temp_obj);
            }
        }
    }



}
