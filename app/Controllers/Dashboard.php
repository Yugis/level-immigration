<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->data = [];
	}

	public function index()
	{
		return view('dashboard/index', $this->data);
	}

	//--------------------------------------------------------------------

}
