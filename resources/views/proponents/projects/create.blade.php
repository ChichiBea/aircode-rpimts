@extends('layouts.template')
@section('title', 'Create Project')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create New Project</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li> --}}
              </ol>
            </div>
          </div>
        </div>
      </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
    <!-- <h1>Research Project Form</h1>
        <p>Please fill in the following information:</p> -->
                  <form action="{{ route('proponents.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="projname">Project Name</label>
                      <input type="text" id="projname" name="projname" class="form-control" 
                      placeholder="Working title for the project">
                    </div>
                    <div class="form-group">
                      <label for="researchgroup">Research Group</label>
                      <input type="text" id="researchgroup" name="researchgroup" class="form-control"
                      placeholder="Name of research group">
                    </div>
                    <div class="form-group">
                      <label for="authors">Author(s)</label>
                      <input type="text" id="authors" name="authors" class="form-control"
                      placeholder="Names of Author">
                    </div>
                    <div class="form-group">
                      <label for="introduction">Introduction</label>
                      <textarea id="introduction" name="introduction" class="form-control" rows="4"
                      placeholder="Briefly describe the key aspects of what you will be investigating."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="aims_and_objectives">Aims and Objectives</label>
                      <textarea id="aims_and_objectives" name="aims_and_objectives" class="form-control" rows="4"
                      placeholder="What are the overall aims of the work? What objectives are necessary to meet the aims?"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="background">Background</label>
                      <textarea id="background" name="background" class="form-control" rows="4"
                      placeholder="Brief review of literature in the area of interest. Describe what research lyas in the groundwork for your topic."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="expected_research_contribution">Expected Research Contribution</label>
                      <textarea id="expected_research_contribution" name="expected_research_contribution" class="form-control" rows="4"
                      placeholder="Why is the topi/creative work important? Describe how the research may be novel and it's impact on the descipline."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="proposed_methodology">The Proposed Methodology</label>
                      <textarea class="form-control" rows="4"
                      placeholder="Approach or methodology to be used in the research, the materials/equipment you intend to use, your space/laboratory/studio requirements." 
                      id="proposed_methodology" name="proposed_methodology"></textarea>
                    </div>
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date">
                    <div class="form-group">
                        <label>Work Plan:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="reservation" name="reservation"
                          placeholder="An initial plan for completion with annual milestones (eg. over 3 years).">
                        </div>
                    <div class="form-group">
                        <label>Work Plan:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="workplan" name="workplan"
                          placeholder="An initial plan for completion with annual milestones (eg. over 3 years).">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Resources</label>
                        <textarea class="form-control" rows="4"
                        placeholder="Provide details of major resources required for you to carry out your research project. What significant resources are required for the success of your proposed projec? (e.g travel, equipment)." 
                        id="resources" name="resources"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Referencences</label>
                        <textarea id="references"  name="references" class="form-control" rows="4"
                        placeholder="A short bibliography of the cited literature."></textarea>
                      </div>
                      <a href="#" class="btn btn-secondary">Cancel</a>
                      <input type="submit" value="Create new Project" class="btn btn-success float-right">
                  </div>
            </form>
            </div>
          </div>
        </div>
      </section>

  </div>
    @include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
</html>
