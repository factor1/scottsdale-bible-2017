<?php

$f1 = str_replace("\\","/",realpath(__DIR__));
$lib = str_replace("\\","/",realpath($f1."/../"));

require_once($f1."/CustomPostType.php");
require_once($f1."/Taxonomy.php");
require_once($f1."/MetaBox.php");
require_once($f1."/MegaMenuWalker.php");
require_once($f1."/FooterMenuWalker.php");
require_once($f1."/shortcodes/lib/ShortcodeMaker.php");

require_once($lib."/register-post-types.php");
require_once($lib."/register-field-groups.php");
require_once($lib."/register-acf-filters.php");
require_once($lib."/register-nav-menus.php");
require_once($lib."/common-functions.php");

