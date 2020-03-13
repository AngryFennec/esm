<?php
    /*
    Template Name: Privacy
    */

    get_header();

    $lang =  ($_REQUEST['lang']=== 'en') ? $lang = 18 : $lang = 3;


    $arg = array('category__and' => array(26, $lang), 'posts_per_page'=>1);
    $catquery = new WP_Query($arg);
    while($catquery->have_posts()) : $catquery->the_post(); ?>
      <section class="privacy">
        <h2 class="privacy__title"><?php the_title();?></h2>
        <div class="privacy__content">
          <?php the_field('content');?>
        </div>
        <div class="works__button-block">
            <a href="/<?php echo ($lang===18)  ? '?lang=en' :'?lang=ru' ;?>" class="works__button works__button--back "><img src="/wp-content/themes/esm/assets/img/portfolio-arrow.svg" alt="<?php the_field('back');?>"><span> <?php the_field('back');?></span></a>
            <a href="#header" class="works__button anchor works__button--up button"> <?php the_field('up');?><img src="/wp-content/themes/esm/assets/img/portfolio-arrow.svg" alt="<?php the_field('up');?>"></a>
      </div>
    </section>
    <?php endwhile;
    wp_reset_postdata(); 
?>

<?php get_footer(); ?>