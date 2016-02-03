<?php
    $menu_progress_color = get_field('page-settings-menu-bar', $id);
    $this_post = get_post($id);

    if (get_field('row',$id)) {
        $rows = get_field('row',$id);
        $counter = 1;
        $row_count = count($rows);
    ?>
    <section id="sub_menu" class="scroll-menu">

        <div class="submenu-wrapper">
            <div class="submenu-title">

                <h1>
                    <a class="back-link light" href="<?php echo get_permalink( $this_post->post_parent ); ?>" >
                        <i class="icon icon-chevron-thin-left"></i><span class="back-link-title"><?php echo get_the_title( $this_post->post_parent ); ?></span>
                    </a>
                    <?php echo get_the_title($id); ?>
                </h1>
                <div class="submenu-mobile visible-xs">
                    <div class="btn-group">
                        <a class="btn button white dropdown-toggle" data-toggle="dropdown" href="#">
                            Meny
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <?php foreach($rows as $row => $item){

                            $sub_menu_header = $item['row-settings-menu-header'];
                            $sub_menu_slug = get_slug($sub_menu_header);
                            ?>
                            <li>
                                <a href="#<?php echo $sub_menu_slug; ?>">
                                    <?php echo $sub_menu_header; ?>
                                </a>
                            </li>
                            <!-- dropdown menu links -->
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hidden-xs">
            <?php foreach($rows as $row => $item){

                $sub_menu_header = $item['row-settings-menu-header'];
                $sub_menu_slug = get_slug($sub_menu_header);

                if($counter==1){
                    $item_class = 'first';
                ?>
                <div class="item <?php echo $item_class; ?>">
                    <a href="#">&nbsp;</a>
                    <span></span>
                </div>
                <?php
                }
                if($counter!=1){
                    $item_class = '';
                ?>

                <div class="item <?php echo $item_class; ?>">
                    <a href="#<?php echo $sub_menu_slug; ?>">
                        <?php echo $sub_menu_header; ?>
                    </a>
                    <span></span>
                </div>

                <?php
                }
                if($counter==$row_count){
                    $item_class = 'last';
                ?>
                <div class="item <?php echo $item_class; ?>">
                    <a href="#">&nbsp;</a>
                    <span></span>
                </div>
                <?php
                }
                $counter++;
            }
            ?>
            </div>
        </div>
    </section>

    <style>
        .scroll-menu .item span {
            background-color: <?php echo $menu_progress_color; ?>;
        }
    </style>

    <script>
        $ = jQuery;
        $(function(){
            var width = $(".submenu-wrapper").width();
            var menu_items = $(".scroll-menu .item").length - 2;
            var item_width = $(".scroll-menu .item").width();
            var menu_width = 0;
            $(".scroll-menu .item:not(.first):not(.last)").each(function(){
                var item_width = $(this).width();
                menu_width = menu_width + item_width;
            });
            var new_width = ((width - menu_width) / 2);
            var document_height = $(document).height();

            $(".scroll-menu .item.first").css("width", new_width);
            $(".scroll-menu .item.last").css("width", new_width);

        });
        $(window).scroll(function (){
            var submenu_wrapper_height = $(".scroll-menu .submenu-wrapper").height();
            var slider_height = $("main .section-block:first-of-type").height();

            var top = $(this).scrollTop();

            if (top > slider_height) {
                $(".scroll-menu .submenu-wrapper").addClass("affix");
            }
            else {
                $(".scroll-menu .submenu-wrapper").removeClass("affix");
            }

            $(".scroll").each(function(i){
                var this_top = $(this).offset().top;
                var height = $(this).height();
                var this_bottom = this_top + height;
                var percent = 0;

                var anchor_tag = '#' + $(this).attr('name');
                var active_link_parent = $('.scroll-menu .submenu-wrapper').find('a[href="'+anchor_tag+'"]').parent();

                if (top >= this_top && top <= this_bottom) {
                    percent = ((top - this_top) / (height - submenu_wrapper_height)) * 100;
                    if (percent >= 100) {
                        percent = 100;
                        $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#fff");
                    }
                    else {
                        $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#36a7f3");
                    }

                }
                else if (top > this_bottom) {
                    percent = 100;
                    $(".scroll-menu .submenu-wrapper .item:eq("+i+")").css("color", "#fff");
                }
                $(".scroll-menu .submenu-wrapper .item:eq("+i+") span").css("width", percent + "%");
            });
        });

        // This adds an offset in case the header is fixed
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    var top_offset = 0;
                    if ( $('.submenu-wrapper').css('position') == 'fixed' ) {
                        top_offset = $('.submenu-wrapper').height() + 140;
                    }
                    $('html,body').animate({
                        scrollTop: target.offset().top - top_offset
                    }, 1000);
                    return false;
                }
            }
        });

    </script>

    <?php
    }

?>
