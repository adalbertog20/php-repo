<?php

namespace App\Controllers;

use App\View;
use App\App;
use PDO;

class HomeController
{
	public function index(): View
	{
		$db = App::db();

		$email = "john@doe2.com";
		$name = "John Doe";
		$amount = 25;

		try {
			$db->beginTransaction();

			$newUserStmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at) VALUES (?, ?, 1, NOW())');

			$newInvoicesStmt = $db->prepare('INSERT INTO invoices (amount, user_id) VALUES (?, ?)');

			$newUserStmt->execute([$email, $name]);
			$userId = (int) $db->lastInsertId();
			$newInvoicesStmt->execute([$amount, $userId]);

			$db->commit();
		} catch (\Throwable $e) {
			if ($db->inTransaction()) {
				$db->rollBack();
			}
		}

		$fetchStmt = $db->prepare(
			'SELECT invoices.id AS invoice_id, amount, user_id, full_name
			 FROM invoices
			 INNER JOIN users ON user_id = users.id
			 WHERE email = ?'
		);
		$fetchStmt->execute([$email]);

		return View::make('index');
	}
}
