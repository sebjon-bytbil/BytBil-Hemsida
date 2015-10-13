<?php
/*
Template Name: Personallista : Bild + URL
*/

get_header();

$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'employee',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);

$employees = get_posts( $args );
?>

<main>
<div class="container-fluid wrapper">

<?php
foreach ($employees as $employee){
    ?>
    <div class="row">
        
        <div class="col-xs-12 col-sm-3 col-md-2">
            <?php
            $image = get_field('employee-image', $employee->ID);
            if ($image) {
                $image_url = $image['url'];
            } else {
                $image_url = '/wp-content/themes/upplands-motor/images/employee-placeholder.png';
            }
            ?>
            <img src="<?php echo $image_url; ?>">
        </div>
        
        <style>
            table td {
                padding-right: 20px;
            }
        </style>
        <div class="col-xs-12 col-sm-9 col-md-10">
            <h3><?php echo $employee->post_title ?></h3>
            <table>
                <tr>
                    <td class="bold">Titel</td>
                    <td><?php echo get_field('employee-work-title', $employee->ID); ?></td>
                </tr>
                <tr>
                    <td class="bold">E-post</td>
                    <td><?php echo get_field('employee-email', $employee->ID); ?></td>
                </tr>
                <tr>
                    <td class="bold">Telefon</td>
                    <td><?php echo get_field('employee-phone', $employee->ID); ?></td>
                </tr>
                <tr>
                    <td class="bold">Bild URL</td>
                    <td><?php echo $image_url; ?></td>
                </tr>
            </table>
        </div>        
    
    </div>
    <?php
}
?>    
</div>
</main>