<?php

Namespace shortcodes;

class ShortcodeMaker {

    public $capability = 'manage_options';
    public $short_codes = [];
    public $shortcode_dir = null;

    public function __construct()
    {
        add_action( 'admin_menu', array( &$this, '_add_top_level_menu' ) );
        $this->shortcode_dir = get_template_directory()."/lib/factor1/shortcodes/";
        if($handle = opendir($this->shortcode_dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry != "_instructions.php") {
                    if(preg_match('/\.php$/', $entry)) {
                        $name = strtolower(str_replace('.php', '', $entry));
                        add_shortcode($name, array(&$this, "_".$name) );
                        $f = fopen($this->shortcode_dir.$entry, 'r'); $line = fgets($f); $line = fgets($f); fclose($f);
                        if(preg_match('/^\#/', $line)) {
                            $this->short_codes[$name] = array('args' => explode(',', trim($line, '#')));
                        } else {
                            $this->short_codes[$name] = array('args' => array());
                        }
                    }
                }
            }
            closedir($handle);
        }
    }

    public function __call($name,array $args)
    {
        if(!isset($args[0])||!$args[0]) {
            $args[0] = [];
        }

        if(isset($args[1])&&$args[1]) {
            $args[0]['content'] = $args[1];
        }

        return $this->_render(trim($name, '_').".php", $args[0]);
    }

    public function _add_top_level_menu()
    {
        $page_title = 'Shortcodes';
        $menu_title = 'Shortcodes';
        $menu_slug = 'shortcode-maker';
        add_menu_page($page_title, $menu_title, $this->capability, $menu_slug,[&$this,'_display_admin_instructions']);
    }

    public function _display_admin_instructions()
    {
        echo $this->_render('_instructions.php');
    }

    public function _shortcode_get_instructions($shortcode)
    {
        ob_start();
        if(is_file($this->shortcode_dir.$shortcode.".instructions")) {
            include($this->shortcode_dir.$shortcode.".instructions");
        }
        $_output = ob_get_contents();
        ob_end_clean();
        return $_output;
    }

    public function _render($__tpl__,array $vars = [])
    {
        if(is_array($vars)) {
            foreach($vars as $__ky__=>$__val__) {
                $$__ky__ = $__val__;
            }
        }
        ob_start();
        include($this->shortcode_dir.$__tpl__);
        $_output = ob_get_contents();
        ob_end_clean();
        return $_output;
    }

}