<?php
$taxonomy = get_taxonomy( 'gallery_category' );
$terms = get_terms( array( 'taxonomy' => 'gallery_category',
          'orderby' => 'term_order',
          'order' => 'ASC',
          'hide_empty' => false,
          // 'include' => '6, 7, 8'
          'parent' => 0 )
        );
$buttons = get_field('buttons', 'option');
?>
<section class="section-portfolio-categories mb-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col text-center">
        <h3 class="heading-secondary text-uppercase mb-0">Gallery Categories</h3>
      </div>
    </div>
    <div class="row row-eq-height fadeIn wow">
        
        <?php 
        if ( ! empty($terms) ) {
          foreach ( $terms as $term ) {
            if ( $term->parent === 0 ) { ?>
              <div class="col col-md-6 col-lg-3 mb-5">
                <div class="gallery-category-<?php echo $term->term_id; ?> h-100">
                  <?php
                  $term_img = ( class_exists('acf') ) ? get_field( 'featured_image', $term ) : array( 'url' => 'https://placehold.it/400x400' );
                  if ( $term_img ) { ?>
                    <a href="/gallery_category/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>" class="d-block" >
                      <img class="card-img-top w-100" src="<?php echo $term_img['url']; ?>" alt="<?php echo $term_img['alt']; ?>">
                    </a>
                  <?php } ?>
                  <div class="text-center">
                    <h4 class="heading-secondary">
                      <a href="/gallery_category/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>" class="black-text" ><?php echo $term->name; ?></a>
                    </h4>
                    <?php if ( $term->description ) { ?>
                      <p class="card-text"><?php echo $term->description; ?></p>
                    <?php } ?>
                    <a href="/gallery_category/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>" class="btn btn-outline-black mx-auto"><?php echo $buttons['default_cta_text']; ?></a>
                  </div>

                </div>
                
              </div>

            <?php } ?>

          <?php }
        } ?>

    </div>
  </div>

</section>
