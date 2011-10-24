<?php
class ControllerPaymentMercadopago extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/mercadopago');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('mercadopago', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_mercadopago'] = $this->language->get('text_mercadopago');

		$this->data['entry_acc_id'] = $this->language->get('entry_acc_id');
		$this->data['entry_token'] = $this->language->get('entry_token');
		$this->data['entry_token'] = $this->language->get('entry_token');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_country'] = $this->language->get('entry_country');
		$this->data['entry_sonda_key'] = $this->language->get('entry_sonda_key');
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');
		$this->data['entry_ipn_status'] = $this->language->get('entry_ipn_status');
		$this->data['entry_order_status_completed'] = $this->language->get('entry_order_status_completed');
		$this->data['entry_order_status_pending'] = $this->language->get('entry_order_status_pending');
		$this->data['entry_order_status_canceled'] = $this->language->get('entry_order_status_canceled');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['acc_id'])) {
			$this->data['error_acc_id'] = $this->error['acc_id'];
		} else {
			$this->data['error_acc_id'] = '';
		}

 		if (isset($this->error['token'])) {
			$this->data['error_token'] = $this->error['token'];
		} else {
			$this->data['error_token'] = '';
		}

		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_payment'),
      		'separator' => ' :: '
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=payment/mercadopago&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/mercadopago&token=' . $this->session->data['token'];

		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];

		if (isset($this->request->post['mercadopago_acc_id'])) {
			$this->data['mercadopago_acc_id'] = $this->request->post['mercadopago_acc_id'];
		} else {
			$this->data['mercadopago_acc_id'] = $this->config->get('mercadopago_acc_id');
		}

		if (isset($this->request->post['mercadopago_token'])) {
			$this->data['mercadopago_token'] = $this->request->post['mercadopago_token'];
		} else {
			$this->data['mercadopago_token'] = $this->config->get('mercadopago_token');
		}

		if (isset($this->request->post['mercadopago_status'])) {
			$this->data['mercadopago_status'] = $this->request->post['mercadopago_status'];
		} else {
			$this->data['mercadopago_status'] = $this->config->get('mercadopago_status');
		}

		$this->data['countries'] = $this->getCountries();
		
		if (isset($this->request->post['mercadopago_country'])) {
			$this->data['mercadopago_country'] = $this->request->post['mercadopago_country'];
		} else {
			$this->data['mercadopago_country'] = $this->config->get('mercadopago_country');
		}

		if (isset($this->request->post['mercadopago_order_status_id'])) {
			$this->data['mercadopago_order_status_id'] = $this->request->post['mercadopago_order_status_id'];
		} else {
			$this->data['mercadopago_order_status_id'] = $this->config->get('mercadopago_order_status_id');
		}

		if (isset($this->request->post['mercadopago_geo_zone_id'])) {
			$this->data['mercadopago_geo_zone_id'] = $this->request->post['mercadopago_geo_zone_id'];
		} else {
			$this->data['mercadopago_geo_zone_id'] = $this->config->get('mercadopago_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['mercadopago_sort_order'])) {
			$this->data['mercadopago_sort_order'] = $this->request->post['mercadopago_sort_order'];
		} else {
			$this->data['mercadopago_sort_order'] = $this->config->get('mercadopago_sort_order');
		}

		if (isset($this->request->post['mercadopago_sonda_key'])) {
			$this->data['mercadopago_sonda_key'] = $this->request->post['mercadopago_sonda_key'];
		} else {
			$this->data['mercadopago_sonda_key'] = $this->config->get('mercadopago_sonda_key');
		}

		if (isset($this->request->post['mercadopago_order_status_id_completed'])) {
			$this->data['mercadopago_order_status_id_completed'] = $this->request->post['mercadopago_order_status_id_completed'];
		} else {
			$this->data['mercadopago_order_status_id_completed'] = $this->config->get('mercadopago_order_status_id_completed');
		}

		if (isset($this->request->post['mercadopago_order_status_id_pending'])) {
			$this->data['mercadopago_order_status_id_pending'] = $this->request->post['mercadopago_order_status_id_pending'];
		} else {
			$this->data['mercadopago_order_status_id_pending'] = $this->config->get('mercadopago_order_status_id_pending');
		}

		if (isset($this->request->post['mercadopago_order_status_id_canceled'])) {
			$this->data['mercadopago_order_status_id_canceled'] = $this->request->post['mercadopago_order_status_id_canceled'];
		} else {
			$this->data['mercadopago_order_status_id_canceled'] = $this->config->get('mercadopago_order_status_id_canceled');
		}
		
		if (isset($this->request->post['mercadopago_ipn_status'])) {
			$this->data['mercadopago_ipn_status'] = $this->request->post['mercadopago_ipn_status'];
		} else {
			$this->data['mercadopago_ipn_status'] = $this->config->get('mercadopago_ipn_status');
		}
		
		$this->load->model('localisation/order_status');

		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$this->template = 'payment/mercadopago.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function getCountries() {
 		$countries = array();

   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mla/buybutton',
       		'name'      => $this->language->get('text_argentina'),
			'id'		=> '1'
   		);

   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlb/buybutton',
       		'name'      => $this->language->get('text_brasil'),
			'id'		=> '2'
   		);
		
   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mco/buybutton',
       		'name'      => $this->language->get('text_colombia'),
			'id'		=> '3'
   		);
		
   		$countries[] = array(
       		'href'      => 'https://www.mercadopago.com/mlc/buybutton',
       		'name'      => $this->language->get('text_chile'),
			'id'		=> '4'
   		);
		
		return $countries;
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/mercadopago')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['mercadopago_acc_id']) {
			$this->error['acc_id'] = $this->language->get('error_acc_id');
		}

		if (!$this->request->post['mercadopago_token']) {
			$this->error['token'] = $this->language->get('error_token');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>