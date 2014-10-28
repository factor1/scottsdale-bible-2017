<?php

Namespace factor1;

class MegaMenuWalker extends \Walker_Nav_Menu {

    protected $current_item = null;

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl( &$output,$depth = 0,$args = [])
    {
        $depth = (int) $depth;

        $indent = str_repeat("\t", $depth+2);

        $block_grids = implode(" ",preg_grep("#^(large|small|medium)-block-grid-([0-9]+)$#imsu",$this->current_item->classes));

        if(!$depth) {
            $output .= str_repeat("\t", $depth+3)."<nav>\n".str_repeat("\t", $depth+3)."<ul class=\"inline-list ".$block_grids."\">\n";
            return;
        }

        $output .= str_repeat("\t", $depth+3)."<ul class=\"no-bullet ".$block_grids."\">\n";
        return;
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_lvl(&$output,$depth = 0,$args = [])
    {
        $indent = str_repeat("\t", $depth+2);

        if(!$depth) {
            $output .= str_repeat("\t", $depth+3)."</ul>\n".str_repeat("\t", $depth+3)."</nav>\n";
            return;
        }

        $output .= str_repeat("\t", $depth+3)."</ul>\n";
        return;

        //$output .= "$indent</ul>\n";
    }

    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    public function start_el(&$output,$item,$depth = 0,$args = [],$id = 0)
    {
        $depth = (int) $depth;
        $this->current_item = $item;

        $indent = str_repeat( "\t", $depth+2 );

        $item_indent = str_repeat( "\t", $depth+3 );

        if(!$depth) {
            $output .= $indent."<div class=\"small-2 columns\">\n";
        } else {
            $output .= $indent."<li>\n";
        }

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        /**
         * Filter the HTML attributes applied to a menu item's <a>.
         *
         * @since 3.6.0
         *
         * @see wp_nav_menu()
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item The current menu item.
         * @param array  $args An array of wp_nav_menu() arguments.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $item_indent;
        if($depth===1) {
            $item_output .= "<h5>";
        }

        $item_output .= $args->before;
        $item_output .= "<a".$attributes.">";
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= "</a>";
        $item_output .= $args->after;

        if($depth===1) {
            $item_output .= "</h5>";
            if($item->description) {
                $item_output .= "\n".$item_indent."<p>".
                                                    esc_html($item->description).
                                                "</p>";
            }
        }

        $item_output .= "\n";

        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes $args->before, the opening <a>,
         * the menu item's title, the closing </a>, and $args->after. Currently, there is
         * no filter for modifying the opening and closing <li> for a menu item.
         *
         * @since 3.0.0
         *
         * @see wp_nav_menu()
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Page data object. Not used.
     * @param int    $depth  Depth of page. Not Used.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_el(&$output,$item,$depth = 0,$args = [])
    {
        $indent = str_repeat( "\t", $depth+2 );

        $this->current_item = null;

        if(!$depth) {
            $output .= $indent."</div>\n";
            return;
        }

        $output .= $indent."</li>\n";
        return;
    }

}
