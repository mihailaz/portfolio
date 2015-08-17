<?php
/**
 * User: Michael Lazarev <mihailaz.90@gmail.com>
 * Date: 16.08.15
 * Time: 12:19
 */

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\User;

/**
 * Class ContactsController
 * @package App\Http\Controllers
 */
class ContactsController extends Controller
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->middleware(VerifyCsrfToken::class);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show()
	{
		$admin = User::admin()->first();

		if (!$admin){
			abort(404);
		}

		return response()->json([
			'email' => $admin->email,
			'phone' => $admin->phone,
		]);
	}
} 