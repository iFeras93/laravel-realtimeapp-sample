<?php

namespace App\Http\Controllers;

use App\Events\ProjectStatusUpdated;
use App\Http\Requests\StoreProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        if (!$request->has('user_id'))
            $request->request->set('user_id', auth()->user()->id);
        Project::query()->create($request->only('name', 'user_id', 'status'));
        return redirect('/dashboard')->with(['status' => 'Project has been created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
//        dd($project);
        return view('project_update', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, Project $project)
    {
        $p = Project::query()
            ->where('id', '=', $project->id)
            ->first();
        $p->update($request->only('name', 'user_id', 'status'));
        ProjectStatusUpdated::dispatch($project, auth()->user());
        return redirect('/dashboard')->with(['status' => 'Project has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
