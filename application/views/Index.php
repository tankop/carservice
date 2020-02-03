<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Tankó Péter
 */
?>
<script type="text/javascript">
    var BASE_URL = "<?=base_url()?>";
    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
    var errorTitle = '<?= lang('default.00021'); ?>';
    var errorMsg1 = '<?= lang('default.00022'); ?>';
    var errorMsg2 = '<?= lang('default.00023'); ?>';
    var errorMsg3 = '<?= lang('default.00024'); ?>';
</script>
<div class="container-fluid">
    <h1 class="text-center mt-4 mb-4"><?=lang('default.00019');?></h1>
    <div class="row mb-4">
        <div class="col-12 col-md-4 mx-auto">
            <div class="form-group">
                <label for="client-name"><?=lang('default.00017');?></label>
                <input type="text" class="form-control" id="client-name">
            </div>
            <div class="form-group">
                <label for="client-id-card"><?=lang('default.00018');?></label>
                <input type="number" class="form-control" id="client-id-card">
            </div>
            <button type="button" class="btn btn-primary float-right" onclick="carservice.checkSearchField()"><?=lang('default.00020');?></button>
        </div>
    </div>
    <div id="result">
        <?php
        $this->load->view('ClientTable');
        ?>
    </div>
</div>

<script type="text/javascript">

</script>