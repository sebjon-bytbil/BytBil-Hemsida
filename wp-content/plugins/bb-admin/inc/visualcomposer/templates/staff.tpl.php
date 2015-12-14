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
                    <?php if (isset($employee['phone']) && $employee['phone'] !== '') : ?>
                        <a href="tel:<?php echo $employee['phone']; ?>" class="btn btn-blue"><i class="ion ion-android-call"></i><?php echo $employee['phone']; ?></a>
                    <?php endif; ?>
                    <?php if (isset($employee['email']) && $employee['email'] !== '') : ?>
                        <a href="mailto:<?php echo $employee['email']; ?>" class="btn btn-white"><i class="ion ion-ios-email-outline"></i></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>