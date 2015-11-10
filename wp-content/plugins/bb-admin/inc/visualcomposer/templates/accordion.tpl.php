<div class="bb-accordion">
    <div class="panel-group" id="accordion">
    <?php foreach ($accordions as $i => $accordion) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $accordion['headline']; ?></a>
                </h4>
            </div>
            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo $accordion['accordion_content']; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
