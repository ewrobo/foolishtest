<?php global $post; setup_postdata($post); $company_profile = get_field('company_symbol'); ?>
<div id="content" class="company">
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
                <p class="stock-info"><?php print get_field('exchange').':'.get_field('company_symbol'); ?></p>
              </div>
            </div>

          <?php } ?>
        </div>
      </div>
    </div> <!-- #post-heading -->

    <div id="post-content" class="row margin-top">
      <div class="c-inner">
        <div class="c-three-fourth">
          <div class="c-inner">
            <?php get_template_part( 'templates/assets/company', 'profile' ); ?>
          </div>
        </div>
        <?php if ($company_profile) { ?>
          <div class="c-fourth article-sidebar">
            <div class="c-inner">
              <?php get_template_part( 'templates/assets/company', 'stock' ); ?>
            </div>
          </div>
        <?php } ?>
        <div class="c-half">
          <div class="c-inner">
            <h2>Stock Recommendations</h2>
            <?php
            $stock_args = array(
						'post_type' => 'stocks',
						'posts_per_page' => '-1',
						'order' => 'ASC',
  					 );

  					 $stock_query = new WP_Query($stock_args);
             if ( $stock_query->have_posts() ) {
                while ( $stock_query->have_posts() ) {
                $stock_query->the_post();
                echo '<div>';
                echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                echo '</div>';
                }
                wp_reset_postdata();
            }
            ?>
          </div>
        </div>
        <div class="c-half">
          <div class="c-inner">
            <h2>Recent News</h2>
            <?php
            $stock_args = array(
						'post_type' => 'post',
						'posts_per_page' => '-1',
						'order' => 'ASC',
  					 );

  					 $stock_query = new WP_Query($stock_args);
             if ( $stock_query->have_posts() ) {
                while ( $stock_query->have_posts() ) {
                $stock_query->the_post();
                echo '<div>';
                echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                echo '</div>';
                }
                wp_reset_postdata();
            }
            ?>
          </div>
        </div>

      </div>
    </div> <!-- #post-content -->

  </div> <!-- #entry -->

</div> <!-- #content -->
