<?php global $post; setup_postdata($post); $company_profile = get_field('company_symbol', get_field('company_link')); ?>
<div id="content">
  <div id="entry" class="container">
    <div class="post-heading">
      <div id="post-title" class="row">
        <div class="c-inner">
          <div class="c-full">
            <div class="c-inner">
              <h1><?php the_title(); ?></h1>
            </div>
          </div>
          <?php if ($company_profile) { ?>
            <div class="c-full">
              <div class="c-inner">
                <p class="stock-info"><?php print get_field('exchange', get_field('company_link')).':'.get_field('company_symbol', get_field('company_link')); ?></p>
                <p class="author-date">Written by <?php the_author(); ?>, <?php the_date(); ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div> <!-- #post-heading -->

    <div id="post-content" class="row">
      <div class="c-inner">
        <div class="c-three-fourth">
          <div class="c-inner">
            <?php the_content(); ?>
          </div>
        </div>
        <?php if ($company_profile) { ?>
          <div class="c-fourth article-sidebar">
            <div class="c-inner">
              <?php get_template_part( 'templates/assets/company', 'profile' ); ?>
            </div>
          </div>
        <?php } ?>

      </div>
    </div> <!-- #post-content -->

  </div> <!-- #entry -->

</div> <!-- #content -->
