<?php get_header(); ?>

	<div id="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumbs">
              <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li><a href="#" class="current">Contact us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <article id="cart-section">
      <div class="container">            
        <div class="row">
        	<div class="col-md-6">
	        	<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
        </div>
      </div>
    </article>	

<?php get_footer(); ?>