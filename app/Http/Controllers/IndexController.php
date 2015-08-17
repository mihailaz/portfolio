<?php
/**
 * User: Michael Lazarev <mihailaz.90@gmail.com>
 * Date: 15.08.15
 * Time: 23:57
 */

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use App\User;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$admin = User::admin()->first();

		if (!$admin){
			return redirect('/register');
		}

		$projects = Project::with('skills')->get();
		$categories = Category::with('skills')->get();

		return view('index', [
			'admin' => $admin,
			'projects' => $projects,
			'categories' => $categories,
		]);
	}
} 