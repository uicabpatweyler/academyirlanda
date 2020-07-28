@extends('layouts.index', [
    'title' => 'Configuración: Ciclos Escolares'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item active">Ciclos Escolares</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Ciclos Escolares</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    <div class="d-md-block d-none">
      <a href="{{route('school_cycles.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="plus" class="wd-10 mg-r-5"></i> Nuevo Ciclo
      </a>
    </div>
  </div>
  
  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
        
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  $().ready( function () {
  });
</script>
@endpush