<?php if (!empty($image_srcs)): ?>

    <figure class="responsive-image <?php echo $class; ?>">
        <?php foreach ($image_srcs as $size => $image): ?>
        
            <span class="visible-<?php echo $size; ?>-block img-<?php echo $size; ?>">
                <span class="non-retina-block">
                    <span class="img" style="background-image:url(<?php echo $image[0]; ?>)"></span>
                </span>
                <!-- <span class="retina-block">
                    <span class="img" style="background-image:url(<?php echo $image[0]; ?>)"></span>
                </span> -->
            </span>

        <?php endforeach; ?>
    </figure>

<?php $image_srcs = null; endif; ?>