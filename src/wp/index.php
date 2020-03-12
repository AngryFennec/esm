<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();

    // if ($_COOKIE['language']) {
    //   $lang = $_COOKIE['language'];
    // } else {
      $lang =  ($_REQUEST['lang']=== 'en') ? $lang = 18 : $lang = 3;
    //   setcookie("language", $lang);
    // }
    $section_one['title'] = ($lang === 18) ? 'Main' : 'Главная';

    $arg = array('category__and' => array(4, $lang), 'posts_per_page'=>10);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_works = [];
      $section_works['title'] = get_field('works__title');
      $section_works['button-text'] = get_field('works__button-text');
      $section_works['button-link'] = get_field('works__button-link');
    endwhile;
    wp_reset_postdata(); 

    $arg = array('category__and' => array(5, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_process = [];
      $section_process['title'] = get_field('process__title');
	  $section_process['menu-title'] = ($lang === 3) ? 'Процесс' : 'Process';
      $section_process['button-text'] = get_field('process__button-text');
      $section_process['button-link'] = get_field('process__button-link');
    endwhile;
    wp_reset_postdata(); 

    $arg = array('category__and' => array(6, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_portfolio = [];
      $section_portfolio['title'] = get_field('portfolio__title');
      $section_portfolio['button-text'] = get_field('portfolio__button-text');
      $section_portfolio['button-link'] = get_field('portfolio__button-link');
    endwhile;
    wp_reset_postdata(); 

    $arg = array('category__and' => array(7, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_team = [];
      $section_team['title'] = get_field('team__title');
    endwhile;
    wp_reset_postdata();

    $arg = array('category__and' => array(8, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); 
      $section_test = [];
      $section_test['title'] = get_field('testimonials__title');
      $section_test['button-text'] = get_field('testimonials__button-text');
      $section_test['button-link'] = get_field('testimonials__button-link');
    endwhile;
    wp_reset_postdata(); 

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

  <section class="promo" id="promo" style="overflow-y: hidden;">
    <?php 
    //ru-3
        $arg = array('category__and' => array(2, $lang), 'posts_per_page'=>10,);
        $catquery = new WP_Query($arg);

        while($catquery->have_posts()) : $catquery->the_post(); 
    ?>
        <div class="container">
            <div class="promo__info-block">
                <h2 class="promo__header h2 h2--big fadeInUp wow"><?php the_field('promo__title')?></h2>
                <p class="promo__description fadeInUp wow"><?php the_field('promo__description');?></p>
                <a class="promo__button button fadeInUp wow" href="#" onClick="TalkMe('openTab', 2); return false;"><?php the_field('promo__button');?></a>
                <ul class="promo__social-list social-list fadeInUp wow">
                <li class="social-list__item"><a href="<?=$section_contacts['insta'];?>">
                  <svg class="insta" width="18" height="19" viewBox="0 0 18 19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 5.00781C7.94271 5.00781 7.1875 5.21615 6.48438 5.63281C5.80729 6.02344 5.26042 6.57031 4.84375 7.27344C4.45312 7.95052 4.25781 8.69271 4.25781 9.5C4.25781 10.3073 4.45312 11.0625 4.84375 11.7656C5.26042 12.4427 5.80729 12.9896 6.48438 13.4062C7.1875 13.7969 7.94271 13.9922 8.75 13.9922C9.55729 13.9922 10.2995 13.7969 10.9766 13.4062C11.6797 12.9896 12.2266 12.4427 12.6172 11.7656C13.0339 11.0625 13.2422 10.3073 13.2422 9.5C13.2422 8.69271 13.0339 7.95052 12.6172 7.27344C12.2266 6.57031 11.6797 6.02344 10.9766 5.63281C10.2995 5.21615 9.55729 5.00781 8.75 5.00781ZM8.75 12.4297C7.94271 12.4297 7.2526 12.1432 6.67969 11.5703C6.10677 10.9974 5.82031 10.3073 5.82031 9.5C5.82031 8.69271 6.10677 8.0026 6.67969 7.42969C7.2526 6.85677 7.94271 6.57031 8.75 6.57031C9.55729 6.57031 10.2474 6.85677 10.8203 7.42969C11.3932 8.0026 11.6797 8.69271 11.6797 9.5C11.6797 10.3073 11.3932 10.9974 10.8203 11.5703C10.2474 12.1432 9.55729 12.4297 8.75 12.4297ZM14.4922 4.8125C14.4661 5.09896 14.349 5.34635 14.1406 5.55469C13.9583 5.76302 13.724 5.86719 13.4375 5.86719C13.151 5.86719 12.9036 5.76302 12.6953 5.55469C12.487 5.34635 12.3828 5.09896 12.3828 4.8125C12.3828 4.52604 12.487 4.27865 12.6953 4.07031C12.9036 3.86198 13.151 3.75781 13.4375 3.75781C13.724 3.75781 13.9714 3.86198 14.1797 4.07031C14.388 4.27865 14.4922 4.52604 14.4922 4.8125ZM17.4609 5.86719C17.4089 5.11198 17.2917 4.46094 17.1094 3.91406C16.875 3.26302 16.5104 2.70312 16.0156 2.23438C15.5469 1.73958 14.987 1.375 14.3359 1.14062C13.7891 0.958333 13.138 0.854167 12.3828 0.828125C11.6536 0.776042 10.4427 0.75 8.75 0.75C7.05729 0.75 5.83333 0.776042 5.07812 0.828125C4.34896 0.854167 3.71094 0.958333 3.16406 1.14062C2.51302 1.375 1.9401 1.73958 1.44531 2.23438C0.976562 2.70312 0.625 3.26302 0.390625 3.91406C0.208333 4.46094 0.0911458 5.11198 0.0390625 5.86719C0.0130208 6.59635 0 7.80729 0 9.5C0 11.1927 0.0130208 12.4167 0.0390625 13.1719C0.0911458 13.901 0.208333 14.5391 0.390625 15.0859C0.625 15.737 0.976562 16.3099 1.44531 16.8047C1.9401 17.2734 2.51302 17.612 3.16406 17.8203C3.71094 18.0286 4.34896 18.1458 5.07812 18.1719C5.83333 18.224 7.05729 18.25 8.75 18.25C10.4427 18.25 11.6536 18.224 12.3828 18.1719C13.138 18.1458 13.7891 18.0417 14.3359 17.8594C14.987 17.625 15.5469 17.2734 16.0156 16.8047C16.5104 16.3099 16.875 15.737 17.1094 15.0859C17.2917 14.5391 17.3958 13.901 17.4219 13.1719C17.474 12.4167 17.5 11.1927 17.5 9.5C17.5 7.80729 17.487 6.59635 17.4609 5.86719ZM15.5859 14.6562C15.2734 15.4375 14.7135 15.9974 13.9062 16.3359C13.4896 16.4922 12.7865 16.5964 11.7969 16.6484C11.25 16.6745 10.4427 16.6875 9.375 16.6875H8.125C7.08333 16.6875 6.27604 16.6745 5.70312 16.6484C4.73958 16.5964 4.03646 16.4922 3.59375 16.3359C2.8125 16.0234 2.2526 15.4635 1.91406 14.6562C1.75781 14.2135 1.65365 13.5104 1.60156 12.5469C1.57552 11.974 1.5625 11.1667 1.5625 10.125V8.875C1.5625 7.83333 1.57552 7.02604 1.60156 6.45312C1.65365 5.46354 1.75781 4.76042 1.91406 4.34375C2.22656 3.53646 2.78646 2.97656 3.59375 2.66406C4.03646 2.50781 4.73958 2.40365 5.70312 2.35156C6.27604 2.32552 7.08333 2.3125 8.125 2.3125H9.375C10.4167 2.3125 11.224 2.32552 11.7969 2.35156C12.7865 2.40365 13.4896 2.50781 13.9062 2.66406C14.7135 2.97656 15.2734 3.53646 15.5859 4.34375C15.7422 4.76042 15.8464 5.46354 15.8984 6.45312C15.9245 7 15.9375 7.80729 15.9375 8.875V10.125C15.9375 11.1667 15.9245 11.974 15.8984 12.5469C15.8464 13.5104 15.7422 14.2135 15.5859 14.6562Z" />
                  </svg>
                  </a></li>
                <li class="social-list__item"><a href="<?=$section_contacts['vk'];?>">
                  <svg class="vk" width="18" height="10" viewBox="0 0 18 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.0312 0.6875C17.1562 0.229167 16.9688 0 16.4688 0H14.625C14.25 0 13.9896 0.177083 13.8438 0.53125L13.5312 1.15625C13.2812 1.69792 13.0208 2.19792 12.75 2.65625C12.3542 3.30208 11.9583 3.84375 11.5625 4.28125C11.3542 4.51042 11.1875 4.66667 11.0625 4.75C10.9375 4.8125 10.8229 4.84375 10.7188 4.84375C10.6354 4.84375 10.5625 4.80208 10.5 4.71875C10.4375 4.63542 10.4062 4.5 10.4062 4.3125V0.6875C10.4062 0.4375 10.3646 0.260417 10.2812 0.15625C10.2188 0.0520833 10.0938 0 9.90625 0H7C6.875 0 6.76042 0.0416667 6.65625 0.125C6.57292 0.208333 6.53125 0.3125 6.53125 0.4375C6.53125 0.541667 6.60417 0.6875 6.75 0.875C6.89583 1.04167 7 1.19792 7.0625 1.34375C7.1875 1.59375 7.26042 1.88542 7.28125 2.21875V4.9375C7.28125 5.20833 7.25 5.39583 7.1875 5.5C7.14583 5.58333 7.0625 5.625 6.9375 5.625C6.72917 5.625 6.4375 5.39583 6.0625 4.9375C5.6875 4.47917 5.3125 3.88542 4.9375 3.15625C4.52083 2.36458 4.16667 1.55208 3.875 0.71875C3.79167 0.447917 3.6875 0.260417 3.5625 0.15625C3.45833 0.0520833 3.29167 0 3.0625 0H1.21875C0.802083 0 0.59375 0.177083 0.59375 0.53125C0.59375 0.739583 0.666667 1.10417 0.8125 1.625C1.04167 2.27083 1.34375 2.96875 1.71875 3.71875C2.19792 4.69792 2.79167 5.66667 3.5 6.625C4.25 7.70833 5.125 8.54167 6.125 9.125C7.125 9.70833 8.11458 10 9.09375 10C9.65625 10 10.0312 9.9375 10.2188 9.8125C10.3646 9.70833 10.4271 9.53125 10.4062 9.28125V8.46875C10.4062 7.96875 10.4167 7.64583 10.4375 7.5C10.4375 7.29167 10.4688 7.15625 10.5312 7.09375C10.6146 7.03125 10.7396 7 10.9062 7C11.3021 7 11.9167 7.39583 12.75 8.1875C13 8.4375 13.2812 8.75 13.5938 9.125C13.9271 9.47917 14.1562 9.69792 14.2812 9.78125C14.4688 9.92708 14.6771 10 14.9062 10H16.75C17 10 17.1771 9.9375 17.2812 9.8125C17.4062 9.66667 17.4375 9.46875 17.375 9.21875C17.1875 8.63542 16.3438 7.57292 14.8438 6.03125L14.5625 5.71875C14.4375 5.57292 14.375 5.44792 14.375 5.34375C14.375 5.23958 14.4375 5.09375 14.5625 4.90625C14.5833 4.88542 14.7812 4.60417 15.1562 4.0625C15.5938 3.375 15.9688 2.77083 16.2812 2.25C16.7188 1.52083 16.9688 1 17.0312 0.6875Z" />
                  </svg>
                </a></li>
                <li class="social-list__item"><a href="<?=$section_contacts['fb'];?>">
                  <svg class="fb" width="8" height="16" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.25586 15.875V9.16602H0V6.5H2.25586V4.39062C2.25586 3.27734 2.56836 2.41797 3.19336 1.8125C3.81836 1.1875 4.64844 0.875 5.68359 0.875C6.52344 0.875 7.20703 0.914062 7.73438 0.992188V3.36523H6.32812C5.80078 3.36523 5.43945 3.48242 5.24414 3.7168C5.08789 3.91211 5.00977 4.22461 5.00977 4.6543V6.5H7.5L7.14844 9.16602H5.00977V15.875H2.25586Z" />
                  </svg>
                </a></li>
                 </ul>
            </div>
            <div class="promo__video-block">
                <div class="promo__preview ">
                    <img src="<?php the_field('event__preview');?>" width="850" height="auto" alt="video-preview" class="promo__video-skin">
                </div>
        
                <div class="promo__play-block fadeInUp wow">
                    <a href="<?php the_field('event__video');?>" data-fancybox = "promo">
                    <img src="/wp-content/themes/twentyseventeen/assets/img/play.svg" alt="play video button">
                    </a>
                    <p class="promo__video-action"><?php $content = ($lang === 18) ?'Watch the video' : 'Смотреть видео'; echo $content;?></p>
                </div>

            </div>
            <ul class="promo__video-categories fadeInUp wow">
                <li class="promo__video-category promo__video-category--active promo__video-category--event" data-link = "<?php the_field('event__video');?>" data-img = "<?php the_field('event__preview');?>"><a class="" href="#"><?php $content = ($lang === 18) ? 'Events' : 'Ивенты'; echo $content;?></a></li>
                <li class="promo__video-category promo__video-category--conf" data-link = "<?php the_field('conf__video');?>" data-img = "<?php the_field('conf__preview');?>"><a href="#"><?php $content = ($lang === 18) ? 'Conferences' : 'Конференции'; echo $content;?></a></li>
                <li class="promo__video-category promo__video-category--present" data-link = "<?php the_field('present__video');?>" data-img = "<?php the_field('present__preview');?>"><a href="#"><?php $content = ($lang === 18) ? 'Presentations' : 'Презентации'; echo $content;?></a></li>
                <li class="promo__video-category promo__video-category--vr" data-link = "<?php the_field('vr__video');?>" data-img = "<?php the_field('vr__preview');?>"><a href="#">VR</a></li>
            </ul>
        </div>
    <?php endwhile;
        wp_reset_postdata(); 
    ?>
  </section>

  <section class="works" id="work">
    <div class="works__header-block">
      <h2 class="works__header h2 wow fadeInUp"><?=$section_works['title'];?></h2>
      <div class="works__swiper swiper-container other-links-swiper  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="works__menu other-links  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?> swiper-wrapper menu wow fadeInUp">
          <li class="other-links__item swiper-slide"><a href="#process"><?=$section_process['menu-title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#portfolio"><?=$section_portfolio['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#team"><?=$section_team['title'];?></a></li>
        </ul>
      </div>
    </div>
    <div class="container">
      <ul class="works__list  wow fadeInUp">
        <?php 
        //ru-3
            $arg_work = array('category__and' => array(11), 'posts_per_page'=> 4);
            $catquery_work = new WP_Query($arg_work);
            while($catquery_work->have_posts()) : $catquery_work->the_post(); ?>
                    <li class="works__item works__item--big">
                        <a href="<?php the_field('work__link');?>" data-fancybox='works'><img src="<?php the_field('work__prew_p');?>" alt="превью"></a>
                    </li>
            <?php endwhile;
            $catquery_work->reset_postdata(); 
          ?>
      </ul>
    </div>
    <a href="<?=$section_works['button-link'];?><?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>" class="works__button button wow fadeInUp"><?=$section_works['button-text'];?></a>
  </section>

  <section class="process" id="process">
    <div class="process__header-block">
      <h2 class="process__header h2 wow fadeInUp"><?=$section_process['title'];?></h2>
      <div class="process__swiper other-links-swiper swiper-container  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="process__menu other-links swiper-wrapper  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?> menu wow fadeInUp">
          <li class="other-links__item swiper-slide"><a href="#portfolio"><?=$section_portfolio['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#team"><?=$section_team['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#testimonials"><?=$section_test['title'];?></a></li>
        </ul>
      </div>
    </div>
    <ul class="process__list">
      <?php 
        //ru-3
          $arg_work = array('category__and' => array(15, $lang), 'posts_per_page'=>10);
          $catquery_work = new WP_Query($arg_work);
          while($catquery_work->have_posts()) : $catquery_work->the_post(); 
      ?>
            <li class="process__stage">
              <div class="process__stage-card stage-card ">
                <div class="stage-card__number-block">
                  <div class="stage-card__name "><?php the_field('stage__title');?></div>
                </div>
                <div class="stage-card__description-block">
                  <div class="stage-card__name stage-card__name--mobile"><?php the_field('stage__title');?></div>
                  <p class="stage-card__title fadeInUp wow"><?php the_field('stage__caption');?></p>
                  <p class='fadeInUp wow'><?php the_field('stage__description');?></p>
                  <img src="<?php the_field('stage__img');?>" alt="background">
                </div>
              </div>
            </li>
      <?php endwhile;
          $catquery_work->reset_postdata(); 
      ?>
    </ul>
    <a class="process__button button" href="#" onClick="TalkMe('openTab', 2); return false;"><?=$section_process['button-text'];?></a>
  </section>

  <section class="portfolio" id="portfolio">
    <div class="portfolio__header-block">
      <h2 class="portfolio__header h2 wow fadeInUp"><?=$section_portfolio['title'];?></h2>
      <div class="portfolio__swiper other-links-swiper swiper-container  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="portfolio__menu other-links swiper-wrapper menu wow fadeInUp  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?>">
          <li class="other-links__item swiper-slide"><a href="#team"><?=$section_team['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#testimonials"><?=$section_test['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#contacts"><?=$section_contacts['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#header"><?=$section_one['title'];?></a></li>
        </ul>
      </div>
    </div>
    <ul class="portfolio__list">
      <?php 
        //ru-3
          $arg_work = array('category__and' => array(16, $lang), 'posts_per_page'=>10);
          $catquery_work = new WP_Query($arg_work);
          while($catquery_work->have_posts()) : $catquery_work->the_post(); 
      ?>
            <li class="portfolio__item">
              <div class="portfolio__card ">
                <img src="<?php the_field('card__img');?>" alt="image" class="portfolio-card__image">
              </div>
              <div class="portfolio-card__info">
                 <h3 class="portfolio-card__header wow fadeInUp"><?php the_field('card__title');?></h3>
                <p class="portfolio-card__description  wow fadeInUp"><?php the_field('card__description');?></p>
                <a class="portfolio-card__link wow fadeInUp" href="<?php the_field('card__button-link');?><?php echo ($lang===18)  ? '&lang=en' :'&lang=ru' ;?>"><?php the_field('card__button-text');?></a>
              </div>
            </li>
      <?php endwhile;
          $catquery_work->reset_postdata(); 
      ?>
    </ul>
    <a class="portfolio__button button wow fadeInUp" href="#" onClick="TalkMe('openTab', 2); return false;"><?=$section_portfolio['button-text'];?></a>
  </section>

  <section class="team" id="team">
    <div class="team__header-block fadeInUp wow">
      <h2 class="team__header h2"><?=$section_team['title'];?></h2>
      <div class="team__swiper other-links-swiper swiper-container  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="team__menu other-links swiper-wrapper menu  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?>">
          <li class="other-links__item swiper-slide"><a href="#testimonials"><?=$section_test['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#contacts"><?=$section_contacts['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#header"><?=$section_one['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#work"><?=$section_works['title'];?></a></li>
        </ul>
      </div>
    </div>
    <ul class="team__roles">
      <li class="team__roles-item"><a class="team__roles-link team__roles-link--active" href="#">Видеограф</a></li>
      <li class="team__roles-item"><a class="team__roles-link" href="#">Технический директор</a></li>
      <li class="team__roles-item"><a class="team__roles-link" href="#">Сценарист</a></li>
      <li class="team__roles-item"><a class="team__roles-link" href="#">Исполнительный продюсер</a></li>
      <li class="team__roles-item"><a class="team__roles-link" href="#">Видеограф</a></li>
    </ul>

    <section class="team__content fadeInUp wow">

      <ul class="team__list">
      <?php 
            $arg_work = array('category__and' => array(19, $lang), 'posts_per_page'=>30);
            $catquery_work = new WP_Query($arg_work);
            $i = 0;
            while($catquery_work->have_posts()) : $catquery_work->the_post(); 
      ?>
      <?php if ($i === 0) :?>
        <li class="team__list-item team__list-item--maxim">
          <div class="team__list-content fadeIn wow" data-wow-delay="1.5s" data-wow-duration="1s">
            <div class="team__list-header">
              <h3 class="team__list-name"><?php the_field('team__name');?></h3>
              <div class="team__list-control">
                <button class="team__list-btn team__list-btn--prev"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8984 1L1.99894 10.8995L11.8984 20.799" stroke="white" stroke-width="2" />
                </svg>
              </button>
                <button class="team__list-btn team__list-btn--next"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.89844 21L19.7979 11.1005L9.89844 1.20101" stroke="white" stroke-width="2" />
                </svg>
              </button>
              </div>
            </div>
            <b class="team__list-position"><?php the_field('team__pers');?></b>
            <p class="team__list-text"><?php the_field('team__content');?></p>
            <ul class="team__list-social">
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__insta');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__vk');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__fb');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-fb.svg" width="30" height="30" alt="Facebook">
                </a>
              </li>
            </ul>
          </div>
          <div class="team__list-img fadeIn wow" data-wow-delay="0.3s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-maxim.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/Max-1.png" alt="Максим" width="1440" height="879">
            </picture>
          </div>
          <div class="team__list-cap fadeIn wow" data-wow-delay="0.7s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-maxim.png" media="(max-width: 1023px)">
              <img id = 'team-1' src="/wp-content/themes/twentyseventeen/assets/img/Max-2.png" alt="Максим" width="1440" height="879">
            </picture>
          </div>
        </li>
        <?php endif;?>
		    <?php if ($i === 1) :?>
        <li class="team__list-item team__list-item--vitaly">
            <div class="team__list-content fadeIn wow" data-wow-delay="1.5s" data-wow-duration="1s">
            <div class="team__list-header">
              <h3 class="team__list-name"><?php the_field('team__name');?></h3>
              <div class="team__list-control">
                <button class="team__list-btn team__list-btn--prev"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8984 1L1.99894 10.8995L11.8984 20.799" stroke="white" stroke-width="2" />
                </svg>
              </button>
                <button class="team__list-btn team__list-btn--next"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.89844 21L19.7979 11.1005L9.89844 1.20101" stroke="white" stroke-width="2" />
                </svg>
              </button>
              </div>
            </div>
            <b class="team__list-position"><?php the_field('team__pers');?></b>
            <p class="team__list-text"><?php the_field('team__content');?></p>
            <ul class="team__list-social">
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__insta');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__vk');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__fb');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-fb.svg" width="30" height="30" alt="Facebook">
                </a>
              </li>
            </ul>
          </div>

          <div class="team__list-img fadeIn wow" data-wow-delay="0.3s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-vitaly.png" media="(max-width: 1023px)">
              <img id = 'team-2' src="/wp-content/themes/twentyseventeen/assets/img/vitaly-1.png" alt="Виталий" width="1440" height="879">
            </picture>
          </div>
          <div class="team__list-cap fadeIn wow" data-wow-delay="0.7s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-vitaly.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/vitaly-2.png" alt="Виталий" width="1440" height="879">
            </picture>
          </div>
        </li>
        <?php endif;?>
		    <?php if ($i === 2) :?>
        <li class="team__list-item team__list-item--gleb">
            <div class="team__list-content fadeIn wow" data-wow-delay="1.5s" data-wow-duration="1s">
            <div class="team__list-header">
              <h3 class="team__list-name"><?php the_field('team__name');?></h3>
              <div class="team__list-control">
                <button class="team__list-btn team__list-btn--prev"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8984 1L1.99894 10.8995L11.8984 20.799" stroke="white" stroke-width="2" />
                </svg>
              </button>
                <button class="team__list-btn team__list-btn--next"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.89844 21L19.7979 11.1005L9.89844 1.20101" stroke="white" stroke-width="2" />
                </svg>
              </button>
              </div>
            </div>
            <b class="team__list-position"><?php the_field('team__pers');?></b>
            <p class="team__list-text"><?php the_field('team__content');?></p>
            <ul class="team__list-social">
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__insta');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__vk');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__fb');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-fb.svg" width="30" height="30" alt="Facebook">
                </a>
              </li>
            </ul>
          </div>

          <div class="team__list-img fadeIn wow" data-wow-delay="0.3s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-gleb.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/gleb-1.png" alt="Глеб" width="1440" height="879">
            </picture>
          </div>
          <div class="team__list-cap fadeIn wow" data-wow-delay="0.7s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-gleb.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/gleb-2.png" alt="Глеб" width="1440" height="879">
            </picture>
          </div>
        </li>
        <?php endif;?>
		    <?php if ($i === 3) :?>
        <li class="team__list-item team__list-item--julia">
          <div class="team__list-content fadeIn wow" data-wow-delay="1.5s" data-wow-duration="1s">
            <div class="team__list-header">
              <h3 class="team__list-name"><?php the_field('team__name');?></h3>
              <div class="team__list-control">
                <button class="team__list-btn team__list-btn--prev"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8984 1L1.99894 10.8995L11.8984 20.799" stroke="white" stroke-width="2" />
                </svg>
              </button>
                <button class="team__list-btn team__list-btn--next"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.89844 21L19.7979 11.1005L9.89844 1.20101" stroke="white" stroke-width="2" />
                </svg>
              </button>
              </div>
            </div>
            <b class="team__list-position"><?php the_field('team__pers');?></b>
            <p class="team__list-text"><?php the_field('team__content');?></p>
            <ul class="team__list-social">
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__insta');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__vk');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__fb');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-fb.svg" width="30" height="30" alt="Facebook">
                </a>
              </li>
            </ul>
          </div>

          <div class="team__list-img fadeIn wow" data-wow-delay="0.3s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-julia.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/julia-1.png" alt="Юлия" width="1440" height="879">
            </picture>
          </div>
          <div class="team__list-cap fadeIn wow" data-wow-delay="0.7s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-maxim.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/julia-2.png" alt="Юлия" width="1440" height="879">
            </picture>
          </div>
        </li>
        <?php endif;?>
		    <?php if ($i === 4) :?>
        <li class="team__list-item team__list-item--denis">
          <div class="team__list-content fadeIn wow" data-wow-delay="1.5s" data-wow-duration="1s">
            <div class="team__list-header">
              <h3 class="team__list-name"><?php the_field('team__name');?></h3>
              <div class="team__list-control">
                <button class="team__list-btn team__list-btn--prev"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8984 1L1.99894 10.8995L11.8984 20.799" stroke="white" stroke-width="2" />
                </svg>
              </button>
                <button class="team__list-btn team__list-btn--next"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.89844 21L19.7979 11.1005L9.89844 1.20101" stroke="white" stroke-width="2" />
                </svg>
              </button>
              </div>
            </div>
            <b class="team__list-position"><?php the_field('team__pers');?></b>
            <p class="team__list-text"><?php the_field('team__content');?></p>
            <ul class="team__list-social">
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__insta');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
                </a>
              </li>
              <li class="team__social-item">
                <a class="team__social-link" href="<?php the_field('team__vk');?>">
                  <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
                </a>
              </li>
            </ul>
          </div>

          <div class="team__list-img fadeIn wow" data-wow-delay="0.3s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-denis.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/denis-1.png" alt="Денис" width="1440" height="879">
            </picture>
          </div>
          <div class="team__list-cap fadeIn wow" data-wow-delay="0.7s" data-wow-duration="1s">
            <picture>
              <source srcset="/wp-content/themes/twentyseventeen/assets/img/mob-denis.png" media="(max-width: 1023px)">
              <img src="/wp-content/themes/twentyseventeen/assets/img/denis-2.png" alt="Денис" width="1440" height="879">
            </picture>          </div>
        </li>
        <?php endif;?>
        <?php 
          $i++;
          endwhile;
              $catquery_work->reset_postdata(); 
          ?>
      </ul>
    </section>
  </section>




  <section class="testimonials " id="testimonials">
    <div class="testimonials__header-block fadeInUp wow">
      <h2 class="testimonials__header h2"><?=$section_test['title'];?></h2>
      <div class="testimonials__swiper other-links-swiper swiper-container  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="testimonials__menu other-links swiper-wrapper menu  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?>">
          <li class="other-links__item swiper-slide"><a href="#contacts"><?=$section_contacts['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#header"><?=$section_one['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#work"><?=$section_works['title'];?></a></li>
        </ul>
      </div>
    </div>
    <div class="testimonials__swiper-main swiper-container fadeInUp wow">
      <div class="swiper-wrapper">
        <?php 
            $arg_work = array('category__and' => array(17, $lang), 'posts_per_page'=>30);
            $catquery_work = new WP_Query($arg_work);
            while($catquery_work->have_posts()) : $catquery_work->the_post(); 
        ?>
            <div class="testimonials__slide swiper-slide">
            <p class="testimonials__slide-text"><?php the_field('test__content');?></p>
            <div class="testimonials__slide-bottom">
              <img src="<?php the_field('test__ava');?>" alt="logo" width="60" height="60">
              <div class="testimonials__slide-info">
                <b class="testimonials__slide-who"><?php the_field('test__name');?></b>
                <p class="testimonials__slide-where"><?php the_field('test__firm');?></p>
                <p class="testimonials__slide-position">*<?php the_field('test__pers');?>* </p>
              </div>
            </div>
          </div>
        <?php endwhile;
            $catquery_work->reset_postdata(); 
        ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="testimonials__pagination">
      <div class="testimonials__btn testimonials__btn--next swiper-button-next fadeInUp wow"></div>
        <a href="#" onClick="TalkMe('openReviewsTab'); return false;" class="testimonials__leave-btn button fadeInUp wow"><?=$section_test['button-text'];?></a>
      <div class="testimonials__btn testimonials__btn--prev swiper-button-prev fadeInUp wow"></div>
      </div>
    </div>
  </section>

  <section class="contacts" id="contacts">
    <div class="contacts__header-block fadeInUp wow">
      <h2 class="contacts__header h2"><?=$section_contacts['title'];?></h2>
      <div class="contacts__swiper other-links-swiper swiper-container  <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="contacts__menu other-links swiper-wrapper menu  <?php echo ($lang===18)  ? 'other-links--en' :'' ;?>">
          <li class="other-links__item swiper-slide"><a href="#header"><?=$section_one['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#work"><?=$section_works['title'];?></a></li>
          <li class="other-links__item swiper-slide"><a href="#process"><?=$section_process['menu-title'];?></a></li>
        </ul>
      </div>
    </div>
    <div class="contacts__content fadeInUp wow">
    <div class="contacts__map"></div>
    <div class="contacts__form">
      <form>
        <label class="contacts__form-label" for="name"><?php echo ($lang===18)  ? 'Name' :'Имя' ;?></label>
        <input class="contacts__form-input" id="name" name="name" placeholder="<?php echo ($lang===18)  ? 'Enter your name' :'Введите ваше имя' ;?>">
        <label class="contacts__form-label" for="phone"><?php echo ($lang===18)  ? 'Phone number' :'Телефон' ;?></label>
        <input class="contacts__form-input" id="phone" name="phone" placeholder="<?php echo ($lang===18)  ? 'Enter your phone number' :'Введите ваш номер телефона' ;?>">
        <label class="contacts__form-label" for="message"><?php echo ($lang===18)  ? 'Message' :'Сообщение' ;?></label>
        <input class="contacts__form-input" id="message" name="message" placeholder="<?php echo ($lang===18)  ? 'Enter your message' :'Введите ваше сообщение' ;?>">
        <button type="sumbit" class="contacts__form-btn button"><?php echo ($lang===18)  ? 'Send' :'Отправить' ;?></button>
        <p class="contacts__form-agree"><?php echo ($lang===18)  ? '* I agree to the processing of personal data' :'*Согласен на обработку персональных данных' ;?></p>
      </form>
    </div>
    <div class="contacts__label">
      <p>
      <?=$section_contacts['adress'];?> <?=$section_contacts['phone'];?> <?=$section_contacts['email'];?>
      </p>
    </div>
  </div>
  </section>

<?php get_footer(); ?>
