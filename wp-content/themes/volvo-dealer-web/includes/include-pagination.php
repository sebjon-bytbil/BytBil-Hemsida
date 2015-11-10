<div class="paging">
    <div class="buttoncontainer">
        <?php
        //var_dump($response->TotalCount);
        //var_dump($response->CurrentPage);
        //var_dump($response->PageSize);

        $active = $response->CurrentPage + 1;
        $total = ceil($response->TotalCount / $response->PageSize);

        if ($total > 4) {
            if ($active == 1) {
                $pages = array(($active - 1), ($active), ($active + 1), ($active + 2), ($active + 3));
            } else if ($active == 2) {
                $pages = array(($active - 2), ($active - 1), ($active), ($active + 1), ($active + 2));
            } else if ($active == $total) {
                $pages = array(($active - 5), ($active - 4), ($active - 3), ($active - 2), ($active - 1));
            } else if (($active - 1) == $total) {
                $pages = array(($active - 4), ($active - 3), ($active - 2), ($active - 1), ($active));
            } else {
                $pages = array(($active - 3), ($active - 2), ($active - 1), ($active), ($active + 1));
            }
        } else if ($total == 4) {
            if ($active == 1) {
                $pages = array(($active - 1), ($active), ($active + 1), ($active + 2));
            } else if ($active == 2) {
                $pages = array(($active - 2), ($active - 1), ($active), ($active + 1));
            } else if ($active == $total) {
                $pages = array(($active - 4), ($active - 3), ($active - 2), ($active - 1));
            } else if (($active - 1) == $total) {
                $pages = array(($active - 3), ($active - 2), ($active - 1), ($active));
            } else {
                $pages = array(($active - 3), ($active - 2), ($active - 1), ($active));
            }
        } else if ($total == 3) {
            if ($active == 1) {
                $pages = array(($active - 1), ($active), ($active + 1));
            } else if ($active == 2) {
                $pages = array(($active - 2), ($active - 1), ($active));
            } else if ($active == $total) {
                $pages = array(($active - 3), ($active - 2), ($active - 1));
            }
        } else if ($total == 2) {
            if ($active == 1) {
                $pages = array(($active - 1), ($active));
            } else if ($active == 2) {
                $pages = array(($active - 2), ($active - 1));
            }
        }

        $post = json_decode(json_encode($_GET), true);

        if (isset($post['Page'])) {
            unset($post['Page']);
        }
        ?>
        <span class="button prev"><a
                href="<?php echo get_permalink() . '?' . http_build_query($post) . 'Page=' . ($active - 1); ?>"
                name="Page" value="<?php echo($active - 2) ?>">&nbsp;</a></span>
        <?php

        for ($i = 0; $i < count($pages); $i++) { ?>
            <span class="button<?php if ($pages[$i] == ($active - 1)) {
                echo " active";
            } ?>"><a href="<?php echo get_permalink() . '?' . http_build_query($post) . 'Page=' . $i; ?>" name="Page"
                     value="<?php echo($active - 2) ?>"><?php echo($pages[$i] + 1); ?></a></span>
        <?php }


        ?>

        <span class="button next"><a
                href="<?php echo get_permalink() . '?' . http_build_query($post) . 'Page=' . $active; ?>" name="Page"
                value="<?php echo($active - 2) ?>">&nbsp;</a></span>

        <?php
        /*
        if($active == 1) {

    ?>
        <span class="button prev"><button <?php if($pages[$i] == ($active-1)){echo "class='active' disabled='disabled'";} ?> name="Page" value="<?php echo ($active-2) ?>">&nbsp;</button></span>
    <?php
        } else {
    ?>
        <span class="button prev"><button name="Page" value="<?php echo ($active-2) ?>">&nbsp;</button></span>
    <?php
        }
        for($i = 0; $i < count($pages); $i++) { ?>
            <span class="button" <?php if($pages[$i] == ($active-1)){echo "class='active'";} ?>><button <?php if($pages[$i] == ($active-1)){echo "class='active' disabled='disabled'";} ?> name="Page" value="<?php echo $pages[$i]; ?>"><?php echo ($pages[$i]+1); ?></button></span>
        <?php }
    ?>
    <?php if($active == $total) : ?>
        <span class="button next"><button <?php if($pages[$i] == ($active-1)){echo "class='active' disabled='disabled'";} ?> name="Page" value="<?php echo $active; ?>" class="IconRight">&nbsp;</button></span>
    <?php else : ?>
        <span class="button next"><button name="Page" value="<?php echo $active; ?>" class="IconRight">&nbsp;</button></span>
    <?php endif; */ ?>

    </div>
</div>