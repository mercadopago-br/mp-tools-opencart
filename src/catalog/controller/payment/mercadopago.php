<?php
class ControllerPaymentMercadopago extends Controller {

	private $error;
	private $order_info;

	protected function index() {
    	$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');

		if ($this->config->get('mercadopago_country')) {
			$this->data['action'] = $this->config->get('mercadopago_country');
		}

		$this->load->model('checkout/order');

		$this->language->load('payment/mercadopago');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		//Cambio el código ISO-3 de la moneda por el que se les ocurrio poner a los de mercadopago!!!
		switch($order_info['currency']) {
			case"ARS":
				$currency = 'ARG';
				break;
			case"BRL":
				$currency = 'REA';
				break;
			case"MXN":
				$currency = 'MEX';
				break;
			case"CLP":
				$currency = 'CHI';
				break;
			default:
				$currency = 'USD';
				break;
		}

		$currencies = array('ARG','REA','MEX','CHI');
		if (!in_array($currency, $currencies)) {
			$currency = '';
			$this->data['error'] = $this->language->get('currency_no_support');
		}

		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['url_cancel'] = HTTPS_SERVER . 'index.php?route=checkout/payment';
		} else {
			$this->data['url_cancel'] = HTTPS_SERVER . 'index.php?route=checkout/guest_step_2';
		}

		$this->data['acc_id'] = $this->config->get('mercadopago_acc_id');
		$this->data['enc'] = $this->config->get('mercadopago_token');
		$this->data['item_id'] = $this->config->get('config_name') . ' - #' . $order_info['order_id'];
		
		$products = '';
		
		foreach ($this->cart->getProducts() as $product) {
    		$products .= $product['quantity'] . ' x ' . $product['name'] . ', ';
    	}
		
		$this->data['name'] = substr($products,0,70) . '...';
		$this->data['currency'] = $currency;
		$this->data['price'] = $this->currency->format($order_info['total'], $order_info['currency'], $order_info['value'], FALSE);
		$this->data['url_process'] = HTTPS_SERVER . 'index.php?route=payment/mercadopago/callback';
		$this->data['url_succesfull'] = HTTPS_SERVER . 'index.php?route=payment/mercadopago/callback';
		$this->data['seller_op_id'] = str_repeat('0', 20 - strlen($order_info['order_id'])) . $order_info['order_id'];
		
		$this->load->library('encryption');
		
		$encryption = new Encryption('19061999'); //Fecha en la que Instituto le gano la final a Chacarita por el ascenso a Primera, si esto, les juro no funciona!!!
				
		$this->data['extra_part'] = $encryption->encrypt($order_info['order_id']);

		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/payment';
		} else {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/guest_step_2';
		}

		$this->id = 'payment';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/mercadopago.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/mercadopago.tpl';
		} else {
			$this->template = 'default/template/payment/mercadopago.tpl';
		}

		$this->render();
	}

	public function callback() {
		
		$this->load->model('checkout/order');
		
		$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('mercadopago_order_status_id'));
		
		$this->redirect(HTTP_SERVER . 'index.php?route=checkout/success');
	}
}
?>