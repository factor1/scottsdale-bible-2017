<?php

Namespace factor1;

class Taxonomy {

    protected $_name = null;
    protected $_slug = null;
    protected $_post_type = null;
    protected $_prefix = null;

    protected $_args = [
        'public'=>true,
        'show_ui'=>true,
        'show_in_nav_menus'=>true,
        'show_tagcloud'=>true,
        'show_admin_column'=>false,
        'hierarchical'=>false,
        'query_var'=>true,
        'rewrite'=>[
            'with_front'=>false,
            'hierarchical'=>false
        ],
        'capabilities'=>[
            'manage_terms'=>"manage_categories",
            'edit_terms'=>"manage_categories",
            'delete_terms'=>"manage_categories",
            'assign_terms'=>"edit_posts",
        ],
        'sort'=>true
    ];

    public function __construct($taxonomy_name,$post_type_slug,array $params = [],$type_prefix = null)
    {
        $this->_name = $taxonomy_name;
        $this->_prefix = $type_prefix;
        $this->_slug = substr($this->_prefix.str_replace(" ","_",strtolower($this->_name)),0,32);
        $this->_post_type = $post_type_slug;
        $this->_set_labels();
        $this->_args = array_merge($this->_args,$params);
        return $this;
    }

    protected function _str_pluralize($s)
    {
        if(!is_string($s)||!$s) { return $s; }
        if(substr(strtolower($s),-2)==="ey") { return $s."s"; }
        if(substr(strtolower($s),-1)==="y") { return substr($s,0,-1)."ies"; }
        if(substr(strtolower($s),-2)==="sh"||substr(strtolower($s),-2)==="ss") { return $s."es"; }
        if(substr($s,-2)==="es") { return $s; }
        return $s."s";
    }

    protected function _set_labels()
    {
        $this->_args['label'] = $this->_name;
        $this->_args['labels'] = [
            'name'=>$this->_name,
            'singular'=>$this->_name,
            'menu_name'=>$this->_str_pluralize($this->_name),
            'all_items'=>'All '.$this->_str_pluralize($this->_name),
            'edit_item'=>'Edit '.$this->_name,
            'view_item'=>'View '.$this->_name,
            'update_item'=>'Update '.$this->_name,
            'add_new_item'=>'Add New '.$this->_name,
            'new_item_name'=>'New '.$this->_name,
            'parent_item'=>'Parent '.$this->_name,
            'parent_item_colon'=>'Parent '.$this->_name.':',
            'search_items'=>'Search '.$this->_str_pluralize($this->_name),
            'popular_items'=>'Popular '.$this->_name,
            'search_items_with_commas'=>'Separate '.$this->_str_pluralize($this->_name).' with commas',
            'add_or_remove_items'=>'Add or remove '.$this->_str_pluralize($this->_name),
            'choose_from_most_used'=>'Choose from the most used '.$this->_str_pluralize($this->_name),
            'not_found'=>'No '.$this->_str_pluralize($this->_name).' found'
        ];
    }

    public function register()
    {
        if(!taxonomy_exists($this->_slug)||(defined("FLUSH_REWRITE_RULES")&&FLUSH_REWRITE_RULES)) {
            register_taxonomy(
                $this->_slug,
                [$this->_post_type],
                $this->_args
            );
        }
        return $this;
    }

    public function getName()
    {
        return (string) $this->_name;
    }

    public function getSlug()
    {
        return (string) $this->_slug;
    }

    /**
    *   Retrieves Custom Fields from wp_options
    */
    public static function get_field($taxonomy,$term_id,$field_name)
    {
        return get_option($taxonomy."_".$term_id."_".$field_name);
    }

    /**
    *   Retrieves Custom Fields from wp_options
    */
    public static function get_object_field(\stdClass &$obj,$field_name)
    {
        return get_option($obj->taxonomy."_".$obj->term_id."_".$field_name);
    }

    public static function insert_bulk_terms($taxonomy,array $terms)
    {
        foreach($terms as $term) {
            if(!term_exists($term,$taxonomy)) {
                wp_insert_term(
                    $term,
                    $taxonomy
                );
            }
        }
    }

}
