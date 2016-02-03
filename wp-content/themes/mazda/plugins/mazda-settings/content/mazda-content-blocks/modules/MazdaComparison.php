<?php

/**
 * Jämförelseblock
 */

$selector = '.editSpec';;
$options = get_sub_field('block');

switch ($options) {
    case '0':
        $transient = 'cselect';
        break;
    case '1':
        $transient = 'spprices';
        break;
    case '2':
        $transient = 'compare';
        break;
}


if (false === ($comparison = get_mazda_transient($transient))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            $parent = $part->parent()->parent();
            if ($options == '2') {
                foreach ($parent->find('script') as $script) {
                    $script->outertext = '';
                }
            }

            $comparison = $parent->outertext;
            // Transient
            set_mazda_transient($transient, $comparison);
        }
    }
}

?>

<form<?php echo ($options == '2') ? ' id="aspnetForm"' : ''; ?>>
<?php if ($options != '2') : ?>
<script src="http://www.mazda.se/js/main.msajax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/car-selector.js"></script>
<script src="http://www.mazda.se/js/accordion.js"></script>
<?php endif; ?>
<div class="row">
<?php echo $comparison; ?>
</div>
</form>

