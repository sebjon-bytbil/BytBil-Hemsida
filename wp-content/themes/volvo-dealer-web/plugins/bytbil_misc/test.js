(function () {
    tinymce.create('tinymce.plugins.test', {
        init: function (ed, url) {
            ed.addButton('test', {
                title: 'Recent posts',
                image: 'http://placehold.it/20x20',
                onclick: function () {
                    var posts = prompt("Number of posts", "1");
                    var text = prompt("List Heading", "This is the heading text");

                    if (text != null && text != '') {
                        if (posts != null && posts != '')
                            ed.execCommand('mceInsertContent', false, '[recent-posts posts="' + posts + '"]' + text + '[/recent-posts]');
                        else
                            ed.execCommand('mceInsertContent', false, '[recent-posts]' + text + '[/recent-posts]');
                    }
                    else {
                        if (posts != null && posts != '')
                            ed.execCommand('mceInsertContent', false, '[recent-posts posts="' + posts + '"]');
                        else
                            ed.execCommand('mceInsertContent', false, '[recent-posts]');
                    }
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
        getInfo: function () {
            return {
                longname: "Recent Posts",
                author: 'Konstantinos Kouratoras',
                authorurl: 'http://www.kouratoras.gr',
                infourl: 'http://wp.smashingmagazine.com',
                version: "1.0"
            };
        }
    });
    tinymce.PluginManager.add('test', tinymce.plugins.test);
})();