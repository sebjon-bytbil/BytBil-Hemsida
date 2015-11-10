jQuery(document).ready(function ($) {
    $('#mcp_push_link').on('click', function (e) {
        e.preventDefault();

        var additional_options = new Object();

        var anchor = $(this);
        var url = anchor.attr('href');

        var blogs = "";
        $('input[name="mcp_dest_blogs[]"]:checked').each(function () {
            if (blogs != "")
                blogs += ",";
            blogs += $(this).val();
        });

        var selected = $('input[name=mcp_dest_blog_type]:checked').val();
        var group = $('#mcp_group').val();
        var nbt_group = $('#mcp_nbt_group').val();

        if (!selected) {
            alert(mcp_meta_texts.select_an_option);
            return false;
        }

        if (blogs != "") {
            additional_options['dest_blogs'] = blogs;
        }

        additional_options['push_menu'] = ($('input[name=push_menu]:checked').val() !== undefined);

        if (selected == 'all') {
            additional_options['dest_blog_type'] = selected;
        }
        else if (selected == 'group' && !group) {
            alert(mcp_meta_texts.select_a_group);
            return false;
        }
        else if (selected == 'group' && group) {
            additional_options['dest_blog_type'] = selected;
            additional_options['group'] = group;
        }
        else if (selected == 'nbt_group' && !nbt_group) {
            alert(mcp_meta_texts.select_a_group);
            return false;
        }
        else if (selected == 'nbt_group' && nbt_group) {
            additional_options['dest_blog_type'] = selected;
            additional_options['nbt_group'] = nbt_group;
        }


        $('input.mcp_options:checked').each(function (i, item) {
            additional_options[$(item).val()] = true;
        });


        url += '&' + $.param(additional_options);

        window.location = url;
    });
});