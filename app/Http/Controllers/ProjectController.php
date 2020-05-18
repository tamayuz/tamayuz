<?php

namespace App\Http\Controllers;

use App\Project;
use App\season;
use App\StudyMajor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {

        return view('project.index', [
            'projects' => Project::where('is_accepted', true)->get(),
        ]);
    }

    public function create()
    {
        return view('project.create', [
            'study_majors' => StudyMajor::all(),
            'seasons' => season::all(),


        ]);
    }

    public function store(Request $request)
    {
        $this->validateData($request);
        $project = new Project($request->toArray());
        $project->user_id = auth()->user()->id;
        if (isset($request->image_src)) {
            $image = $request->file('image_src');
            $path = Storage::put('/public/project_images', $image, 'public');
            $path = str_replace('public', '/storage', $path);
            $project->image_src = $path;
        } else {

            $project->image_src = "/images/D_Article.png";

        }


        $project->save();
        return redirect(route('projects.index', app()->getLocale()));
    }


    public function show($a, Project $project)
    {
        return view('project.show', [
            'project' => $project,


        ]);
    }

    public function edit($a, Project $project)
    {
        return view('project.edit', [
            'project' => $project,
            'study_majors' => StudyMajor::all()

        ]);
    }

    public function update($q, Request $request, Project $project)
    {

        $this->authorize('updateProject', $project);
        $date = $this->validateData($request);
        $project->update($date);
        $project->save();
        return view('project.show', [
            'project' => $project

        ]);

    }

    public function destroy($a, Project $project)
    {
        $this->authorize('deleteProject');

        $path = $project->image_src;
        $path = str_replace('storage', 'public', $path);

        Storage::delete($path);
        $project->delete();
        return back();
    }

    public function accept($a, Project $project)
    {

        $this->authorize('full_access');
        $project->is_accepted = true;
        $project->save();
        return back();
    }

    public function managerIndex()
    {
        $this->authorize('full_access');

        return view('project.manage', [
            'accepted_projects' => Project::latest()->where('is_accepted', true)->get(),
            'not_accepted_projects' => Project::latest()->where('is_accepted', false)
                ->orWhere('is_accepted', null)
                ->get()
        ]);

    }


    public function validateData(Request $request)
    {

        return $request->validate([
            'title' => 'required',
            'study_major_id' => 'required|exists:study_majors,id',
            'season_id' => 'required|exists:seasons,id',
            'university' => 'required',
            'description' => 'required',
            'image_src' => 'nullable|image|mimes:jpeg,png,jpg|max:512',
            'video_src' => 'nullable|URL|max:4096',
            'powerpoint_src' => 'nullable|mimes:pptx,ppt|max:4096',

        ]);


    }

}
