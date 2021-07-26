<?php

require_once 'functions/config.php';


function generateMenu() {

global $conn;

$items = array(
  'home'  => array('text'=>'Home',  'url'=>'index.php')
); 

if(!isset($_SESSION['user'])){
	$items['register'] = array('text'=>'Register', 'url'=>'register.php');
}

$items['about'] = array('text'=>'About', 'url'=>'about.php');

$html = "<div id='nav'>\n";
  foreach($items as $key => $item) {
    $selected = (isset($GLOBALS['page'])) && $GLOBALS['page'] == $key  ? 'active' : null; 
    $html .= "<a href='{$item['url']}' class='{$selected} hvr-pop'>{$item['text']}</a>\n";
  }

if(isset($_SESSION['user'])){
	unset($items);
	$user_id = $_SESSION['user'];
	 $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE id = '$user_id'"));
	$html .= "<a href='users/logout.php' class='hvr-pop logout'>Logout</a>";
	$html .= "<a href='dashboard.php' class='hvr-pop user'>Howdy, " . $user['username'] . "</a>";
}

$html .= "</div>\n";
return $html;

}

