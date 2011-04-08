<?php
// Heading
$_['heading_title']							= 'Mercadopago com IPN';

// Text
$_['text_payment']							= 'Pagamento';
$_['text_success']							= 'Sucesso: Você alterou o módulo Mercadopago!';
$_['text_mercadopago']						= '<a onclick="window.open(\'http://www.mercadopago.com/mp-brasil/\');" target="_blank"><img src="view/image/payment/mercadopago.png" alt="Mercadopago" title="Mercadopago" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_argentina']						= 'Argentina';
$_['text_brasil']							= 'Brasil';
$_['text_colombia']							= 'Colômbia';
$_['text_chile']							= 'Chile';

// Entry
$_['entry_acc_id']							= 'Número da conta:<br/><span class="help">Para saber qual seu <b>Número da conta (acc_id)</b>, clique <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">aqui</a>.</span>';
$_['entry_token']							= 'Código validador de segurança:<br/><span class="help">Para saber qual seu <b>Código validador de segurança (enc)</b>, clique <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">aqui</a>.</span>';
$_['entry_geo_zone']						= 'Zona Geográfica:';
$_['entry_status']							= 'Situação:';
$_['entry_ipn_status']						= 'Situação do IPN:';
$_['entry_country']							= 'País do Vendedor:';
$_['entry_sort_order']						= 'Ordem:';
$_['entry_sonda_key']						= 'Token IPN:<br/><span class="help">Para saber qual seu <b>Token (sonda_key)</b>, clique <a hre="https://www.mercadopago.com/mlb/cartdata" target="_blank">aqui</a>. Isso permitirá que você saiba em tempo real qual a situação do pagamento dentro de Mercadopago.</span>';
$_['entry_order_status']					= 'Situação padrão da venda:<br /><span class="help">Selecione a situação padrão da venda.</span>';
$_['entry_order_status_completed']			= 'Situação quando completa:<br /><span class="help">Selecione a situação quando a venda foi <b>completada</b>. Só é válido se o IPN estiver ativado.</span>';
$_['entry_order_status_pending']			= 'Situação quando pendente:<br /><span class="help">Seleccione el estado que obtendrá una orden <b>pendiente</b>. Esto es solo válido si esta activado el IPN</span>';
$_['entry_order_status_canceled']			= 'Situação quando cancelada:<br /><span class="help">Seleccione el estado que obtendrá una orden <b>cancelada</b>. Esto es solo válido si esta activado el IPN</span>';

// Error
$_['error_permission']						= 'Atenção: Você não tem permissão para modificar o módulo Mercadopago!';
$_['error_acc_id']							= 'Atenção: O <b>Número da conta</b> é de preenchimento obrigatório!';
$_['error_token']							= 'Atenção: O <b>Código validador de segurança</b> é de preenchimento obrigatório!';
?>