<section class="mailchimp list landing-list">
    <?php
        // global $mailchimp_title;
        if (!isset($mailchimp_title)) {
            $mailchimp_title = 'Or enter your email to be notified about new classtivities in your area';
        }
    ?>
    <!-- Begin MailChimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
        <form
            action="//livinglesson.us12.list-manage.com/subscribe/post?u=af6c55f539896d3afaba295fc&amp;id=2fcf073b8e"
            method="post"
            id="mc-embedded-subscribe-form"
            name="mc-embedded-subscribe-form"
            class="validate default-form"
            target="_blank"
            novalidate
        >
            <div id="mc_embed_signup_scroll">
                <h4 class="list-cta"><?php echo $mailchimp_title; ?></h4>
                <div class="mc-field-group email-input">
                    <input
                        type="email"
                        value=""
                        name="EMAIL"
                        class="required email"
                        placeholder="john@doe.com"
                        id="mce-EMAIL" />
                </div>
                <input
                    type="submit"
                    value="Get Updates!"
                    name="subscribe"
                    id="mc-embedded-subscribe"
                    class="submit middle-align btn-cta fat" />
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input
                        type="text"
                        name="b_af6c55f539896d3afaba295fc_2fcf073b8e"
                        tabindex="-1"
                        value="" />
                </div>
            </div>
        </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->
</section>