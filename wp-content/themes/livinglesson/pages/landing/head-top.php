<header class="landing-header container-fluid" role="banner">
    <div class="bg-overlay">
    </div>
    <div class="relative">
        <h1 class="site-title">
            <?php bloginfo('description'); ?> 
        </h1>

        <div class="sub-title-row">
            <h2 class="site-sub-title middle-align">
                Learn where you’ll actually be spending your time. Whether in a restaurant, bar or grocery store, take action and learn only what you’ll need!
            </h2>

            <img
                src="<?php echo get_template_directory_uri(); ?>/img/landing/medallion.svg"
                alt="Only in Medellin"
                class="medallion hidden-xs"
                />
        </div>

        <div class="head-cta head-bar bar-chestnut">
            <div class="text-box">
                <div class="tail left"></div>
                <div class="tail right"></div>
                <h3 class="text">Sign up for an Upcoming <?php echo CLASSTIVITY_NAME_UPPER; ?></h3>
            </div>
        </div>
    </div>

</header>

<!-- Top CTA -->
<section class="container top-section">
    <div class="whats-include-text">
        <a class="whats-included-link styled-link"
            href="#whatsIncluded"
            data-ga-bind="click"
            data-ga-category="learn more"
            data-ga-action="click"
            data-ga-label="landing: whats included"
        >
            What’s included in a <?php echo CLASSTIVITY_NAME; ?>?
        </a>
    </div>

    <div class="loop-showcase col-md-8 col-center clear">
        <?php loop_showcase('medellin'); ?>
    </div>

    <div class="email-signup col-md-8 col-center">
        <?php
            $mailchimp_ga_label = 'landing: top: get updates';
            include(locate_template('elements/mailchimp-landing-list.php'));
        ?>
    </div>
</section>
<!-- End Top CTA -->