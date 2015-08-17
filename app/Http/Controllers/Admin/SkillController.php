<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
	/**
	 * @var array
	 */
	protected $rules = [
		'title' => 'required|max:255',
		'category_id' => 'required|exists:categories,id',
	];

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    return view('admin.skill.create', ['categories_list' => Category::all()->lists('title', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, $this->rules);
	    Skill::create($request->all());
	    return redirect()->back()->with('message', 'Skill success created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
	    return view('admin.skill.edit', [
		    'skill' => Skill::findOrFail($id),
		    'categories_list' => Category::all()->lists('title', 'id'),
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
	    $this->validate($request, $this->rules);
	    $skill = Skill::findOrFail($id);
	    $skill->title = $request->get('title');
	    $skill->category_id = $request->get('category_id');
	    $skill->save();
	    return redirect()->back()->with('message', 'Skill success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
	    $skill = Skill::findOrFail($id);
	    $skill->delete();
	    return redirect()->back()->with('message', 'Skill success destroyed');
    }
}
