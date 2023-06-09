<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\ProjectReviewerModel;

class ProjectsController extends Controller
{
    public function selectReviewers()
    {
    $users = UsersModel::where('role', 4)->get();

    return view('proponents.projects.reviewer', compact('users'));
    }

    public function index()
    {
        $records = ProjectsModel::orderBy('created_at', 'ASC')->get();
        $reviewers = User::whereIn('id', ProjectReviewerModel::pluck('user_id'))->get();
    
        return view('proponents.projects.index', compact('records','reviewers'));
    }
    
    
    public function create()
    {
        $project = new ProjectsModel(); 
    
        $users = User::all();
    
        Notification::send($users, new ProjectNotification($project->id));

        return view('proponents.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'projname' => 'required',
            'researchgroup' => 'required',
                        'authors' => 'required',
                        'introduction' => 'required',
                        'aims_and_objectives' => 'required',
                        'background' => 'required',
                        'expected_research_contribution' => 'required',
                        'proposed_methodology' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'workplan' => 'required',
                        'resources' => 'required',
                        'references' => 'required',
        ]);

        $projects = new ProjectsModel;
        $projects->projname = $request->projname;
        $projects->status = 'under evaluation';
        $projects->researchgroup = $request->researchgroup;
            $projects->authors = $request->authors;
            $projects->introduction = $request->introduction;
            $projects->aims_and_objectives = $request->aims_and_objectives;
            $projects->background = $request->background;
            $projects->expected_research_contribution = $request->expected_research_contribution;
            $projects->proposed_methodology = $request->proposed_methodology;
            $projects->start_date = $request->start_date;
            $projects->end_date = $request->end_date;
            $projects->workplan = $request->workplan;
            $projects->resources = $request->resources;
            $projects->references = $request->references;

        $projects->save();

        return redirect()->route('projects')->with('success', 'Data Successfully Added!');
    }

    public function storeReviewer(Request $request)
    {
        $validatedData = $request->validate([
            'reviewers' => 'required|array',
            'reviewers.*' => 'exists:users,id',
        ]);
    
        $projectId = 1; // Replace with the actual project ID you want to associate the reviewers with
    
        $project = ProjectsModel::findOrFail($projectId);
    
        $project->reviewers()->attach($validatedData['reviewers']);
    
        // Redirect or return a response as needed
        return redirect()->route('projects')->with('success', 'Data Successfully Added!');
    }




    public function show($id)
    {
        $projects = ProjectsModel::findOrFail($id);


        return view('proponents.projects.show', compact('projects'));
    }

    public function edit($id)
    {
        $reviewers = UsersModel::where('role', 4)->get();
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.edit', compact('projects', 'reviewers'));
    }


    public function update(Request $request, $id)
    {
        $project = ProjectsModel::findOrFail($id);
        $project->status = $request->input('update_status');
        $project->save();

        return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
        
    }

    // public function update(Request $request, $id)
    // {
    //     $projects = ProjectsModel::findOrFail($id);

    //     // Check the user's role
    //     $userRole = Auth::user()->role;

    //     if ($userRole === 'director' || $userRole === 'staff') {
    //         // Update all attributes except 'status'
    //         $projects->fill($request->except('status'));
    //     } elseif ($userRole === 'researcher') {
    //         // Only update the 'status' attribute
    //         $projects->status = $request->input('status');
    //     }

    //     $projects->save();

    //     return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
    // }


    public function destroy($id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();

        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }

    public function updateStatus(Request $request, Project $project)
    {
        $project->status = $request->input('status');
        $project->save();
    
        // Rest of the code
    }
    

}
