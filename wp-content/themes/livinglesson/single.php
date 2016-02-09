<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<?php if (in_category('live-lesson')): ?>
			<?php get_template_part('pages/liveLesson/index'); ?>
		<?php endif; ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>