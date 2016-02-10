'use strict';

export function BindAnalytics () {
    // Unbind the default behaviour
    $(document).off("ready.ga").on("ready", function () {

        // Set some options the ones below are the defaults.
        var clickOptions = {
                event: "trackEvent", // The event name unprefixed. 
                handler: "click", // The eventhandler to trigger the tracking. 
                                  // Using 'load' will track immediately.
                debug: false // Whether to run in debug mode.
            },

            submitOptions = {
                event: "trackEvent",
                handler: "submit",
            }

        // Bind using the custom selector.
        $('[data-ga-bind="click"]').googleAnalytics(clickOptions);
        $('[data-ga-bind="submit"]').googleAnalytics(submitOptions);
    });
}