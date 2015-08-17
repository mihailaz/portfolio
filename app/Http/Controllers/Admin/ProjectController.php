<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
	/**
	 * @var array
	 */
	protected $rules = [
		'title' => 'required|max:255',
		'description' => 'required',
		'role' => 'required|max:255',
		'skills' => 'required',
		'image' => 'sometimes|image'
	];

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
	    return view('admin.project.create', ['skills_list' => Skill::all()->lists('title', 'id')]);
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

	    $file = $request->file('image');
	    $destination = public_path() . '/images';
	    $image = uniqueFilename($destination, $file->getClientOriginalName(), $file->getClientOriginalExtension());
	    $file->move($destination, $image);

	    $project = Project::create([
		    'title' => $request->get('title'),
		    'description' => $request->get('description'),
		    'role' => $request->get('role'),
		    'image' => implode('/', ['/images', $image]),
	    ]);

	    $project->skills()->sync($request->get('skills'));

	    return redirect()->back()->with('message', 'Project success created');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.project.edit', [
			'project' => Project::findOrFail($id),
			'skills_list' => Skill::all()->lists('title', 'id'),
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
		$project = Project::findOrFail($id);
		$file = $request->file('image');

		if ($file) {
			$destination = implode('/', [public_path(), 'images']);
			$image = uniqueFilename($destination, $file->getClientOriginalName(), $file->getClientOriginalExtension());
			$file->move($destination, $image);

			$project->image = implode('/', ['/images', $image]);
		}

		$project->title = $request->get('title');
		$project->description = $request->get('description');
		$project->role = $request->get('role');
		$project->save();
		$project->skills()->sync($request->get('skills'));

		return redirect()->back()->with('message', 'Project success updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = Project::findOrFail($id);
		$project->delete();
		return redirect()->back()->with('message', 'Project success destroyed');
	}
}
