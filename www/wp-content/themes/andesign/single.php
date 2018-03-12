<?php get_header(); ?>
<?php if ( have_posts() ) : the_post(); ?>
  <section>
    <article class='blogArticle' data-aos="fade-up" data-aos-once="true">
      <div class="thumbnail">
        <?php the_post_thumbnail() ?>
      </div>
      <header>
        <h1><?php the_title(); ?></h1>
        <time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time>
      </header>
      <?php the_content(); ?>
      <footer>
          <address>Por <?php the_author_posts_link() ?></address>
          <?php  comments_template( '', true ); ?>
      </footer>
    </article>
  </section>
<?php else : ?>
  <p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
