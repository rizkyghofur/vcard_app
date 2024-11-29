<?php

namespace App\Controllers;

class Home extends BaseController {

	/**
	* @var array A standardized array variable to hold view data
	*/
	public $viewData = [];

	public $helpers = ['go_common', 'text', 'auth'];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
		$this->viewData['currentModule'] = 'Dashboard';
		parent::initController($request, $response, $logger);
		$this->viewData['currentLocale'] = $this->request->getLocale();
	}

	/**
	* Index Page for this controller.
	*
	* @return string
	*/
	public function index() {

		$this->viewData['pageTitle'] = 'vCard App';
		$this->viewData['pageSubTitle'] = lang('Basic.global.Dashboard');

		$contactModel = model('App\Models\Admin\ContactModel');

		$this->viewData['totalNrOfContacts'] = $contactModel->getCount();

		// $this->viewData['contactList'] = $contactModel->findAll(5);

		return view('dashboardHome', $this->viewData);
	}
}