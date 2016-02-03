<?php
/*
Template Name: Omdirigeringssida
*/
get_header();

// Get info from URL
$url = htmlspecialchars($_GET["url"]);

$mobile_link = get_field("redirect_link-mobile");
$desktop_link = get_field("redirect_link-url");
$tablet_link = get_field("redirect_link-tablet");
if (!$mobile_link) {
    $mobile_link = $desktop_link;
}
if (!$tablet_link) {
    $tablet_link = $desktop_link;
}
$timer = get_field("redirect_timer");
if(!$timer){
    $timer = 8;
}
?>

<main>
    <script type="text/javascript">

        $(function () {
            var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            var timeOut = <?php echo $timer; ?>;
            var timeOut = timeOut * 1000;

            if (width <= 480) {
                $("#redirect-link").attr("href", "<?php echo $mobile_link; ?>");
                redirect();
            }
            else if (width < 769 && width > 480) {
                $("#redirect-link").attr("href", "<?php echo $tablet_link; ?>");
                redirect();
            }
            else {
                redirect();
            }

            function redirect() {
                setTimeout(function () {
                    if (!$("#redirect-link").hasClass("opened")) {
                        document.getElementById('redirect-link').click();
                    }
                }, timeOut);
            }

            $("#redirect-link").on("click", function () {
                $(this).addClass("opened");
            })
        });

        function goBack() {
            window.history.back()
        }

    </script>
    <div class="container-fluid no-padding no-child-padding">
        <section id="content" class="redirect">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="col-xs-12">
                    <div class="content-block">
                        <h1>Ni skickas strax vidare till Mercedes-Benz.se</h1>
                        <strong><p>Ni har valt att besöka sidan <?php echo get_the_title(); ?>.</p></strong>

                        <?php
                        if (get_field("af_can_edit")) {
                            if (get_field("redirect_custom-text")) {
                                the_field("redirect_custom-text");
                            } else {
                                the_master_field("redirect_custom-text");
                            }
                        } else {
                            the_master_field("redirect_custom-text");
                        }
                        ?>
                        <button class="redirect-button back" target="_self" onclick="goBack()">
                            <i class="fa fa-angle-left"></i> Tillbaka
                        </button>
                        <a data-lightbox id="redirect-link" href="<?php echo $desktop_link; ?>" class="redirect-button go"
                           target="_blank">
                            <strong>Gå vidare <i class="fa fa-angle-right"></i></strong>
                        </a>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </section>
    </div>

    <script>
        var triggerClick = function ($el) {
            var pos = $el.getBoundingClientRect();
            var stop = $($el).offset().top;
            var sleft = $($el).offset().left;

            var evt = document.createEvent("MouseEvents");
            evt.initMouseEvent("click", true, true, window, 0, 0, 0, pos.left + (pos.width / 2), pos.top + (pos.height / 2), false, false, false, false, 0, null);

            document.body.dispatchEvent(evt);
        };

        document.body.addEventListener("click", function (e) {
            var temp2 = document.createElement("div");
            temp2.style.position = "fixed";
            temp2.style.top = e.clientY + "px";
            temp2.style.left = e.clientX + "px";
            temp2.style.width = "10px";
            temp2.style.height = "10px";
            temp2.style.background = "#0F0";

            //document.body.appendChild(temp2);
        });
    </script>



<?php get_footer(); ?>