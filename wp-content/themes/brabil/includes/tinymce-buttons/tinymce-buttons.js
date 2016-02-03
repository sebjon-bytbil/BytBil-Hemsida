( function() {

    tinymce.PluginManager.add( 'brabil_buttons', function( ed, url ) {

        ed.addButton( 'icon_button', {

            text: 'Ikon',
            icon: 'brabil ion-ios-plus',
            onclick: function() {

                ed.windowManager.open({
                    file : '/wp-content/themes/brabil/includes/tinymce-buttons/shortcode-add-button-window.php',
                    title : 'Ikon',
                    width : 997,
                    height : 640,
                    resizable : "yes",
                    inline : "no",
                    close_previous : "yes",
                });
            }

        } );

        ed.addButton( 'button_button', {

            text: 'Knapp',
            icon: 'brabil ion-ios-plus',
            cmd: 'add_button'

        } );

        ed.addCommand('add_button', function() {
            ed.windowManager.open({
                id: 'bb-add-button',
                title: 'Lägg till knapp',
                body: [
                    {
                        id: 'buttonText',
                        type: 'textbox',
                        name: 'title',
                        label: 'Knapptext'
                    },
                    {
                        type: 'listbox',
                        name: 'color',
                        label: 'Färg',
                        'values': JSON.parse(bb_wysiwyg_buttons.buttons)
                    },
                    {
                        type: 'listbox',
                        name: 'icon',
                        label: 'Ikon',
                        'values': JSON.parse(bb_wysiwyg_icons.icons)
                    },
                    {
                        type: 'button',
                        text: 'Lägg till länk',
                        onclick: function() {
                            jQuery('body').addClass('tinymce-wp-link');
                            wpActiveEditor = true;
                            wpLink.open('wpLinkInput');
                            return false;
                        }
                    },
                    {
                        id: 'wpLinkInput',
                        type: 'textbox',
                        name: 'link',
                        style: 'display:none'
                    },
                    {
                        type: 'checkbox',
                        name: 'open_link',
                        label: 'Öppna länken i ett nytt fönster/flik'
                    },
                ],
                onsubmit: function(e) {
                    jQuery('body').removeClass('tinymce-wp-link');
                    var a = e.data.link;

                    var target = '';
                    if (e.data.open_link === true) {
                        target = ' target="_blank"';
                    }

                    var link = '';
                    var link_match = a.match(/^.*href\=['|"](.*)?\".*$/);
                    if (link_match !== null)  {
                        var link = link_match[1];
                    }
                    var button_icon = '';
                    if (e.data.icon != 'none') {
                        button_icon = '<i class="' + e.data.icon + '"></i> ';
                    }
                    var btn = 'btn btn-' + String(e.data.color);
                    var button = '<a href="' + link + '"' + target + ' class="' + btn + '">' + button_icon + e.data.title + '</a>';
                    ed.insertContent(button);
                }
            });

        });

    } );

} )();

