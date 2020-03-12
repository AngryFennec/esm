<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php
	$lang =  ($_REQUEST['lang']=== 'en') ? $lang = 18 : $lang = 3;

    $arg = array('category__and' => array(9, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_contacts = [];
      $section_contacts['title'] = get_field('contact__title');
      $section_contacts['adress'] = get_field('contact__adress');
      $section_contacts['phone'] = get_field('contact__phone');
      $section_contacts['email'] = get_field('contact__mail');
      $section_contacts['vk'] = get_field('contact__vk');
      $section_contacts['fb'] = get_field('contact__fb');
      $section_contacts['insta'] = get_field('contact__insta');
    endwhile;
	wp_reset_postdata(); 
?>
<!DOCTYPE html>
<html lang="<?php echo ($lang===18)  ? 'en' :'ru';?>">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ESM</title>
		<link rel="shortcut icon" href="/wp-content/themes/twentyseventeen/assets/img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="/wp-content/themes/twentyseventeen/assets/css/style.min.css">
		<?php wp_head(); ?>
		<!-- Begin Talk-Me {literal} -->
<?php if ($lang === 18) :?>
	<script>
		window.TalkMeSetup = {
			language: "en",
		};
	</script>
<?php else : ?>
	<script>
		window.TalkMeSetup = {
			language: "ru",
		};
	</script>
<?php endif;?>
	<script type='text/javascript'>
		(function(d, w, m) {
			window.supportAPIMethod = m;
			var s = d.createElement('script');
			s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
			s.async = true;
			var id = '860709c258227fb7d6f193290b67e02e';
			s.src = 'https://lcab.talk-me.ru/support/support.js?h='+id;
			var sc = d.getElementsByTagName('script')[0];
			w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
			if (sc) sc.parentNode.insertBefore(s, sc); 
			else d.documentElement.firstChild.appendChild(s);
		})(document, window, 'TalkMe');
	</script>
	<!-- {/literal} End Talk-Me -->
	</head>

<body class="page-body <?php if ($pagename === 'portfolio' || $pagename === 'policy') echo 'portfolio-page';?>">
	<h1 class="visually-hidden">ESM</h1>
	<header class="header" id="header">
		<nav class="header__navigation">
		<div class="header__logo-block">
			<a href="/index.php"><img src="/wp-content/themes/twentyseventeen/assets/img/logo.svg" alt="logo" class="header__logo"></a>
		</div>
		<ul class="header__menu menu">
			<li class="header__menu-item"><a href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>"><?php echo ($lang===18)  ? 'Portfolio' :'Работы' ;?></a></li>
			<li class="header__menu-item"><a href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=vr">VR</a></li>
			<li class="header__menu-item"><a href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>#team"><?php echo ($lang===18)  ? 'Team' :'Команда' ;?></a></li>
			<li class="header__menu-item"><a href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>#testimonials"><?php echo ($lang===18)  ? 'Testimonials' :'Отзывы' ;?></a></li>
		</ul>
		<ul class="header__contacts">
			<li class="header__contacts-item"><a href="tel:<?=$section_contacts['phone'];?>"><?=$section_contacts['phone'];?></a></li>
		</ul>
		<ul class="header__lang-list">
			<li class="header__lang-item <?php echo ($lang===18)  ? '' :'header__lang-item--active' ;?>"><a href="?lang=ru">RU</a></li>
			<li class="header__lang-item <?php echo ($lang===18)  ? 'header__lang-item--active' :'' ;?>"><a href="?lang=en">EN</a></li>
		</ul>
		</nav>
	</header>

