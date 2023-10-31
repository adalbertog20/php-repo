<?php

namespace App\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\View;
use App\App;
use App\Models\SignUp;
use PDO;

class HomeController
{
	public function index(): View
	{
		$email = "tilin@gamer.com";
		$name = "Tilin";
		$amount = 200;

		$userModel = new User();
		$invoiceModel = new Invoice();

		$invoiceId = (new SignUp($userModel, $invoiceModel))->register(
			[
				'email' => $email,
				'name' => $name,
			],
			[
				'amount' => $amount,
			]
		);
		return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
	}
}
