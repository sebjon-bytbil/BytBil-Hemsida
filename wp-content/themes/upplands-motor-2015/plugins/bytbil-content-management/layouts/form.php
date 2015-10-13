<?php

$form_facilities = get_sub_field('content-form-facilities');
$form_brands_tax = get_sub_field('content-form-brands');
$form_departments = get_sub_field('content-form-departments');
$form_form = get_sub_field('content-existing-form');
$form_id = set_wpcf7_array($form_form);

$orig_ID = $orig_ID == null ? get_the_ID() : $orig_ID;

if (!$form_brands_tax || $forms_brands_tax == '') {
    $form_brands_terms = wp_get_post_terms($orig_ID, 'brand');
    if (!empty($form_brands_terms)) {
        $form_brands_tax = $form_brands_terms;
    }
}

if ($form_facilities) {
    ?>

    <script>
        var facilities = [
            <?php
            $items = count($form_facilities);
            $i = 0;
            foreach ($form_facilities as $facility) {
                $name = str_replace('Upplands Motor ', '', $facility->post_title);
                echo "'" . $name . "'";
                if (++$i !== $items) {
                    echo ', ';
                }
            }
            ?>
        ];

        wpcf7forms['<?php echo $form_id; ?>']['facilities'] = facilities;
    </script>

<?php
}

if ($form_brands_tax) {
    $form_brands = array();
    $form_models = array();

    foreach ($form_brands_tax as $tax) {
        if ($tax->parent !== 0) {
            // Model
            $form_parent = get_term_top_most_parent($tax->term_id, 'brand');
            $form_models[] = str_replace($form_parent->name . ' ', '', $tax->name);
        } else {
            // Brand
            $form_brands[] = $tax->name;
        }
    }
    ?>

    <script>
        var brands = [
            <?php
            $items = count($form_brands);
            $i = 0;
            foreach ($form_brands as $brand) {
                echo "'" . $brand . "'";
                if (++$i !== $items) {
                    echo ', ';
                }
            }
            ?>
        ];

        wpcf7forms['<?php echo $form_id; ?>']['brands'] = brands;
    </script>

    <?php
    if (!empty($form_models)) {
        ?>

        <script>
            var models = [
                <?php
                $items = count($form_models);
                $i = 0;
                foreach ($form_models as $model) {
                    echo "'" . $model . "'";
                    if (++$i !== $items) {
                        echo ', ';
                    }
                }
                ?>
            ];

            wpcf7forms['<?php echo $form_id; ?>']['models'] = models;
        </script>

    <?php
    }
}

if ($form_departments) {
    ?>

    <script>
        var departments = [
            <?php
            $items = count($form_departments);
            $i = 0;
            foreach ($form_departments as $department) {
                echo "'" . $department->name . "'";
                if (++$i !== $items) {
                    echo ', ';
                }
            }
            ?>
        ];

        wpcf7forms['<?php echo $form_id; ?>']['departments'] = departments;
    </script>

<?php
}

the_sub_field('content-existing-form');

?>

