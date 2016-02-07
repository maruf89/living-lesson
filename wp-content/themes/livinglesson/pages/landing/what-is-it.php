<!-- What is it -->
<section class="container-fluid sec what-is-it">
    <div class="head-bar sec-head bar-desat">
        <div class="text-box">
            <div class="tail left"></div>
            <div class="tail right"></div>
            <h3 class="text">What is it?</h3>
        </div>
    </div>

    <div class="container icon-img-row">
        <?php for ($i = 1; $i <= 3; ++$i): ?>
            <div class="point col-xs-12 col-sm-4">
                <img
                    class="icon-img"
                    src="<?php echo get_template_directory_uri(); ?>/img/landing/hiw-<?php echo $i; ?>.svg" />
            </div>
        <?php endfor; ?>
        <span class="connector plus">+</span>
        <span class="connector at">at</span>
    </div>

    <div class="what-is-bars clear">
        <div class="what-container container">
            <div class="what-is-bar bar-left col-sm-3">
                A tailored<br>
                vocab lesson 
            </div>
            <div class="what-is-bar bar-middle col-sm-6">
                An hour with<br>
                a native
            </div>
            <div class="what-is-bar bar-right col-sm-3">
                The place<br>
                your learning!
            </div>
        </div>
    </div>
    
</section>
<!-- End What is it -->