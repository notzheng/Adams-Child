<?php

//</script><script src="/wp-content/themes/adams-child/static/dotgood.js"></script><script>
function child_script() {

    wp_enqueue_script(
        'dotGood-new',
        get_bloginfo("stylesheet_directory"). "/static/dotGood.js",  
        array(),
        THEME_DB_VERSION, 
        true
    );
        // $script_url = get_bloginfo("stylesheet_directory"). "/static/script.js?".THEME_DB_VERSION;
        // echo "<script src=\" $script_url \"></script>";
}

// add_action( 'wp_footer', 'child_script');
add_action( 'wp_enqueue_scripts', 'child_script',100);



function cancelDotGood(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    if ($_POST["um_action"] == 'topTop'){
        $specs_raters = get_post_meta($id,'dotGood',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('dotGood_'.$id,null,$expire,'/',$domain,false);
        if (!$specs_raters || !is_numeric($specs_raters)) update_post_meta($id, 'dotGood', 0);
        else update_post_meta($id, 'dotGood', ($specs_raters - 1));
        echo get_post_meta($id,'dotGood',true);
    }
    die;
}
add_action('wp_ajax_nopriv_cancelDotGood', 'cancelDotGood');
add_action('wp_ajax_cancelDotGood', 'cancelDotGood');



?>