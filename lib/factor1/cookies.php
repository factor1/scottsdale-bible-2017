<?php
define("CAMPUS_COOKIE", "sb_campus");
define("CAMPUS_COOKIE_EXPIRATION", (60*60*24*30)); // Seconds Added to Current Time

/* Add Clear Cookie to Admin Menu */
add_action("admin_bar_menu", function ($wp_admin_bar) {
  $wp_admin_bar->add_node([
    'id' => THEME_PREFIX.'_clear_campus',
    'title' => 'Clear Campus Cookie',
    'href' => getRequestURI(false).(($q=getRequestURIQuery())?$q."&":"?")."clear_campus"
  ]);
}, 999);

// clear the cookie
if (!function_exists("sb_clear_campus_cookie")) {
  function sb_clear_campus_cookie() {
    $_COOKIE[CAMPUS_COOKIE] = null;
    setcookie(CAMPUS_COOKIE, "0", time()-CAMPUS_COOKIE_EXPIRATION, "/");
    add_action("admin_notices", function () {
      echo    "<div class=\"updated\">".
                  "<p>Campus cookie has been cleared!</p>".
              "</div>";
    });
  }
}

/**
 * Check for cookie and localize variable for JS usage
**/
function cookie_check() {
  $cookieData = array('has_location_cookie' => isset($_COOKIE['sb_campus']) ? true : false);

  wp_localize_script('prelude-js', 'cookieData', $cookieData);
}

add_action('wp_enqueue_scripts', 'cookie_check', 9999);

/**
 * Update / Add Cookies
**/
function update_cookie() {
  if( is_page_template('set-campus.php') ) {
    if( isset($_GET['campus']) ) {
      setcookie('sb_campus', $_GET['campus'], time()+(60*60*24*30), '/');
      $campus_url = get_permalink($_GET['campus']);
      header('Location: '.$campus_url);
    }
  }
}
add_action( 'wp', 'update_cookie', 999);

function sb_campus_cookie_check() {
  if( isset($_COOKIE['sb_campus']) ){
    header("Location: ".get_permalink($_COOKIE['sb_campus']));
    header("Status: 302");
    exit;
  } else {
    return;
  }
}
