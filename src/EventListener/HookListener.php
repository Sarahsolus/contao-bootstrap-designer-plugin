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
        if (TL_MODE === 'BE' || !($object->cbsd_margin || $object->cbsd_padding || $object->cbsd_display || $object->cbsd_color || $object->cbsd_text || $object->cbsd_element || $object->cbsd_headline || $object->cbsd_image_responsive)) {
            return $buffer;
        }

        $classes = '';

        // Content Margin
        if ($object->cbsd_margin) {
            $cbsd_margin = unserialize($object->cbsd_margin,['']);
            foreach ($cbsd_margin as $cbsd_margin_row) {
                if ($cbsd_margin_row['cbsd_margin_type'] && ($cbsd_margin_row['cbsd_margin_value'] || $cbsd_margin_row['cbsd_margin_value']==0) ) {
                    $classes.= $cbsd_margin_row['cbsd_margin_type'].'-';
                    if ($cbsd_margin_row['cbsd_margin_viewport']) {
                        $classes.= $cbsd_margin_row['cbsd_margin_viewport'].'-';
                    }
                    $classes.= $cbsd_margin_row['cbsd_margin_value'].' ';
                }
            }
        }

        // Content Padding
        if ($object->cbsd_padding) {
            $cbsd_padding = unserialize($object->cbsd_padding,['']);
            foreach ($cbsd_padding as $cbsd_padding_row) {
                if ($cbsd_padding_row['cbsd_padding_type'] && ($cbsd_padding_row['cbsd_padding_value'] || $cbsd_padding_row['cbsd_padding_value']==0) ) {
                    $classes.= $cbsd_padding_row['cbsd_padding_type'].'-';
                    if ($cbsd_padding_row['cbsd_padding_viewport']) {
                        $classes.= $cbsd_padding_row['cbsd_padding_viewport'].'-';
                    }
                    $classes.= $cbsd_padding_row['cbsd_padding_value'].' ';
                }
            }
        }

        // Contao Display
        if ($object->cbsd_display) {
            $cbsd_display = unserialize($object->cbsd_display,['']);
            foreach ($cbsd_display as $cbsd_display_row) {
                if ($cbsd_display_row['cbsd_display_type']) {
                    $classes .= 'd-';
                    if ($cbsd_display_row['cbsd_display_viewport']) {
                        $classes.= $cbsd_display_row['cbsd_display_viewport'].'-';
                    }
                    $classes .= $cbsd_display_row['cbsd_display_type'].' ';
                }
            }
        }

        // Content Color Background
        if ($object->cbsd_bgcolor) {
            $cbsd_bgcolor = unserialize($object->cbsd_bgcolor,['']);
            foreach ($cbsd_bgcolor as $cbsd_bgcolor_row) {
                if ($cbsd_bgcolor_row['cbsd_bgcolor_type'] && $cbsd_bgcolor_row['cbsd_bgcolor_value']) {
                    $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_type'].'-';
                    if ($cbsd_bgcolor_row['cbsd_bgcolor_property']) {
                        $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_property'].'-';
                    }
                    $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_value'].' ';
                }
            }
        }

        // Content Text Properties
        if ($object->cbsd_text) {
            $cbsd_text = unserialize($object->cbsd_text,['']);
            foreach ($cbsd_text as $cbsd_text_row) {
                if ($cbsd_text_row['cbsd_text_type']) {
                    if ($cbsd_text_row['cbsd_text_value']) {
                        $classes.= $cbsd_text_row['cbsd_text_type'].'-';
                        $classes.= $cbsd_text_row['cbsd_text_value'].' ';
                    }
                }
            }
        }

        // Content Element Properties
        if ($object->cbsd_element) {
            $cbsd_element = unserialize($object->cbsd_element,['']);
            foreach ($cbsd_element as $cbsd_element_row) {
                    if ($cbsd_element_row['cbsd_element_value']) {
                        $classes.= $cbsd_element_row['cbsd_element_value'].' ';
                    }
            }
        }

        // Content Headline Properties
        if ($object->cbsd_headline) {
            $cbsd_headline = unserialize($object->cbsd_headline,['']);
            foreach ($cbsd_headline as $cbsd_headline_row) {
                    if ($cbsd_headline_row['cbsd_headline_value']) {
                        $classes.= 'cbsd-text-'.$cbsd_headline_row['cbsd_headline_value'].' ';
                    }
            }
        }
        if ($object->cbsd_headline_class) {
            $cbsd_headline_class = $object->cbsd_headline_class;
            $classes.= $cbsd_headline_class.' ';
        }


        // Content Button Properties
        if ($object->cbsd_button) {
            $cbsd_button = unserialize($object->cbsd_button,['']);
            foreach ($cbsd_button as $cbsd_button_row) {
                if ($cbsd_button_row['cbsd_button_type']) {
                    $cbsd_button_class = 'cbsd-btn btn btn-';
                    if ($cbsd_button_row['cbsd_button_outline']) {
                        $cbsd_button_class .= 'outline-';
                    }
                    if ($cbsd_button_row['cbsd_button_value']) {
                        $cbsd_button_class .= str_replace('btn-','',$cbsd_button_row['cbsd_button_value']);
                        $classes.= $cbsd_button_class.' ';
                    }
                }
            }
        }

        if ($object->cbsd_image_responsive) {
            $cbsd_image_responsive = $object->cbsd_image_responsive;
            if ($cbsd_image_responsive != 'standard') {
                $classes.= 'cbsd-'.$cbsd_image_responsive;
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

            // Design
            if ($temp_obj['cbsd_display']) {
                $classes = ' ';
                $cbsd_display = unserialize($temp_obj['cbsd_display'],['']);
                foreach ($cbsd_display as $cbsd_display_row) {
                    if ($cbsd_display_row['cbsd_display_type']) {
                        $classes .= 'd-';
                        if ($cbsd_display_row['cbsd_display_viewport']) {
                            $classes.= $cbsd_display_row['cbsd_display_viewport'].'-';
                        }
                        $classes .= $cbsd_display_row['cbsd_display_type'].' ';
                    }
                }
                $temp_obj['class'] .= $classes;
            }

            if ($temp_obj['cbsd_bgcolor']) {
                $classes = ' ';
                $cbsd_bgcolor = unserialize($temp_obj['cbsd_bgcolor'],['']);
                foreach ($cbsd_bgcolor as $cbsd_bgcolor_row) {
                    if ($cbsd_bgcolor_row['cbsd_bgcolor_type'] && $cbsd_bgcolor_row['cbsd_bgcolor_value']) {
                        $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_type'].'-';
                        if ($cbsd_bgcolor_row['cbsd_bgcolor_property']) {
                            $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_property'].'-';
                        }
                        $classes.= $cbsd_bgcolor_row['cbsd_bgcolor_value'].' ';
                    }
                }
                $temp_obj['class'] .= $classes;
            }

            if ($temp_obj['cbsd_margin']) {
                $classes = ' ';
                $cbsd_margin = unserialize($temp_obj['cbsd_margin'],['']);
                foreach ($cbsd_margin as $cbsd_margin_row) {
                    if ($cbsd_margin_row['cbsd_margin_type'] && ($cbsd_margin_row['cbsd_margin_value'] || $cbsd_margin_row['cbsd_margin_value']==0) ) {
                        $classes.= $cbsd_margin_row['cbsd_margin_type'].'-';
                        if ($cbsd_margin_row['cbsd_margin_viewport']) {
                            $classes.= $cbsd_margin_row['cbsd_margin_viewport'].'-';
                        }
                        $classes.= $cbsd_margin_row['cbsd_margin_value'].' ';
                    }
                }
                $temp_obj['class'] .= $classes;
            }

            if ($temp_obj['cbsd_padding']) {
                $classes = ' ';
                $cbsd_padding = unserialize($temp_obj['cbsd_padding'],['']);
                foreach ($cbsd_padding as $cbsd_padding_row) {
                    if ($cbsd_padding_row['cbsd_padding_type'] && ($cbsd_padding_row['cbsd_padding_value'] || $cbsd_padding_row['cbsd_padding_value']==0) ) {
                        $classes.= $cbsd_padding_row['cbsd_padding_type'].'-';
                        if ($cbsd_padding_row['cbsd_padding_viewport']) {
                            $classes.= $cbsd_padding_row['cbsd_padding_viewport'].'-';
                        }
                        $classes.= $cbsd_padding_row['cbsd_padding_value'].' ';
                    }
                }
                $temp_obj['class'] .= $classes;
            }

            if ($temp_obj['cbsd_article_height']) {
                $temp_obj['class'] .= 'cbsd-'.$temp_obj['cbsd_article_height'];
            }

            // Design End

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
