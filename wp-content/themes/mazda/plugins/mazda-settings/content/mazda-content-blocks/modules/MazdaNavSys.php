<?php

/**
 * Navigationssytem
 */

// Get options
$selector = get_sub_field('selector');

if (false === ($navsys = get_mazda_transient('navsys'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find('[data-module-type="system-layout navigator-system"]', 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            // Script
            $script = $part->next_sibling()->outertext;

            $navsys = array();
            $navsys['script'] = $script;
            $navsys['module'] = $part->outertext;
            // Transient
            set_mazda_transient('navsys', $navsys);
        }
    }
}

?>

<div class="row">
<?php echo $navsys['module']; ?>
<script>

        (function() {

            var copyyoursupportprovidedby = '{0}';

            var dataSatNav = [{"parentModel":"Mazda2","satNavDevices":[{"parentModel":"Mazda2","displayName":"MZD Connect","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/m2-display-lhd.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-eu.naviextras.com/shop/portal?live.ui.locale.code=sv","type":"SatNav","category":"Kartuppdatering","provider":"MZD Connect"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://infotainment.mazdahandsfree.com/home?language=sv-EU\u0026model_id=673","type":"SatNav","category":"Support","provider":"MZD Connect"}]},{"parentModel":"Mazda2","displayName":"Mazda Multimedia-Navigationssystem","deviceName":"AVN2","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/avn2-mazda-multimedia-navigation-system-mazda2to5.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-avn2.naviextras.com/shop/portal","type":"SatNav","category":"Kartuppdatering","provider":"Naviextras"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.naviextras.com/shop/portal/support","type":"SatNav","category":"Support","provider":"Naviextras"}]},{"parentModel":"Mazda2","displayName":"Mazda Navigation / TomTom","deviceName":"AVN1 (NVA-SD8110 EU-Live)","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/anv1-tomtom-mazda2.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation/mazda-nva-sd8110-europe-live/index.jsp","type":"SatNav","category":"Support","provider":"TomTom"}]}]},{"parentModel":"Mazda3","satNavDevices":[{"parentModel":"Mazda3","displayName":"MZD Connect","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/mzd-connect.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-eu.naviextras.com/shop/portal?live.ui.locale.code=sv","type":"SatNav","category":"Kartuppdatering","provider":"MZD Connect"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://infotainment.mazdahandsfree.com/home?language=sv-EU\u0026model_id=684","type":"SatNav","category":"Support","provider":"MZD Connect"}]},{"parentModel":"Mazda3","displayName":"Mazda Navigation / TomTom","deviceName":"AVN1 (NVA-SD8110 EU-Live)","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/anv1-tomtom-mazda2.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation/mazda-nva-sd8110-europe-live/index.jsp","type":"SatNav","category":"Support","provider":"TomTom"}]},{"parentModel":"Mazda3","displayName":"Multi-Informations-Display","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/multi-informations-display-cx7.jpg","supportLinks":[{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://www.mazda.se/hitta-en-aterforsaljare/","type":"SatNav","category":"Hitta en återförsäljare","provider":null}]}]},{"parentModel":"Mazda5","satNavDevices":[{"parentModel":"Mazda5","displayName":"Mazda Multimedia-Navigationssystem","deviceName":"AVN2","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/avn2-mazda-multimedia-navigation-system-mazda2to5.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-avn2.naviextras.com/shop/portal","type":"SatNav","category":"Kartuppdatering","provider":"Naviextras"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.naviextras.com/shop/portal/support","type":"SatNav","category":"Support","provider":"Naviextras"}]},{"parentModel":"Mazda5","displayName":"Mazda Navigation / TomTom","deviceName":"AVN1 (NVA-SD8110 EU-Live)","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/anv1-tomtom-mazda2.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation/mazda-nva-sd8110-europe-live/index.jsp","type":"SatNav","category":"Support","provider":"TomTom"}]}]},{"parentModel":"Mazda6","satNavDevices":[{"parentModel":"Mazda6","displayName":"MZD Connect","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/m6-display-lhd.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-eu.naviextras.com/shop/portal?live.ui.locale.code=sv","type":"SatNav","category":"Kartuppdatering","provider":"MZD Connect"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://infotainment.mazdahandsfree.com/home?language=sv-EU\u0026model_id=1883","type":"SatNav","category":"Support","provider":"MZD Connect"}]},{"parentModel":"Mazda6","displayName":"Mazda Navigation / TomTom","deviceName":"AVN1 (NVA-SD8110 EU-Live)","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/anv1-tomtom-mazda2.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation/mazda-nva-sd8110-europe-live/index.jsp","type":"SatNav","category":"Support","provider":"TomTom"}]}]},{"parentModel":"Mazda CX-5","satNavDevices":[{"parentModel":"Mazda CX-5","displayName":"MZD Connect","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/2015_mazda_cx5_interior.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-eu.naviextras.com/shop/portal?live.ui.locale.code=sv","type":"SatNav","category":"Kartuppdatering","provider":"MZD Connect"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://infotainment.mazdahandsfree.com/home?language=sv-EU\u0026model_id=1881","type":"SatNav","category":"Support","provider":"MZD Connect"}]},{"parentModel":"Mazda CX-5","displayName":"Mazda Navigation / TomTom","deviceName":"NB1","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/nb1-tom-tom-mazda6-cx5.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation","type":"SatNav","category":"Support","provider":"TomTom"}]}]},{"parentModel":"Mazda CX-7","satNavDevices":[{"parentModel":"Mazda CX-7","displayName":"Multi-Informations-Display","deviceName":null,"associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/multi-informations-display-cx7.jpg","supportLinks":[{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"http://www.mazda.se/hitta-en-aterforsaljare/","type":"SatNav","category":"Hitta en återförsäljare","provider":null}]}]},{"parentModel":"Mazda MX-5","satNavDevices":[{"parentModel":"Mazda MX-5","displayName":"Mazda Multimedia-Navigationssystem","deviceName":"AVN2","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/avn2-mazda-multimedia-navigation-system-mazda2to5.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://mazda-avn2.naviextras.com/shop/portal","type":"SatNav","category":"Kartuppdatering","provider":"Naviextras"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.naviextras.com/shop/portal/support","type":"SatNav","category":"Support","provider":"Naviextras"}]},{"parentModel":"Mazda MX-5","displayName":"Mazda Navigation / TomTom","deviceName":"AVN1 (NVA-SD8110 EU-Live)","associatedImageUrl":"http://www.mazda.se/assets/master/satnav/support-images/anv1-tomtom-mazda2.jpg","supportLinks":[{"supportLinkInfo":"Uppdatera din karta","supportLink":"https://www.tomtom.com/sv_se/shop/mapupdateservice/","type":"SatNav","category":"Kartuppdatering","provider":"TomTom"},{"supportLinkInfo":"Allmän support \u0026 information","supportLink":"https://www.tomtom.com/sv_se/products/your-drive/built-in-navigation/mazda-nva-sd8110-europe-live/index.jsp","type":"SatNav","category":"Support","provider":"TomTom"}]}]}],
                markupCache = {};

            var satNavModule = (function() {

                var deviceHTML = '',
                    supportHTML = '',
                    supportModule = {},
                    delay = 400,
                    dropdownCreated = false;

                    var htmlSection = [];

                    function createVehicleSelector() {

                        desktop();

                        ( $(window).width() < 768 ) ? mobile() : desktop();
                        
                        $(window).resize(function () {

                            if ( $(window).width() < 768 && !(new RegExp('MSIE [78]')).exec(navigator.userAgent) ) {

                                mobile();

                            } else {

                                desktop();
                            }
                        });
                        
                        function mobile() {

                            var $vehicleSelector = $('.select-vehicle'),
                            $navSystem = $('.navigator-system');

                            $('ul', $vehicleSelector).remove();

                            if (!dropdownCreated) {

                                var $vehicleSelector = $('.select-vehicle'),
                                    $select = '',
                                    optionHTML = '';

                                $.each ( dataSatNav, function( i, obj ) {
                                    optionHTML += '<option value="'+ obj.parentModel +'">'+obj.parentModel+'</option>';
                                });                                

                                if($('html').attr('id') == "nb-NO"){
                                    $select = $('<select><option selected value="">Velg modell</option></select>');
                                } else {
                                   $select = $('<select><option selected value="">Select a model</option></select>'); 
                                }

                                $select.append(optionHTML);
                                $('h3', $vehicleSelector).after($select);

                                $select.on('change', function() {

                                    var modelKey = $(this).val(),
                                        modelMarkup;

                                    $('.navigator-system, .support-device').slideUp();

                                    // update content in support module
                                    supportModule = {};
                                    $('li', '.support-device').remove();

                                    // Check to see if model markup already exists...
                                    if (markupCache[modelKey] !== undefined) {
                                        modelMarkup = markupCache[modelKey];
                                    } else {
                                        // build from data
                                        modelMarkup = buildMarkup(modelKey);
                                    }

                                    // this markup contains steps 2 & 3
                                    $navSystem.slideUp(delay, function(){

                                        $('li', $navSystem).remove();
                                        $('ul', $navSystem).append(deviceHTML);

                                        $navSystem.slideDown(400, function(){

                                            $('li', $navSystem).on('click', function(e) {

                                                var tempIndex = $(this).index(),
                                                    htmlArray = supportModule[tempIndex];
                                                
                                                $('li', $navSystem).removeClass('selected');
                                                $(this).addClass('selected');

                                                $('.support-device').slideUp(400, function(){

                                                    $('li', '.support-device').remove();

                                                    for (var i = 0; i < htmlArray.length; i++) {
                                                        $('ul', '.support-device').append(htmlArray[i]);
                                                    }

                                                    $('.support-device').slideDown(400);
                                                });

                                                e.preventDefault();
                                            });

                                        });
                                    });

                                });

                                dropdownCreated = true;
                            }
                        }

                        function desktop() {

                            var modelHTML = '',
                                $vehicleSelector = $('.select-vehicle'),
                                $navSystem = $('.navigator-system');

                            dropdownCreated = false;

                            $('select','.select-vehicle').remove();
                            $('ul', '.select-vehicle').remove();

                            $.each ( dataSatNav, function( i, obj ) {

                                modelHTML += '<li data-model="'+ obj.parentModel +'">';
                                modelHTML += '<label for="'+ obj.parentModel +'">';
                                modelHTML += '<input type="radio" id="'+ obj.parentModel +'" name="module-selector" value="'+ obj.parentModel +'">';
                                modelHTML += '<span>'+ obj.parentModel +'</span>';
                                modelHTML += '</label>';
                                modelHTML += '</li>';

                            });
                            
                            $('h3','.select-vehicle').after('<ul></ul>');
                            $('ul', $vehicleSelector).append(modelHTML);

                            $('li', $vehicleSelector).on('change', function(e) {

                                var modelKey = $(this).data('model'),
                                    modelMarkup;

                                $('li', $vehicleSelector).removeClass('selected');
                                $(this).addClass('selected');

                                // update content in support module
                                supportModule = {};
                                $('li', '.support-device').remove();

                                $('.support-device').slideUp();              

                                // Check to see if model markup already exists...
                                if (markupCache[modelKey] !== undefined) {
                                    modelMarkup = markupCache[modelKey];
                                } else {
                                    // build from data
                                    modelMarkup = buildMarkup(modelKey);
                                }

                                // this markup contains steps 2 & 3
                                $navSystem.slideUp(delay, function(){

                                    $('li', $navSystem).remove();
                                    $('ul', $navSystem).append(deviceHTML);

                                    $navSystem.slideDown(400, function(){

                                        $('li', $navSystem).on('click', function(e) {

                                            var tempIndex = $(this).index(),
                                                htmlArray = supportModule[tempIndex];
                                            
                                            $('li', $navSystem).removeClass('selected');
                                            $(this).addClass('selected');

                                            $('.support-device').slideUp(400, function(){

                                                $('li', '.support-device').remove();

                                                for (var i = 0; i < htmlArray.length; i++) {
                                                    $('ul', '.support-device').append(htmlArray[i]);
                                                }

                                                $('.support-device').slideDown(400);
                                            });

                                            e.preventDefault();
                                        });

                                    });
                                });

                                e.preventDefault();
                            });
                        }
                    }
                    function buildMarkup (key) {

                        var keyModelHTML = '';

                        $.each( dataSatNav, function( i, obj ) {

                            if ( obj.parentModel === key ) {

                                $.each ( obj.satNavDevices, function ( j, model ) {
                                    
                                    keyModelHTML += '<li data-system="'+ model.parentModel  +'">';
                                    keyModelHTML += '<a href="#">';
                                    keyModelHTML += '<div class="nav-dateStamp">';
                                    keyModelHTML += '<p>'+ model.displayName + '</p>';
                                    keyModelHTML += '</div>';
                                    keyModelHTML += '<img src="'+ ((model.associatedImageUrl) ? model.associatedImageUrl : '/content/images/navigationSystem/navigationSystem.png') +'" alt="'+ model.deviceName +'">';
                                    keyModelHTML += '<div class="nav-system">';
                                    keyModelHTML += '<p>'+ ((model.deviceName) ? model.deviceName : '') +'<p>';
                                    keyModelHTML += '</div>';
                                    keyModelHTML += '</a>';
                                    keyModelHTML += '</li>';

                                    deviceHTML = keyModelHTML;
                                    
                                    $.each( model.supportLinks, function ( k, support ) {

                                        supportHTML = '';
                                    
                                        supportHTML += '<li>';
                                        supportHTML += '<div class="more-info">';
                                        supportHTML += '<p>'+ support.supportLinkInfo +'</p>';
                                        supportHTML += '</div>';
                                        supportHTML += '<div class="bluebox">';
                                        supportHTML += '<a data-analytics="track_ctabox/action_click/' + ((support.provider) ? support.provider.replace( / /g, '+' ) : '') + '+' + support.category.replace( / /g, '+' ) + '/?url=' + support.supportLink + '|title=' + ((support.provider) ? support.provider.replace( ' ', '+' ) : '') + '+' + support.category.replace( ' ', '+' ) + '" href="' + support.supportLink + '" target="_blank">'+ ((support.provider) ? support.provider+'&nbsp;' : '') + support.category +'</a>';
                                        supportHTML += '<span class="arrow_right"></span>';
                                        supportHTML += '</div>';
                                        supportHTML += '</li>';

                                        (supportModule[j] = supportModule[j] || []).push(supportHTML);

                                    });
                                });
                            }
                        });
                    }
                    return {

                        create : createVehicleSelector

                    };        
            }());

            satNavModule.create();


        }());

    </script>
</div>

