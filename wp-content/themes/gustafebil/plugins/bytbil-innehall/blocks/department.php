<?php
$department = get_sub_field("content-department");
?>

<div>
    <h3><?php echo $department["facility-department"] ?></h3>
    <?php if (!!$department["facility-department-phonenumber"]) : ?>
        <span class="facility_phonenumber_title">
            <strong>Telefonnr.</strong>
        </span>
        <span class="facility_phonenumber_number">
            <a href="tel: <?php echo $department["facility-department-phonenumber"] ?>"><?php echo $department["facility-department-phonenumber"]; ?></a>
        </span><br/>
    <?php endif; ?>

    <?php if (!!$department["facility-department-fax"]) : ?>
        <span class="facility_phonenumber_title">
            <strong>Fax</strong>
        </span>
        <span class="facility_phonenumber_number">
            <?php echo $department["facility-department-fax"]; ?>
        </span><br/>
    <?php endif; ?>

    <?php if (!!$department["facility-department-email"]) : ?>
        <span class="facility_phonenumber_title">
            <strong>Email</strong>
        </span>
        <span class="facility_phonenumber_number">
            <a href="mailto: <?php echo $department["facility-department-email"]; ?>"><?php echo $department["facility-department-email"]; ?></a>
        </span><br/>
    <?php endif; ?>

    <?php if (is_array($department["facility-department-openhours"])) : ?>
        <?php foreach ($department["facility-department-openhours"] as $openhour) : ?>
            <span class="facility_phonenumber_title">
                <strong><?php echo $openhour["facility-department-openhours-day"]; ?></strong>
            </span>
            <span class="facility_phonenumber_number">
                <?php echo $openhour["facility-department-openhours-time"]; ?>
            </span><br/>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
