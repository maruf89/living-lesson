<?php
    $custom_fields = get_post_custom();
    $fields = array('venueName', 'shortAddress');

    $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'classtivity');
?>

<a class="class-item has-hover col-xs-12 col-md-6" href="<?php echo 'http://www.livinglesson.io/wp-content/uploads/2016/02/Single_Design_2.pdf'; //get_permalink(); ?>">
    <div class="item-wrapper">
        <div
            class="background"
            style="background:url(<?php echo $image[0]; ?>);"
            ></div>

        <div class="bg-overlay"></div>

        <div class="spots-left">
            <span class="spots-bar">
                <span class="number"><?php echo $custom_fields['spotsLeft'][0]; ?></span>
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
                        <strong><?php echo $custom_fields['venueName'][0]; ?></strong>
                    </li>
                    <li class="class-stat short-address">
                        <em><?php echo $custom_fields['shortAddress'][0]; ?></em>
                    </li>
                    <li class="class-stat language-level">
                        <?php echo $custom_fields['languageLevel'][0]; ?>
                    </li>
                    <li class="class-stat price">
                        <?php echo $custom_fields['price'][0]; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</a>