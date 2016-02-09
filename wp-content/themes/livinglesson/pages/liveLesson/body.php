<section class="lesson-body container">
    <div class="col-xs-12 col-lg-10 col-center">
        <div class="head-bar lesson-body-head bar-brown">
            <div class="text-box">
                <div class="tail left"></div>
                <div class="tail right"></div>
                <h3 class="text">What Will I Be Doing?</h3>
            </div>
        </div>

        <?php $i = 0; while (get_field('activity-'.++$i.'-copy')): ?>
            <?php $odd_even = $i % 2 === 0 ? 'even' : 'odd'; ?>

            <section class="lesson-activity row <?php echo $odd_even; ?>">
                <div class="activity-wrap-img middle-align col-xs-12 col-sm-6 col-md-4">
                    <?php responsive_image_inc(get_field('activity_'.$i.'_img'), 'livelesson-content', null, 'activity-img'); ?>
                </div>

                <div class="activity-wrap-txt middle-align col-xs-12 col-sm-6 col-md-8">
                    <h4 class="activity-descrip"><?php the_field('activity-'.$i.'-title'); ?></h4>
                    <p class="activity-copy"><?php the_field('activity-'.$i.'-copy'); ?>
                </div>
            </section>
        <?php endwhile; ?>
    </div>
</section>