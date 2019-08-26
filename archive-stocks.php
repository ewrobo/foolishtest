<?php
/*
Template Name: Archives
*/
get_header(); ?>

<?php global $post; setup_postdata($post); ?>
<div id="content">
  <div id="entry" class="container">
    <div class="row">
      <div class="c-inner">
        <div class="c-full">
          <h1>Recent Stock Recommendations</h1>
        </div>
      </div>
    </div>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="post-heading">
        <div id="post-title" class="row margin-adjust">
          <div class="c-inner">
            <div class="c-three-fourth">
              <div class="c-inner">
                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
              </div>
            </div>
            <div class="c-three-fourth">
              <div class="c-inner">
                <p class="stock-info"><?php print get_field('exchange', get_field('company_link')).':'.get_field('company_symbol', get_field('company_link')); ?></p>
                <div class="margin-top">
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- #post-heading -->

    <?php endwhile; ?>

  </div> <!-- #entry -->

</div> <!-- #content -->

<?php get_footer(); ?>
