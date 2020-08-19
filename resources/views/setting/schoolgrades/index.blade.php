@extends('layouts.index', [
    'title' => 'Configuración: Grados Escolares'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item active">Grados Escolares</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Grados Escolares</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    @can('create', \App\Models\Setting\SchoolGrade::class)
    <div class="d-md-block d-none">
      <a href="{{route('school_grades.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="plus" class="wd-10 mg-r-5"></i> Nuevo Grado
      </a>
    </div>
    @endcan

  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mb-2">
      <div class="card card-body bd-1 card-accent-indigo-700">
        <form action="">
          <div class="row row-sm">
            <div class="col-sm-6">
              <label class="sr-only" for="school">Escuela</label>
              <select name="school" id="school" class="custom-select" required>
                @foreach($schools as $school)
                  @if($loop->first)
                    <option selected value="">[Elija una escuela]</option>
                  @endif
                  <option value="{{$school->id}}" {{request('school')==$school->id ? ' selected' : ''}}>{{$school->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-start">
              <button type="submit" class="btn btn-primary mb-0">
                <i data-feather="filter" class="mg-r-5"></i>
                Filtrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          @if($schoolGrades->isNotEmpty())
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Grado</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Abreviacion</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Estado</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($schoolGrades as $schoolGrade)
                <tr>
                  <td class="tx-12 tx-semibold tx-sans text-left">{{$schoolGrade->name}}</td>
                  <td class="tx-12 tx-semibold tx-sans text-center">{{$schoolGrade->abreviation}}</td>
                  <td class="text-center">
                    <i class="fas fa-check text-success"></i>
                  </td>
                  <td class="text-center">
                    @can('update', $schoolGrade)
                      <a class="btn btn-success btn-xs pd-r-4 pd-l-4" href="{{route('school_grades.edit', $schoolGrade)}}" role="button">
                        <i data-feather="edit-3" class=""></i> Editar
                      </a>
                    @endcan
                    @can('delete', $schoolGrade)
                        <button type="button" data-url="{{route('school_grades.delete', $schoolGrade)}}" class="btn btn-danger btn-xs pd-r-4 pd-l-4" id="btn_delete" name="{{$schoolGrade->id}}">
                          <i data-feather="trash-2" class=""></i> Borrar
                        </button>
                    @endcan
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{$schoolGrades->links()}}
            @else

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
$().ready( function () {
  $(".btn-danger").click(function () {
    let _url = $(this).data('url');
    Swal.fire({
      title: '¿Deseas borrar el grado escolar seleccionado?',
      text: "",
      type: 'question',
      allowOutsideClick:  false,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText : 'No',
      confirmButtonText: 'Sí'
    }).then((result) => {
      if (result.value) {
        $(this).prop('disabled','disabled');
        $.ajax({
          method: 'PATCH',
          url: _url,
          data: {
            "_token": "{{ csrf_token() }}"
          }
        }).done(function( data, textStatus, jqXHR ) {
          showSuccessForm(data.message, data.url);
        }).fail(function( jqXHR, textStatus, errorThrown ) {
          showErrorsForm(textStatus);
        });
      }
    });
  });
});
</script>
@endpush
