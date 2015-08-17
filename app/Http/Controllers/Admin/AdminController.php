<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Project;
use App\Skill;
use Illuminate\Support\Facades\Request;

/**
 * Class Admin
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$admin = Request::user();
		$projects = Project::all();
		$categories = Category::all();
		$skills = Skill::all();

		return view('admin.index', [
			'admin' => $admin,
			'projects' => $projects,
			'categories' => $categories,
			'skills' => $skills,
		]);
	}
}
