<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
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
 <footer class="footer">
    <div class="footer__wrapper wrapper">
      <div class="footer__logo-container">
        <a href="#"><img src="/wp-content/themes/twentyseventeen/assets/img/logo-svg.svg" alt="logo" class="footer__logo"></a>
      </div>
      <div class="footer__content">
        <div class="footer__top">
          <ul class="footer__list">
            <li class="footer__item footer__item--video"><a class="footer__list-link" href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>"><?php echo ($lang===18)  ? 'Portfolio' :'Съемка' ;?></a></li>
            <li class="footer__item footer__item--event"><a class="footer__list-link" href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=event"><?php echo ($lang===18)  ? 'Event' :'Ивент' ;?></a></li>
            <li class="footer__item footer__item--team"><a class="footer__list-link" href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>#team"><?php echo ($lang===18)  ? 'Team' :'Команда' ;?></a></li>
            <li class="footer__item footer__item--presentation"><a class="footer__list-link" href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=present"><?php echo ($lang===18)  ? 'Presentation' :'Презентация' ;?></a></li>
            <li class="footer__item footer__item--conference"><a class="footer__list-link" href="/portfolio/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>&cat=conf"><?php echo ($lang===18)  ? 'Conference' :'Конференция' ;?></a></li>
            <li class="footer__item footer__item--testinomials"><a class="footer__list-link" href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>#testimonials"><?php echo ($lang===18)  ? 'Testimonials' :'Отзывы' ;?></a></li>
            <li class="footer__item footer__item--phone"><a class="footer__list-link" href="tel:<?=$section_contacts['phone'];?>"><?=$section_contacts['phone'];?></a></li>
          </ul>
          <a class="footer__phone" href="tel:<?=$section_contacts['phone'];?>"><?=$section_contacts['phone'];?></a>
        </div>
        <div class="footer__bottom">
          <div class="footer__bottom-container">
            <a class="footer__bottom-link" href="/policy/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>"><?php echo ($lang===18)  ? 'Privacy Policy' :'Политика приватности' ;?></a>
            <a class="footer__bottom-link" href="#"><?php echo ($lang===18)  ? 'Made by' :'Сделано:' ;?> Design Collaboration</a>
          </div>
          <ul class="footer__social-list">
            <li class="footer__social-item">
              <a class="footer__social-link" href="<?=$section_contacts['insta'];?>">
                <img src="/wp-content/themes/twentyseventeen/assets/img/social-insta.svg" width="30" height="30" alt="Instagram">
              </a>
            </li>
            <li class="footer__social-item">
              <a class="footer__social-link" href="<?=$section_contacts['vk'];?>">
                <img src="/wp-content/themes/twentyseventeen/assets/img/social-vk.svg" width="30" height="30" alt="Vkontakte">
              </a>
            </li>
            <li class="footer__social-item">
              <a class="footer__social-link" href="<?=$section_contacts['fb'];?>">
                <img src="/wp-content/themes/twentyseventeen/assets/img/social-fb.svg" width="30" height="30" alt="Facebook">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <?php if($_COOKIE['cookie'] != true) : ?>
  <section class="cookie">
    <p>Оставаясь на нашем сайте, вы соглашаетесь с использованием файлов cookie. Подробнее в нашей <a href="/policy/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>"><?php echo ($lang===18)  ? 'privacy policy' :'политика конфиденциальности' ;?></a></p>
    <button class="cookie__button"><img src="/wp-content/themes/twentyseventeen/assets/img/close.svg" alt="button"></button>
  </section>
  <?php endif; ?>
  <script src="/wp-content/themes/twentyseventeen/assets/js/vendor.js"></script>
  <script src="/wp-content/themes/twentyseventeen/assets/js/main.js"></script>
<?php wp_footer(); ?>

</body>
</html>
