(function($) {
    'use strict';
    $(function() {
        $('body').on('vcPanel.shown', '#vc_properties-panel', function() {
            $('body').trigger('init.tinymce');
        });

        $('body').on('click', '.vc_param_group-add_content', function() {
            $('body').trigger('init.tinymce');
        });
    });

    $('body').on('init.tinymce', function() {
        var textareas = $('.wysiwyg');

        if (undefined !== textareas && textareas.length > 0) {
            textareas.each(function(i) {
                var $this = $(this);
                if ($this.hasClass('has-tinymce')) {
                    return;
                }

                var id = 'tinymce' + i;
                $this.attr('id', id).addClass('has-tinymce');
                $this.siblings('.wysiwyg-input').addClass(id);

                if (tinymce.editors.length > 0) {
                    for (var j = 0; j < tinymce.editors.length; j++) {
                        if (tinymce.editors[j].id === id) {
                            tinymce.editors[j].remove();
                        }
                    }
                }

                tinymce.init({
                    selector: '#' + id,
                    setup: function(editor) {
                        editor.on('change', function() {
                            refresh_values(id, editor.getContent());
                        });
                    }
                });
            });
        }
    });

    function refresh_values(id, content) {
        $('#' + id).siblings('input.' + id).val(content);
    }
})(jQuery);
