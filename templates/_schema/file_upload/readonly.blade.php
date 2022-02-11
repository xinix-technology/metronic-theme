<filereadonly data-url="<?php echo URL::base('') ?>">
    <div class="input-group">
        <input type="text" class="form-control form-control-solid" readonly="readonly" value="<?php echo (!empty($value['name'])?$value['name']:'')?>" />
        <?php if(count($value) > 0): ?>
            <input type="hidden"  value='<?php echo json_encode($value) ?>'/>
        <?php else :?>
            <input type="hidden" />
        <?php endif ?>

        <span class="input-group-append">
            <button class="btn btn-icon-only btn-primary btn-download" type="button"><i class="la la-file-download"></i></button>
        </span>
    </div>
</filereadonly>