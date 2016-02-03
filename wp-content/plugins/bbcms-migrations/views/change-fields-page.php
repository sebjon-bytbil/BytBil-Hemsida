<h1>BytBil Migration Handler</h1>
<h3>Change Fields</h3>
<p>Man kan ändra fältnamn, värdet hämtas från ett fält och läggs in i ett nytt/annat fält.</p>
<p>Är fältet av typen <code>checkbox</code> så kommer värdet att läggas till som "aktivt".</p>

<div class="row">
    <div class="col">
        <form class="submit-migration" action="" method="get">
            <label for="field-theme">
                <input name="page" type="hidden" value="change-field"/>
                <select name="theme" id="field-theme">
                    <option value="">Välj Tema</option>
                    <?php foreach ($themes as $name => $theme) : ?>
                        <option <?php if ($selected_theme == $name) : ?> selected <?php endif; ?>
                            value="<?php echo $name; ?>"><?php echo $name; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </form>

        <form class="submit-migration" action="<?php echo get_admin_url() ?>admin-post.php" method="post">
            <input name="action" type="hidden" value="change-field-submit"/>
            <?php if (!empty($selected_theme)) : ?>
                <ul id="select-sites">
                    <li><input type="checkbox" id="select-all-sites"/> Välj alla</li>
                    <?php foreach ($template_sites as $site) : ?>
                        <li><input type="checkbox" name="sites[]"
                                   value="<?php echo $site->blog_id; ?>"/> <?php echo $site->domain; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <label for="field-posttype">
                <select name="field-posttype" id="field-posttype">

                </select>
            </label>
            <label for="field-name">
                <input id="field-name" type="text" name="field-name"
                       placeholder="Välj fält (ex. sitesetting-link-effects)"/>
            </label>
            <label for="new-field-name">
                <input id="new-field-name" type="text" name="new-field-name"
                       placeholder="Välj nytt fält (ex. sitesetting-link-effects)"/>
            </label>
            <label for="noop">
                Noop: <input type="checkbox" name="noop" value="1"/>
            </label>
            <input class="button" type="submit" value="Migrera"/>
        </form>
    </div>
    <div class="col">
        <?php
        if (count($handled)) : ?>
            <h1>Utförda ändringar</h1>
            <?php foreach ($handled as $k => $statuses) : ?>
                <h2><?php echo preg_replace("/_/", " ", $k); ?></h2>
                <ul>
                    <?php foreach ($statuses as $status) : ?>
                        <li><?php echo stripcslashes($status); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach;
        endif;
        ?>
    </div>
</div>

<script>
    (function ($) {
        $("#field-theme").change(function () {
            $(this).parents("form").submit();
        });

        $("#select-all-sites").click(function () {
            if ($(this).is(":checked")) {
                $("#select-sites").find("input[type='checkbox']").prop("checked", true);
            } else {
                $("#select-sites").find("input[type='checkbox']").prop("checked", false);
            }
        });

        $.ajax({
            url: ajaxurl,
            dataType: "json",
            method: "get",
            data: {
                action: "fetch-cpts",
                blog: <?php echo $blog->blog_id; ?>
            },
            success: function (cpts) {
                var cont = $('#field-posttype');
                cont.html();
                cont.append("<option>Välj posttype</option>");
                cpts.forEach(function (cpt) {
                    cont.append("<option name='field-posttype' value='" + cpt + "'>" + cpt + "</option>");
                });
            }
        });
    }(jQuery));
</script>
