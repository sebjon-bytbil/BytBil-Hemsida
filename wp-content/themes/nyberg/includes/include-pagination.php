<div class="paging">
    <ul>
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

        if ($active == 1) {
            ?>
            <li><span class="IconLeft">Tillbaka</span></li>
        <?php
        } else {
            ?>
            <li>
                <button name="Page" value="<?php echo($active - 2) ?>">Tillbaka</button>
            </li>
        <?php
        }
        for ($i = 0; $i < count($pages); $i++) { ?>
            <li <?php if ($pages[$i] == ($active - 1)) {
                echo "class='active'";
            } ?>>
                <button <?php if ($pages[$i] == ($active - 1)) {
                    echo "class='active' disabled='disabled'";
                } ?> name="Page" value="<?php echo $pages[$i]; ?>"><?php echo($pages[$i] + 1); ?></button>
            </li>
        <?php }
        ?>
        <?php if ($active == $total) : ?>
            <li><span class="IconRight">Nästa</span></li>
        <?php else : ?>
            <li>
                <button id="apan" name="Page" value="<?php echo $active; ?>" class="IconRight">Nästa</button>
            </li>

            <?php $post = json_decode(json_encode($_GET), true);

            if (isset($post['Page'])) {
                unset($post['Page']);
            }
            ?>

            <a id="next" href="<?php echo '?' . http_build_query($post) . '&Page=' . $active; ?>">nästa</a>
        <?php
        endif; ?>

    </ul>
</div>