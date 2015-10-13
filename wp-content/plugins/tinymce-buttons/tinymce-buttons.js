( function() {

    tinymce.PluginManager.add( 'um_buttons', function( ed, url ) {

        ed.addButton( 'icon_button', {

            text: 'Ikon',
            icon: 'bytbil icon-squared-plus',
            onclick: function() {

                ed.windowManager.open({
                    file : '/wp-content/plugins/tinymce-buttons/shortcode-add-button-window.php',
                    title : 'Ikon',
                    width : 997,
                    height : 640,
                    resizable : "yes",
                    inline : "no",
                    close_previous : "yes",
                });
            }

        } );


        // Add a button that opens a window
        ed.addButton( 'actionbutton_button', {

            text: 'Knapp',
            icon: 'bytbil icon-squared-plus',
            onclick: function() {
                // Open window
                ed.windowManager.open( {
                    title: 'Lägg till knapp',
                    body: [
                        {
                            type: 'textbox',
                            name: 'title',
                            label: 'Knapptext'
                        },
                        {
                            type: 'listbox',
                            name: 'color',
                            label: 'Färg',
                            'values': [
                                {text: 'UM Röd', value: 'red'},
                                {text: 'UM Blå', value: 'blue'},
                                {text: 'Svart', value: 'black'},
                                {text: 'Vit', value: 'white'},
                                {text: 'Orange', value: 'orange'},
                                {text: 'Grön', value: 'green'},
                                {text: 'Volvo', value: 'volvo'},
                                {text: 'Ford', value: 'ford'},
                                {text: 'Dacia', value: 'dacia'},
                                {text: 'Renault', value: 'renault'}
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'size',
                            label: 'Storlek',
                            'values': [
                                {text: 'Standard', value: 'standard'},
                                {text: 'Liten', value: 'small'},
                                {text: 'Stor', value: 'big'}
                            ]
                        },
                        {
                            type: 'listbox',
                            name: 'icon',
                            label: 'Ikon',
                            'values': [
                                {text: 'Ingen', value: 'none'},
                                {text: 'Telefon', value: 'icon-phone', icon: 'bytbil icon-phone'},
                                {text: 'E-post', value: 'icon-mail', icon: 'bytbil icon-mail'},
                                {text: 'Brev', value: 'icon-newsletter', icon: 'bytbil icon-newsletter'},
                                {text: 'Sök', value: 'icon-magnifying-glass', icon: 'bytbil icon-magnifying-glass'},
                                {text: 'Nyckel', value: 'icon-key', icon: 'bytbil icon-key'},
                                {text: 'Säljare', value: 'icon-user', icon: 'bytbil icon-user'},
                                {text: 'Personal', value: 'icon-users', icon: 'bytbil icon-users'},
                                {text: 'Bok', value: 'icon-book', icon: 'bytbil icon-book'},
                                {text: 'Bokmärke', value: 'icon-bookmark', icon: 'bytbil icon-bookmark'},
                                {text: 'Verktyg', value: 'icon-tools', icon: 'bytbil icon-tools'},
                                {text: 'Väska', value: 'icon-briefcase', icon: 'bytbil icon-briefcase'},
                                {text: 'Klocka', value: 'icon-clock', icon: 'bytbil icon-clock'},
                                {text: 'Moln', value: 'icon-cloud', icon: 'bytbil icon-cloud'},
                                {text: 'Check', value: 'icon-check', icon: 'bytbil icon-check'},
                                {text: 'Kryss', value: 'icon-cross', icon: 'bytbil icon-cross'},
                                {text: 'Kreditkort', value: 'icon-credit-card', icon: 'bytbil icon-credit-card'},
                                {text: 'GPS', value: 'icon-direction', icon: 'bytbil icon-direction'},
                                {text: 'Pil höger', value: 'icon-chevron-right', icon: 'bytbil icon-chevron-right'},
                                {text: 'Pil vänster', value: 'icon-chevron-left', icon: 'bytbil icon-chevron-left'},
                                {text: 'Pil upp', value: 'icon-chevron-up', icon: 'bytbil icon-chevron-up'},
                                {text: 'Pil ner', value: 'icon-chevron-down', icon: 'bytbil icon-chevron-down'},
                                {text: 'Ladda ner', value: 'icon-download', icon: 'bytbil icon-download'},
                                {text: 'Exportera', value: 'icon-export', icon: 'bytbil icon-export'},
                                {text: 'Dela', value: 'icon-share', icon: 'bytbil icon-share'},
                                {text: 'Penna', value: 'icon-edit', icon: 'bytbil icon-edit'},
                                {text: 'Hjärta', value: 'icon-heart', icon: 'bytbil icon-heart'},
                                {text: 'Stjärna', value: 'icon-star', icon: 'bytbil icon-star'},
                                {text: 'Info', value: 'icon-info-with-circle', icon: 'bytbil icon-info-with-circle'},
                                {text: 'Löv', value: 'icon-leaf', icon: 'bytbil icon-leaf'},
                                {text: 'Lok', value: 'icon-cloud', icon: 'bytbil icon-cloud'},
                                {text: 'Position', value: 'icon-location', icon: 'bytbil icon-location'},
                                {text: 'Lås', value: 'icon-lock', icon: 'bytbil icon-lock'},
                                {text: 'Sök', value: 'icon-magnifying-glass', icon: 'bytbil icon-magnifying-glass'},
                                {text: 'Meddelande', value: 'icon-message', icon: 'bytbil icon-message'},
                                {text: 'Nyhet', value: 'icon-new', icon: 'bytbil icon-new'},
                                {text: 'Nyhetsbrev', value: 'icon-book-open', icon: 'bytbil icon-book-open'},
                                {text: 'Kampanj', value: 'icon-price-tag', icon: 'bytbil icon-price-tag'},
                                {text: 'Kampanj 2', value: 'icon-price-ribbon', icon: 'bytbil icon-price-ribbon'},
                                {text: 'Sköld', value: 'icon-shield', icon: 'bytbil icon-shield'},
                                {text: 'Kundvagn', value: 'icon-shopping-cart', icon: 'bytbil icon-shopping-cart'},
                                {text: 'Pris', value: 'icon-trophy', icon: 'bytbil icon-trophy'},
                                {text: 'Facebook', value: 'icon-facebook-squared', icon: 'bytbil icon-facebook-squared'},
                                {text: 'Instagram', value: 'icon-instagram', icon: 'bytbil icon-instagram'},
                                {text: 'Twitter', value: 'icon-twitter', icon: 'bytbil icon-twitter'},
                                {text: 'LinkedIn', value: 'icon-linkedin', icon: 'bytbil icon-linkedin'}

                            ]
                        }

                    ],
                    onsubmit: function( e ) {
                        var button_icon = '';
                        if(e.data.icon != 'none'){
                            button_icon = '<i class="'+ e.data.icon +'"></i> ';
                        }
                        // Insert content when the window form is submitted
                        var button = '<span> <span class="button '+ e.data.color +' '+ e.data.size +'">' + button_icon + e.data.title +'</span> </span>'
                        ed.insertContent(button);
                    }

                } );
            }

        } );

    } );

} )();

