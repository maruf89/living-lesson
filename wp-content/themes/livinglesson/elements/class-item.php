<?php
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'classtivity');
?>

<a class="class-item has-hover col-xs-12 col-md-6" href="<?php the_permalink(); ?>">
    <div class="item-wrapper">
        <div
            class="background"
            style="background:url(<?php echo $image[0]; ?>);"
            ></div>

        <div class="bg-overlay"></div>

        <div class="spots-left">
            <span class="spots-bar">
                <span class="number"><?php the_field('spaces-remaining'); ?></span>
                <span class="text">spots left!</span>
            </span>
        </div>

        <div class="class-content">
            <div class="default-visible">
                <h4 class="item-title"><?php the_title(); ?></h4>
            </div>
            <div class="hover-visible">
                <ul class="class-stats">
                    <li class="class-stat venue-name">
                        <span class="strong">@</span>
                        <strong><?php the_field('venue-name'); ?></strong>
                    </li>
                    <li class="class-stat short-address">
                        <em><?php the_field('location-general'); ?></em>
                    </li>
                    <li class="class-stat language-level">
                        <?php the_field('language-level'); ?>
                    </li>
                    <li class="class-stat price">
                        <?php the_field('price'); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</a>