<?php 
$h = date('G'); //set variable $h to the hour of the day 
$d = date('w'); //set variable $d to the day of the week. 
//G is the date key for hours in 24 format (not 12), with no leading 0s, like 02. 
// Adjust 2 hour offset for CST below. 
$h = $h-5; 

// MONDAY SCHEDULE 
if ($d == 1 && $h >= 9 && $h < 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png"; 
else if ($d == 1 && $h >= 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 

// TUESDAY SCHEDULE 
if ($d == 2 && $h >= 9 && $h < 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png"; 
else if ($d == 2 && $h >= 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 

// WEDNESDAY SCHEDULE 
if ($d == 3 && $h >= 9 && $h < 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png"; 
else if ($d == 3 && $h >= 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png";  

// THURSDAY SCHEDULE 
if ($d == 4 && $h >= 9 && $h < 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png"; 
else if ($d == 4 && $h >= 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 

// FRIDAY SCHEDULE 
if ($d == 5 && $h >= 9 && $h < 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png"; 
else if ($d == 5 && $h >= 11) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 

// SATURDAY SCHEDULE 
if ($d == 6) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 

// SUNDAY SCHEDULE 
if ($d == 0 && $h >= 14 && $h < 17) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/WISNo.png"; 
else if ($d == 0 && $h >= 17) $liveindicator = "http://www.danconry.com/wp-content/uploads/2015/04/offline.png"; 


// Correct Link to iHeart
if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png") $iheart = "http://www.iheart.com/live/wiba-am-2661/?autoplay=true&pname=1170&campid=play_bar&cid=%2Fcc-common%2Fradio_app%2F&callletters=wiba-am";
else if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WISNo.png") $iheart = "http://www.iheart.com/live/1130-wisn-4245/?autoplay=true&pname=1176&campid=play_bar&cid=%2Fcc-common%2Fradio_app%2F";
else $iheart = "#";

// If online display online indicator
if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png") $onlineind = "http://www.danconry.com/wp-content/uploads/2015/04/onlinenow_small.gif";
else if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WISNo.png") $onlineind = "http://www.danconry.com/wp-content/uploads/2015/04/onlinenow_small.gif";
else $onlineind = "";

// WIBA 1310 or WISN 1130?
if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WIBAo.png") $station = "LIVE NOW - 1310 WIBA";
else if ($liveindicator == "http://www.danconry.com/wp-content/uploads/2015/04/WISNo.png") $station = "LIVE NOW - 1130 WISN";
else $station = "Listen to WIBA 1310 from 9 - 11am on Weekdays, and WISN 1130 on Sunday from 2-5pm!";
?>
<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<title>Dan Conry Show | <?php echo $station; ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	
	<div id="header">
		<div id="logo">
				<?php 
				$options = get_option('themezee_options');
				if ( isset($options['themeZee_general_logo']) and $options['themeZee_general_logo'] <> "" ) { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/"><h1><?php bloginfo('name'); ?></h1></a><img src='<?php echo $onlineind; ?>'> 
					<h2 class="tagline"><?php echo $station; ?></h2>
				<?php } ?>
		</div>
		<div id="navi">
			<?php 
			// Get Navigation out of Theme Options
				wp_nav_menu(array('theme_location' => 'main_navi', 'container' => false, 'menu_id' => 'nav', 'echo' => true, 'fallback_cb' => 'themezee_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
		</div>
	</div>
	<div class="clear"></div>
	
	<div id="custom_header">
		<?php if(is_page() && has_post_thumbnail()) :
				the_post_thumbnail(array(940,140));
			elseif( get_header_image() != '' ) : ?>
				<img src="<?php echo get_header_image(); ?>" />
		<?php endif; ?>
<!-- Display iHeartRadio Banner -->
	<a href="<?php echo $iheart; ?>" target="_blank"><img src="<?php echo $liveindicator; ?>" width="99%"></a>
<div>

        </div> 
	</div>
	<div id="wrap">
			
	
	
