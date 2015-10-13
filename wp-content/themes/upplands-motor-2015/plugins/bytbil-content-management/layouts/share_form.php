<?php $share_form = get_field('share-form', 'options'); ?>

<div class="modal fade" id="shareModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Dela med e-post</h4>
            </div>
            <div class="modal-body">
                <?php echo $share_form; ?>
            </div>
        </div>
    </div>
</div>
