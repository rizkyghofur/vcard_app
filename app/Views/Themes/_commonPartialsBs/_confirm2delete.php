<?php if (config('Basics')->theme['name'] == 'Bootstrap5') { ?>
    <div class="modal fade" id="confirm2delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirm2deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm2deleteLabel"><?= lang('Basic.global.deleteConfirmation') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= lang('Basic.global.deleteConfirmationQuestion') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><?= lang('Basic.global.deleteConfirmationCancel') ?></button>
                    <a class="btn btn-danger btn-confirm"> <?= lang('Basic.global.deleteConfirmationButton') ?> </a>
                </div><!--//.modal-footer -->
            </div><!--//.modal-content -->
        </div><!--//.modal-dialog -->
    </div><!--//.modal -->
    <div class="modal fade" id="shareVCardModal" tabindex="-1" aria-labelledby="shareVCardModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareVCardModalLabel">Share vCard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="vcfFile" class="form-label">VCF File</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="vcfFile" value="" readonly disabled>
                            <button type="button" class="btn btn-primary" onclick="copyToClipboard('vcfFile')">Copy</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="qrCode" class="form-label">QR Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="qrCode" value="" readonly disabled>
                            <button type="button" class="btn btn-primary" onclick="copyToClipboard('qrCode')">Copy</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div id="confirm2delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm2deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm2deleteLabel"><?= lang('Basic.global.deleteConfirmation') ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= lang('Basic.global.deleteConfirmationQuestion') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('Basic.global.deleteConfirmationCancel') ?></button>
                    <a class="btn btn-danger btn-confirm"> <?= lang('Basic.global.deleteConfirmationButton') ?> </a>
                </div><!--//.modal-footer -->
            </div><!--//.modal-content -->
        </div><!--//.modal-dialog -->
    </div><!--//.modal -->
<?php } ?>