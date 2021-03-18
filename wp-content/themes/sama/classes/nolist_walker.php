<?php
class No_List_Walker extends Walker_Nav_Menu
{
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        !empty($class_names) && $class_names = 'class="' . esc_attr($class_names) . '"';
        !empty($args->separator) && ($item->menu_order > 1) && $output .= '<span class="menu-sep"> ' . $args->separator . " </span>";
        $output .= "<span id='menu-item-$item->ID' $class_names>";
        $attributes = '';
        !empty($item->attr_title) && $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) && $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) && $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) && $attributes .= ' href="' . esc_attr($item->url) . '"';
        $title = apply_filters('the_title', $item->title, $item->ID);
        $item_output = $args->before . "<a$attributes>" . $args->link_before . $title . '</a>' . $args->link_after . $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</span>";
    }
}
