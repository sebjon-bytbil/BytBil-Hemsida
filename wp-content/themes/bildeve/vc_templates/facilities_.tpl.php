<div class="bb-facilities">

    <h2><?php echo $headline ?></h2>

    <?php foreach($items as $key => $item) { ?>
        <div class="facility">
            <h5><?php echo $item['name']; ?></h5>
            <div class="facility-visiting-address"><?php echo $item['visiting_address']; ?></div>

            <?php if($item['use_postal'] == true) { ?>
                <div class="facility-postal-address">
                    Postadress: <?php echo $item['postal_address']; ?>
                </div>
            <?php } ?>

            <?php if($item['phonenumbers'] != null) { ?>
                <div class="facility-phonenumbers">
                    <?php foreach($item['phonenumbers'] as $phonenumber) { ?>
                        <?php echo $phonenumber['facility-phonenumber-title'] != null ? $phonenumber['facility-phonenumber-title'] . ": " : ''; ?><a href="tel:<?php echo $phonenumber['facility-phonenumber-number']; ?>"><?php echo $phonenumber['facility-phonenumber-number']; ?></a><br>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if($item['emails'] != null) { ?>
                <div class="facility-emails">
                <?php foreach($item['emails'] as $email) { ?>
                    <a href="mailto:<?php echo $email['facility-email-address']; ?>"><?php echo $email['facility-email-title'] == null ? $email['facility-email-address'] : $email['facility-email-title']; ?></a><br>
                <?php } ?>
                </div>
            <?php } ?>

            <?php foreach($item['departments'] as $department) { ?>
                <?php echo $department['facility-department']; ?>
                <?php if($department['facility-department-openhours'] != null) { ?>
                    Öppettider
                    <?php foreach($department['facility-department-openhours'] as $openhours) { ?>
                        <p><?php echo $openhours['facility-department-openhours-day']; ?>: <?php echo $openhours['facility-department-openhours-time']; ?></p>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div><br>
    <?php } ?>
</div>
