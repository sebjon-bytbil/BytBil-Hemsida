<?php

/**
 * Sekundär nav
 */

// Get options
$selector = '.secondaryCarNav';
$extra_menu = (get_sub_field('extra-menu') == 1) ? true : false;
$exclude = (get_sub_field('exclude') == 1) ? true : false;

$excludes = null;
if ($exclude) {
    $excludes = get_sub_field('menu-excludes');
}

if (false === ($secnav = get_mazda_transient('secnav'))) {
    $html = get_mazda_transient('html');

    if (!is_object($html)) {
        throw_non_object_warning('$html', __FILE__, __LINE__);
    } else {
        if (!is_object($part = $html->find($selector, 0))) {
            throw_non_object_warning('$part', __FILE__, __LINE__);
        } else {
            if ($extra_menu) {
                if (!is_object($third_row = $part->find('.thirdRow', 0))) {
                    throw_non_object_warning('$third_row', __FILE__, __LINE__);
                } else {
                    $third_row->style = 'height: auto';
                }
            }

            $option_values = array();
            $j = 0;
            foreach ($part->find('.secondRow ul li') as $i => $li) {
                $i++;

                $exclude_type = null;
                // Figure out where to exclude
                if ($excludes) {
                    foreach ($excludes as $excl) {
                        $number = str_replace(' ', '', $excl['exclude-number']);
                        // If exclude
                        if ($number == $i) {
                            switch ($excl['exclude-from']) {
                                //Desktop
                                case 0:
                                    $exclude_type = 'desktop';
                                    break;
                                // Mobile
                                case 1:
                                    $exclude_type = 'mobile';
                                    break;
                                // Both
                                case 2:
                                    $exclude_type = 'both';
                                    break;
                            }
                        }
                    }
                }

                // Exclude from both
                if ($exclude_type === 'both') {
                    $li->outertext = '';
                    continue;
                }

                // Exclude from desktop
                elseif ($exclude_type === 'desktop') {
                    $a = $li->find('a', 0);
                    if (substr_count('current', $li->class) > 0) {
                        $current = 1;
                    } else {
                        $current = 0;
                    }
                    $option_values[$j]['link'] = $a->href;
                    $option_values[$j]['text'] = $a->innertext;
                    $option_values[$j]['current'] = $current;
                    $j++;
                    $li->outertext = '';
                    continue;
                }

                // Exclude from mobile
                elseif ($exclude_type === 'mobile') {
                    // Just leave it be
                    continue;
                }

                // Default
                else {
                    $a = $li->find('a', 0);
                    $current = 0;
                    if (!empty($li->class)) {
                        if (substr_count('current', $li->class) > 0) {
                            $current = 1;
                        } else {
                            $current = 0;
                        }
                    }
                    $option_values[$j]['link'] = $a->href;
                    $option_values[$j]['text'] = $a->innertext;
                    $option_values[$j]['current'] = $current;
                    $j++;
                }
            }

            $secnav = array();
            $secnav['desktop'] = $part->outertext;
            $secnav['mobile'] = $option_values;
            // Transient
            set_mazda_transient('secnav', $secnav);
        }
    }
}

echo $secnav['desktop'];

?>

<div class="row visible-xs-block">
    <div class="col-xs-12">
        <select id="mobileSubMenu" class="form-control">
            <?php foreach ($secnav['mobile'] as $option) : ?>
            <?php echo $option['current']; ?>
            <option value="<?php echo $option['link']; ?>"<?php echo ($option['current'] == 1) ? ' selected="selected"' : ''; ?>><?php echo $option['text']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

