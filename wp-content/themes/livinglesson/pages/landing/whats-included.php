<!-- Whats Included -->
<section id="whatsIncluded" class="container-fluid sec whats-included">
    <div class="head-bar sec-head bar-desat">
        <div class="text-box">
            <div class="tail left"></div>
            <div class="tail right"></div>
            <h3 class="text">Here’s what you get by signing up:</h3>
        </div>
    </div>

    <div class="container includes-row">
        <div class="col-xs-12 col-md-4 include">
            <div class="include-copy">
                <h4 class="include-head">
                    Memrise vocabulary course
                </h4>
                <span class="include-descrip">
                    Tailored specifically to<br>
                    your classtivity.
                </span>
            </div>

            <div class="img-include">
                <img
                    alt="Memrise Vocabulary Course"
                    src="<?php echo get_template_directory_uri(); ?>/img/landing/included-1.jpg" />
            </div>
        </div>
        
        <div class="col-xs-12 col-md-4 include">
            <div class="include-copy">
                <h4 class="include-head">
                    In person practice
                </h4>
                <span class="include-descrip">
                    One hour with a native speaker<br>
                    and your fellow peers.
                </span>
            </div>

            <div class="img-include">
                <img
                    alt="Practice in Person"
                    src="<?php echo get_template_directory_uri(); ?>/img/landing/included-2.jpg" />
            </div>
        </div>

        <div class="col-xs-12 col-md-4 include">
            <div class="include-copy">
                <h4 class="include-head">
                    A topic of your choice
                </h4>
                <span class="include-descrip">
                    Want to learn the BBQ menu?<br>
                    Decide what you want learn!
                </span>
            </div>

            <div class="img-include">
                <img
                    alt="Choose Your Topic"
                    src="<?php echo get_template_directory_uri(); ?>/img/landing/included-3.jpg" />
            </div>
        </div>
    </div>

    <div class="email-signup col-md-8 col-center">
        <?php
            $mailchimp_title = 'Have your own ideas of where you’d like a class be held? <a href="mailto:mvmiliunas@gmail.com" class="styled-link" target=_blank>Email me</a> personally or sign up to get updated.';
            include(locate_template('elements/mailchimp-landing-list.php'));
        ?>
    </div>
</section>
<!-- End Whats Included -->