<?php echo $header; ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="left"></div>
  <div class="right"></div>
  <div class="heading">
    <h1 style="background-image: url('view/image/payment.png');"><?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <tr>
          <td><span class="required">*</span> <?php echo $entry_acc_id; ?></td>
          <td><input type="text" name="mercadopago_acc_id" value="<?php echo $mercadopago_acc_id; ?>" />
            <?php if ($error_acc_id) { ?>
            <span class="error"><?php echo $error_acc_id; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_token; ?></td>
          <td><input type="text" name="mercadopago_token" value="<?php echo $mercadopago_token; ?>" />
            <?php if ($error_token) { ?>
            <span class="error"><?php echo $error_token; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $entry_order_status; ?></td>
          <td><select name="mercadopago_order_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $mercadopago_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_country; ?></td>
          <td><select name="mercadopago_country" id="country">
              <?php foreach ($countries as $country) { ?>
              <?php if ($country['href'] == $mercadopago_country) { ?>
              <option value="<?php echo $country['href']; ?>" selected="selected" id="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $country['href']; ?>" id="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_geo_zone; ?></td>
          <td><select name="mercadopago_geo_zone_id">
              <option value="0"><?php echo $text_all_zones; ?></option>
              <?php foreach ($geo_zones as $geo_zone) { ?>
              <?php if ($geo_zone['geo_zone_id'] == $mercadopago_geo_zone_id) { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_sort_order; ?></td>
          <td><input type="text" name="mercadopago_sort_order" value="<?php echo $mercadopago_sort_order; ?>" size="1" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="mercadopago_status">
              <?php if ($mercadopago_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
		<tr>
        <td colspan="2" id="ipn"><b style="color: #cc0000;">Ainda não funciona... funcionará na próxima versão!!!</b>
            <table class="form">
                <tr>
                  <td><?php echo $entry_ipn_status; ?></td>
                  <td><select name="mercadopago_ipn_status">
                      <?php if ($mercadopago_ipn_status) { ?>
                      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                      <option value="0"><?php echo $text_disabled; ?></option>
                      <?php } else { ?>
                      <option value="1"><?php echo $text_enabled; ?></option>
                      <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                      <?php } ?>
                    </select></td>
                </tr>
                <tr>
                  <td><?php echo $entry_sonda_key; ?></td>
                  <td><input type="text" name="mercadopago_sonda_key" value="<?php echo $mercadopago_sonda_key; ?>" /></td>
                </tr>
                <tr>
                  <td><?php echo $entry_order_status_completed; ?></td>
                  <td><select name="mercadopago_order_status_id_completed">
                      <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopago_order_status_id_completed) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select></td>
                </tr>
                <tr>
                  <td><?php echo $entry_order_status_pending; ?></td>
                  <td><select name="mercadopago_order_status_id_pending">
                      <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopago_order_status_id_pending) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select></td>
                </tr>
                <tr>
                  <td><?php echo $entry_order_status_canceled; ?></td>
                  <td><select name="mercadopago_order_status_id_canceled">
                      <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['order_status_id'] == $mercadopago_order_status_id_canceled) { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select></td>
                </tr>
          	</table>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<script type="text/javascript"><!--
$(document).ready(function(){
	$('#country').change(function() {
	if ($('#country option:selected').attr('id') == '1' || $('#country option:selected').attr('id') == '2')
		{ 
			$('#ipn').show();
			$('#ipn input').attr('disabled', 'disabled');$('#ipn select').attr('disabled', 'disabled');
		}
		else { 
			$('#ipn').hide(); 
		}
	});
	$('#country').change();
});
--></script>
<?php echo $footer; ?>