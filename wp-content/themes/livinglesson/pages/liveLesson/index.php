<div
    class="Lesson"
    vocab="http://schema.org/"
    typeof="Event"
    >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <span
            class="hidden"
            property="url"
            content="<?php the_permalink(); ?>"
            ></span>

        <span
            class="hidden"
            property="image"
            content="<?php echo post_thumb_src('default'); ?>"
            ></span>

        <?php get_template_part('pages/liveLesson/header'); ?>

        <?php get_template_part('pages/liveLesson/body'); ?>

        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

        <?php //comments_template(); ?>
    </article>

</div>