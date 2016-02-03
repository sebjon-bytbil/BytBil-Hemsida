<?php if (!empty($employees)) : ?>
    <div class="row bb-employees">
    <?php if ($dep_dropdown) : ?>
        <label class="selectpicker-label">Välj avdelning</label>
        <select class="bb-departments-<?php echo $blockid; ?>">
            <option value="all">Alla avdelningar</option>
            <?php foreach ($departments as $department) : ?>
                <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>

        <div class="shuffle-grid-<?php echo $blockid; ?> shuffle--container shuffle--fluid shuffle">
        <?php foreach ($employees as $employee) : ?>
            <?php
            if ($dep_dropdown) {
                $department_string = '';
                foreach ($employee['departments'] as $department) {
                    $department_string .= $department . ' ';
                }
            }
            ?>

            <div class="picture-item bb-employee-card-<?php echo $blockid; ?> col-sm-<?php echo $row_amount; ?>"<?php echo $dep_dropdown ? ' data-groups=\'["' . trim($department_string) . '"]\'' : ''; ?>>
                <figure>
                    <div class="employee-card">
                        <div class="employee-image">
                            <img src="<?php echo $employee['image']; ?>">
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
                </figure>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <?php if ($dep_dropdown) : ?>
    <script>
    jQuery(document).ready(function() {
        var $select = $('.bb-departments-<?php echo $blockid; ?>');
        $select.selectpicker();

        new BBShuffle.Shuffle.init('.shuffle-grid-<?php echo $blockid; ?>', $select, '.bb-employee-card-<?php echo $blockid; ?>', true);
    });
    </script>
    <?php endif; ?>
<?php endif; ?>