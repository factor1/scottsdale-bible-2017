<?php

Namespace factor1;

class CustomPostType {

    protected $_blog = null;
    protected $_name = null;
    protected $_slug = null;
    protected $_obj = null;
    protected $_error = null;
    protected $_prefix = null;
    protected $_taxonomies = [];

    protected $_args = [
        'description'=>"",
        'public'=>true,
        'exclude_from_search'=>true,
        'publicly_queryable'=>true,
        'show_ui'=>true,
        'show_in_nav_menus'=>true,
        'show_in_menu'=>true,
        'show_in_admin_bar'=>true,
        'menu_position'=>20,
        'capability_type'=>"page",
        'map_meta_cap'=>true,
        'hierarchical'=>false,
        'supports'=>['title','editor','custom-fields','revisions','post-formats'],
        'taxonomies'=>[],
        'has_archive'=>true,
        'rewrite'=>[
            'with_front'=>true,
            'feeds'=>true,
            'pages'=>false,
            'ep_mask'=>EP_PERMALINK
        ],
        'query_var'=>true,
        'can_export'=>true
    ];

    public function __construct($post_type_name,array $params = [],$type_prefix = null)
    {
        global $current_blog;
        $this->_blog = $current_blog;
        $this->_name = $post_type_name;
        $this->_prefix = $type_prefix;
        $this->_slug = (isset($params['slug'])) ? $this->_prefix.$params['slug'] : substr($this->_prefix.str_replace(" ","_",strtolower($this->_name)),0,20);
        $this->_args['rewrite']['slug'] = $this->_str_pluralize(str_replace(" ","-",strtolower($this->_name)));
        $this->_set_labels();
        $this->_args = array_merge($this->_args,$params);
        return $this;
    }

    protected function _str_pluralize($s)
    {
        if(!is_string($s)||!$s) { return $s; }
        if(substr(strtolower($s),-2)==="ey") { return $s."s"; }
        if(substr(strtolower($s),-1)==="y") { return substr($s,0,-1)."ies"; }
        if(substr(strtolower($s),-2)==="sh"||substr(strtolower($s),-2)==="ss"||substr(strtolower($s),-2)==="us") { return $s."es"; }
        if(substr($s,-2)==="es") { return $s; }
        return $s."s";
    }

    protected function _set_labels()
    {
        $this->_args['label'] = $this->_name;
        $this->_args['description'] = 'Custom Generated Post Type for '.$this->_str_pluralize($this->_name);
        $this->_args['labels'] = [
            'name'=>$this->_str_pluralize($this->_name),
            'singular_name'=>$this->_name,
            'menu_name'=>$this->_str_pluralize($this->_name),
            'name_admin_bar'=>$this->_name,
            'add_new_item'=>"Add New ".$this->_name,
            'edit_item'=>"Edit ".$this->_name,
            'new_item'=>"New ".$this->_name,
            'view_item'=>"View ".$this->_name,
            'search_items'=>"Search ".$this->_str_pluralize($this->_name),
            'not_found'=>"No ".$this->_str_pluralize($this->_name)." found",
            'not_found_in_trash'=>"No ".$this->_str_pluralize($this->_name)." found in trash",
            'parent_item_colon'=>"Parent ".$this->_name
        ];
    }

    /**
    *   Sets the Permastucture(s) for the custom post type.
    *   @param permalinks String|Array  Pass single string permalink structure or array of strings
    *   @return Returns Current Object
    */
    public function setPermalinks($permalinks)
    {
        if(!is_array($permalinks)) { $permalinks = [$permalinks]; }
        $this->_args['rewrite']['permastruct'] = $permalinks;
        return $this;
    }

    public function register()
    {
        if(!post_type_exists($this->_slug)||(defined("FLUSH_REWRITE_RULES")&&FLUSH_REWRITE_RULES)) {
            $obj = register_post_type(
                $this->_slug,
                $this->_args
            );
            if(is_object($obj)&&get_class($obj)==="WP_Error") {
                $this->_error = $obj;
            } else {
                $this->_obj = $obj;
            }
        }
        foreach($this->_taxonomies as $taxonomy) {
            $taxonomy->register();
        }

        if(isset($this->_args['rewrite']['permastruct'])) {
            add_action("generate_rewrite_rules",[&$this,'_sort_rewrites']);
        }

        add_filter("template_include",[&$this,'_select_template']);

        return $this;
    }

    protected function _blog_path()
    {
        return preg_replace("#^/#","",$this->_blog->path);
    }

    protected function _get_rewrite_rules($permastruct)
    {
        $segments = explode("/",preg_replace("#/$#","",preg_replace("#^/#","",$permastruct)));

        $rules = [];

        for($n=count($segments);$n>0;$n--) {

            $current_segments = array_slice($segments,1,($n-1));

            $rule_key = $segments[0];
            foreach($current_segments as $s) {
                $rule_key .= (!preg_match("#^%(.+)%$#",$s)) ? "/".$s : "/([^/]+)";
            }
            $rule_key .= "(/page/([0-9]+))?/?$";

            $rule = "index.php?post_type=".$this->_slug;

            $query_vars = [];
            foreach($current_segments as $k => $v) {
                if(preg_match("#^%(.+)%$#",$v)) {
                    $query_vars[] = $v;
                }
            }

            foreach($query_vars as $k => $v) {
                $v = str_replace("%postname%","name",$v);
                $v = str_replace("%search_query%","s",$v);
                $rule .= "&".str_replace("%","",$v)."=\$matches[".($k+1)."]";
            }
            $rules[$this->_blog_path().$rule_key] = $rule."&page=\$matches[".(count($query_vars)+2)."]";
        }

        $rules[$this->_blog_path().$segments[0]."/?$"] = "index.php?post_type=".$this->_slug;

        return array_reverse($rules);
    }

    public function _sort_rewrites(\WP_Rewrite $rewrite)
    {
        if(isset($this->_args['rewrite']['permastruct'])) {

            foreach($this->_args['rewrite']['permastruct'] as $permastruct) {
                $segments = explode("/",$permastruct);

                $new_rules = $this->_get_rewrite_rules($permastruct);

                $rewrite->rules = array_merge(
                    $new_rules,
                    $rewrite->rules,
                    $new_rules
                );

                $rules = [];
                foreach($rewrite->rules as $k => $rule) {
                    if(preg_match("#^".preg_quote($this->_blog_path().$segments[1])."\(?/#ismu",$k)) {
                        $rules[$k] = $rule;
                        unset($rewrite->rules[$k]);
                    }
                }

                $rewrite->rules = array_merge($rules,$rewrite->rules);
            }
        }
    }

    public function _select_template($template)
    {
        global $wp_query;

        $post_type = get_query_var("post_type");
        if($post_type!==$this->_slug) {
            return $template;
        }

        if(!$wp_query->is_single) {

            if(!$wp_query->is_post_type_archive) {
                return $template;
            }

            $templates = [
                $this->_str_pluralize($this->slug).'.php',
                sanitize_title($this->_str_pluralize($this->_name)).'.php',
                'page-'.sanitize_title($this->_str_pluralize($this->_name)).'.php',
                'archive.php',
                'index.php',
                'default.php'
            ];

            return get_query_template($post_type,$templates);
        }

        $templates = [
            $this->slug.'.php',
            sanitize_title($this->_name).'.php',
            'page.php',
            'index.php',
            'default.php'
        ];

        return get_query_template($post_type,$templates);
    }

    public function addTaxonomy($taxonomy_name,array $args = [])
    {
        if(isset($this->_taxonomies[$taxonomy_name])) {
            return;
        }

        $taxonomy = new Taxonomy($taxonomy_name,$this->_slug,$args,$this->_prefix);

        if(!is_null($this->_obj)) {
            $taxonomy->register();
        } else {
            $this->_args['taxonomies'][] = $taxonomy->getSlug();
        }

        $this->_taxonomies[] = $taxonomy;

        return $this;
    }

    public function getTaxonomies()
    {
        return $this->_taxonomies;
    }

    public function getSlug()
    {
        return $this->_slug;
    }

}
