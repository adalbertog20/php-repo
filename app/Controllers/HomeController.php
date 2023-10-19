<?php

namespace App\Controllers;
use App\View;

class HomeController
{
	public function index(): View
	{
		return View::make('index', ['foo'  => 'eso papu']);
	}
	public function upload()
	{
		echo "<pre>";
		var_dump($_FILES);
		echo "</pre>";
		echo exec('whoami');
		$filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
		//move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

		echo "<pre>";
		var_dump(pathinfo($filePath));
		echo "</pre>";
	}
}
