<?php
    /*
    Template Name: Portfolio
    */

    get_header();

    // if ($_COOKIE['language']) {
    //   $lang = $_COOKIE['language'];
    // } else {
      $lang =  ($_REQUEST['lang']=== 'en') ? $lang = 18 : $lang = 3;
    //   setcookie("language", $lang);
    // }

    if ($lang === 3) $section_one['title'] = 'Главная';

    $section_works['title'] = ($lang === 18) ?'Portfolio' :'Портфолио';

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

  <section class="works port" id="work">
    <div class="works__header-block">
      <h2 class="works__header h2 wow fadeInUp"><?=$section_works['title'];?></h2>
      <div class="works__swiper swiper-container other-links-swiper <?php echo ($lang===18)  ? 'other-links-swiper--en' :'' ;?>">
        <ul class="works__menu other-links swiper-wrapper menu wow fadeInUp">
          <li class="other-links__item swiper-slide"><a href="<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=event"><?php echo ($lang===18)  ? 'Event' :'Ивент' ;?></a></li>
          <li class="other-links__item swiper-slide"><a href="<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=conf"><?php echo ($lang===18)  ? 'Conference' :'Конференция' ;?></a></li>
          <li class="other-links__item swiper-slide"><a href="<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=present"><?php echo ($lang===18)  ? 'Presentation' :'Презентация' ;?></a></li>
          <li class="other-links__item swiper-slide"><a href="<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=vr">VR</a></li>
        </ul>
      </div>
    </div>
    <div class="container">
      <ul class="works__list">
        <?php 
            $arg_work = array('category__and' => array(11));
            if ($_REQUEST['cat'] === 'event') {
              $arg_work = array('category__and' => array(10));
            }
            if ($_REQUEST['cat'] === 'conf') {
              $arg_work = array('category__and' => array(12));
            }
            if ($_REQUEST['cat'] === 'present') {
              $arg_work = array('category__and' => array(13));
            }
            if ($_REQUEST['cat'] === 'vr') {
              $arg_work = array('category__and' => array(14));
            }
            
            $catquery_work = new WP_Query($arg_work);
            while($catquery_work->have_posts()) : $catquery_work->the_post(); ?>
                    <li class="works__item wow fadeInUp works__item--big">
                        <a href="<?php the_field('work__link');?>" data-fancybox='works'><img src="<?php the_field('work__prew_p');?>" alt=""></a>
                    </li>
           <?php endwhile;
            $catquery_work->reset_postdata(); 
          ?>
      </ul>
      <div class="works__button-block">
          <a href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>" class="works__button works__button--back "><img src="/wp-content/themes/esm/assets/img/portfolio-arrow.svg" alt="back"><span><?php echo ($lang===18)  ? 'Back' :'Назад' ;?></span></a>
          <a href="#header" class="works__button works__button--up button"><?php echo ($lang===18)  ? 'Up' :'Вверх' ;?><img src="/wp-content/themes/esm/assets/img/portfolio-arrow.svg" alt="up"></a>
    </div>
    </div>

  </section>

  <section class="contacts" id="contacts">
    <div class="contacts__header-block fadeInUp wow">
      <h2 class="contacts__header h2"><?=$section_contacts['title'];?></h2>
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
        <input type="sumbit" class="contacts__form-btn button" value="<?php echo ($lang===18)  ? 'Send' :'Отправить' ;?>">
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