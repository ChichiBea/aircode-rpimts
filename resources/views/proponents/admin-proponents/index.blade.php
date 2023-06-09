@extends('layouts.template')
@section('title', 'Call for Proposals')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('layouts.topnav')
@include('layouts.sidebar')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <!-- resources/views/documents/index.blade.php -->
@foreach ($proponents as $proponent)
    <p>{{ $proponent->title }} - {{ $proponent->status }}</p>
@endforeach

    
  
  
  </div>
  @include('layouts.footer')
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
</body>
</html>
