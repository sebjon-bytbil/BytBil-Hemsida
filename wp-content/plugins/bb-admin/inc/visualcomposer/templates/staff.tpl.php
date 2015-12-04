<?php if (!empty($employees)) : ?>
    <div class="row">
    <?php foreach ($employees as $employee) : ?>
        <div class="col-sm-<?php echo $row_amount; ?>">
            <div class="employee-card">
                <div class="employee-image">
                    <img src="<?php echo $employee['image']; ?>" >
                </div>
                <div class="employee-info">
                    <h4><?php echo $employee['name']; ?></h4>
                    <p><?php echo $employee['work_title']; ?></p>
                    <div class="employee-buttons">
                        <a href="tel:<?php echo $employee['phone']; ?>" class="btn btn-blue"><i class="ion ion-android-call"></i><?php echo $employee['phone']; ?></a>
                        <a href="mailto:<?php echo $employee['email']; ?>" class="btn btn-white"><i class="ion ion-ios-email-outline"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>