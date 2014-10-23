<?php

Namespace factor1;

class MetaBox {

    public static function single_button($label,$post_type,$taxonomy)
    {
        echo    "<a href=\"".admin_url("edit-tags.php?post_type=".$post_type."&taxonomy=".$taxonomy)."\" class=\"button button-primary\">".
                        htmlentities($label).
                    "</a>";
    }

}
