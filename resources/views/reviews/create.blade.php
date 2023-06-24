@extends('layouts.template')

@section('title', 'Reviews')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- navbar  -->
@include('layouts.topnav')
<!-- / navbar  -->

  <!-- Main Sidebar Container -->
    @include('layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1>Data Tables</h1> --}}
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li> --}}
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Reviews</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <br>
                    <label for="inputText">Review Date</label>
                    <input type="date" class="form-control"  id="reviewdate" name="reviewdate">
                    <br>
                    <label for="inputText">Review Comments</label>
                    <input type="text" class="form-control"  id="reviewcomments" name="reviewcomments">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>


  </div>
  <!-- /.content-wrapper -->
    @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>






























