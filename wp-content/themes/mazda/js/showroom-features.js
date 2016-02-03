jQuery(document).ready(function($) {
    var showroomFeatures = (function() {
        var module = $('[data-module-type="showroom-features"]');
        function desktopInitialise () {
            var featureNavigation = (function() {
                var moduleSection = $('[data-module-section="feature-navigation"]', module);
                function bindTrigger() {
                    $('[data-feature-trigger]', moduleSection).each(function() {
                        $(this).on('click', function(e) {
                            var target = $(this).data('feature-trigger');
                            $('[data-feature-trigger]').removeClass('selected');
                            $(this).addClass('selected');
                            $('[data-feature-target]').removeClass('selected');
                            $('[data-feature-target]').addClass('hidden');
                            $('[data-feature-target="'+ target +'"]').addClass('selected');
                            $('[data-feature-target="'+ target +'"]').removeClass('hidden');

                            //Extra tracking helpers
                            if($(this).find('h3').length){
                                window.s3_log('/#'+$(this).find('h3').html());
                            }
                        });
                    });
                }

                function create() {
                    bindTrigger();
                }

                (function() {
                    create();
                })();

                return;
            })();
        }

        function mobileInitialise () {
            var featureNavigation = (function() {
                var moduleSection = $('[data-module-section="feature-navigation"]', module);
                function bindTrigger() {
                    $('[data-feature-trigger] .show-more a', moduleSection).on('click', function(e) {
                        e.preventDefault();
                        // Remove the selected class from all of the trigger panels
                        var toggleArea = $(this).parents('.show-more').find('.toggled-contents');
                        toggleArea.toggleClass('hidden');
                    });
                }

                function create() {
                    bindTrigger();
                }

                (function() {
                    create();
                })();

                return;
            })();
        }

        (function() {
            // is mobile
            if( $('.isMobile').length ) {
                mobileInitialise();
            }
            //is deskop
            else {
                desktopInitialise();
            }

        })();

        return;
    })();
});

