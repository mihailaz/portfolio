<?php
/**
 * User: Michael Lazarev <mihailaz.90@gmail.com>
 * Date: 16.08.15
 * Time: 17:04
 */

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{
	/**
	 * @var array
	 */
	protected $rules = ['title' => 'required|max:255'];

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.category.create');
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);
		Category::create($request->all());
		return redirect()->back()->with('message', 'Category success created');
	}

	/**
	 * @param int $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		return view('admin.category.edit', ['category' => Category::findOrFail($id)]);
	}

	/**
	 * @param Request $request
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, $this->rules);
		$category = Category::findOrFail($id);
		$category->title = $request->get('title');
		$category->save();
		return redirect()->back()->with('message', 'Category success updated');
	}

	/**
	 * @param int $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();
		return redirect()->back()->with('message', 'Category success destroyed');
	}
}