<?php
if (get_field('sitesetting-custom-code', $sid)) {
    if (in_array('javascript', get_field('sitesetting-custom-code', $sid))) {
        the_field('sitesetting-custom-code-js', $sid);
    }
}
?>