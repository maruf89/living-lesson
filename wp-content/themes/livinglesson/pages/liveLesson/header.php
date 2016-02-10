<?php
    $custom_fields = get_post_custom();
?>
<header class="lesson-head">
    <?php responsive_image_inc(null, 'livelesson-head', get_the_ID(), 'head-bg cover'); ?>

    <div class="intro">
        <div class="enter">
            <div class="col-xs-12 col-md-10 col-lg-8 col-center">
                <h1 class="lesson-title"><?php the_title(); ?></h1>

                <p class="lesson-excerpt">
                    <?php the_excerpt(); ?>
                </p>
            </div>
        </div>

        <div class="cta-details">
            <div class="col-xs-12 col-md-10 col-lg-8 col-center clear">
                <div class="lesson-details head-sib">
                    <h4 class="details-head">Lesson Details</h4>

                    <ul class="details-list">
                        <li class="detail price"><strong>Price:</strong> <?php the_field('price'); ?></li>
                        <li class="detail level"><strong>Level:</strong> <?php the_field('language-level'); ?></li>
                        <li class="detail location">
                            <strong>Location:</strong> <em><?php the_field('venue-name'); ?></em> <?php the_field('location-general'); ?>
                        </li>
                        <li class="detail cl-size"><strong>Class Size:</strong> <?php the_field('class-size'); ?></li>
                    </ul>
                </div>

                <div class="details-cta head-sib">
                    <a
                        class="btn-cta fluffy"
                        data-ga-bind="click"
                        data-ga-category="acquisition"
                        data-ga-action="click"
                        data-ga-label="lesson: <?php the_title(); ?>: cta"
                    >Reserve my Spot!</a>
                    <a
                        class="block what-happens-link"
                        style="cursor:pointer"
                        data-ga-bind="click"
                        data-ga-category="learn more"
                        data-ga-action="click"
                        data-ga-label="lesson: what happens when i reserve"
                    ><em>What happens when I reserve?</em></a>
                </div>
            </div>
        </div>
    </div>
</header>
