<?php  

require_once 'functions/config.php';

function requireToVar($file){
    ob_start();
    require($file);
    return ob_get_clean();
}
$all_posts=requireToVar('posts/posts.php');


$GLOBALS['page'] = 'home';

$title = "Choose post to edit";

$banner = true;

require ('posts/posts.php');

$content = '$all_posts';

require_once 'app.php';

