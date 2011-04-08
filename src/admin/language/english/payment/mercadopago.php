<?php
// Heading
$_['heading_title']							= 'Mercadopago con IPN';

// Text
$_['text_payment']							= 'Payment';
$_['text_success']							= 'Exito: Has modificado Mercadopago con IPN!';
$_['text_mercadopago']						= '<a onclick="window.open(\'https://www.mercadopago.com\');" target="_blank"><img src="view/image/payment/mercadopago.png" alt="Mercadopago" title="Mercadopago" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_argentina']						= 'Argentina';
$_['text_brasil']							= 'Brasil';
$_['text_colombia']							= 'Colombia';
$_['text_chile']							= 'Chile';

// Entry
$_['entry_acc_id']							= 'Número de cuenta:<br/><span class="help">Para conocer tu <b>número de cuenta</b> (acc_id), ingresa a <a hre="https://www.mercadopago.com/mla/cartdata" target="_blank">Argentina</a> o <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">Brasil</a> según tu país</span>';
$_['entry_token']							= 'Código validador de seguridad:<br/><span class="help">Para conocer tu <b>código validador de seguridad</b> (enc), ingresa a: <a hre="https://www.mercadopago.com/mla/cartdata" target="_blank">Argentina</a> o <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">Brasil</a> según tu país</span>';
$_['entry_geo_zone']						= 'Geo Zona:';
$_['entry_status']							= 'Estado:';
$_['entry_ipn_status']						= 'Estado del IPN:';
$_['entry_country']							= 'País donde venderá:';
$_['entry_sort_order']						= 'Orden:';

$_['entry_sonda_key']						= 'Token IPN:<br/><span class="help">Para conocer tu <b>token</b> (sonda_key), ingresa a: <a hre="https://www.mercadopago.com/mla/cartdata" target="_blank">Argentina</a> o <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">Brasil</a> según tu país. Esto te permitira saber en tiempo real el estado en el que se encuentra la orden dentro de Mercadopago</span>';
$_['entry_order_status']					= 'Estado del pedido:<br /><span class="help">Seleccione el estado del pedido por defecto</span>';
$_['entry_order_status_completed']			= 'Pedido completado:<br /><span class="help">Seleccione el estado que obtendrá una orden <b>completada</b>. Esto es solo válido si esta activado el IPN</span>';
$_['entry_order_status_pending']			= 'Pedido pendiente:<br /><span class="help">Seleccione el estado que obtendrá una orden <b>pendiente</b>. Esto es solo válido si esta activado el IPN</span>';
$_['entry_order_status_canceled']			= 'Pedido cancelado:<br /><span class="help">Seleccione el estado que obtendrá una orden <b>cancelada</b>. Esto es solo válido si esta activado el IPN</span>';

// Error
$_['error_permission']						= 'Atención: Usted no tiene permisos para poder modificar el modulo Mercadopago!';
$_['error_acc_id']							= 'Su <b>número de cuenta</b> es necesario para el funcionamiento de la pasarela Mercadopago';
$_['error_token']							= 'Su <b>código validador de seguridad</b> es necesario para el funcionamiento de la pasarela Mercadopago';
?>