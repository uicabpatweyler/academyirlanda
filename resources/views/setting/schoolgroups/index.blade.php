@extends('layouts.index', [
    'title' => 'Configuración: Grupos Escolares'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item active">Grupos Escolares</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Grupos Escolares</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    @can('create', \App\Models\Setting\SchoolGroup::class)
      <div class="d-md-block d-none">
        <a href="{{route('school_groups.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
          <i data-feather="plus" class="wd-10 mg-r-5"></i> Nuevo Grupo
        </a>
      </div>
    @endcan
  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mb-2">
      <div class="card card-body bd-1 card-accent-indigo-700">
        <form action="" name="formFilter" id="formFilter">
          <div class="row row-sm">
            <div class="col-sm-3 mt-2">
              <label class="sr-only" for="school">Escuela</label>
              <select name="school" id="school" class="custom-select" required>
                @foreach($schools as $school)
                  @if($loop->first)
                    <option selected value="">[Escuela]</option>
                  @endif
                  <option value="{{$school->id}}" {{request('school')==$school->id ? ' selected' : ''}}>{{$school->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2 mt-2">
              <label class="sr-only" for="school_cycle">Ciclo Escolar</label>
              <select name="school_cycle" id="school_cycle" class="custom-select" required>
                @foreach($schoolsCycles as $schoolsCycle)
                  @if($loop->first)
                    <option selected value="">[Ciclo Escolar]</option>
                  @endif
                  <option value="{{$schoolsCycle->id}}" {{request('school_cycle')==$schoolsCycle->id ? ' selected' : ''}}>
                    {{$schoolsCycle->period}}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3 mt-2">
              <label class="sr-only" for="school_grade">Grado</label>
              <select name="school_grade" id="school_grade" class="custom-select" required>
                @foreach($schoolGrades as $schoolGrade)
                  @if($loop->first)
                    <option selected value="">[Grado]</option>
                  @endif
                    <option value="{{$schoolGrade->id}}" {{request('school_grade')==$schoolGrade->id ? ' selected' : ''}}>
                      {{$schoolGrade->name}}
                    </option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2 mt-2">
              <label class="sr-only" for="status">Estado</label>
              <select name="status" id="status" class="custom-select">
                <option value="" {{request('status')=='' ? ' selected' : ''}}>[Todos]</option>
                <option value="1" {{request('status')=='1' ? ' selected' : ''}}>Activos</option>
                <option value="0" {{request('status')=='0' ? ' selected' : ''}}>Inactivos</option>
              </select>
            </div>
            <div class="col-sm-2 d-flex flex-column align-items-start mt-2">
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
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">#</th>
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Grado</th>
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Grupo</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Cupo</th>
                <th scope="col" class="tx-white text-right" style="background-color: #3367D6">Inscripción</th>
                <th scope="col" class="tx-white text-right" style="background-color: #3367D6">Colegiatura</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Estado</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Acciones</th>
              </tr>
              </thead>
              <tbody>
              @if($schoolGroups->isNotEmpty())
                @foreach($schoolGroups as $schoolGroup)
                  <tr>
                    <td class="tx-12 tx-sans text-center">{{$loop->iteration}}</td>
                    <td class="tx-12 tx-semibold tx-sans">{{$schoolGroup->schoolGrade->name}}</td>
                    <td class="tx-12 tx-semibold tx-sans">{{$schoolGroup->name}}</td>
                    <td class="tx-12 tx-semibold tx-sans text-center">{{$schoolGroup->allowed_students}}</td>
                    <td class="tx-12 tx-semibold tx-sans text-right">{{$schoolGroup->schoolFeeOne->amount_format}}</td>
                    <td class="tx-12 tx-semibold tx-sans text-right">{{$schoolGroup->schoolFeeTwo->amount_format}}</td>
                    <td class="tx-12 tx-semibold tx-sans text-center">
                      @if($schoolGroup->status)
                        <i class="fas fa-check text-success"></i>
                      @else
                        <i class="fas fa-times-circle text-danger"></i>
                      @endif
                    </td>
                    <td class="text-center">
                      @can('update', $schoolGroup)
                        <a class="btn btn-success btn-xs pd-r-4 pd-l-4" href="{{route('school_groups.edit', $schoolGroup->id)}}" role="button">
                          <i data-feather="edit-3" class=""></i> Editar
                        </a>
                      @endcan
                      @can('delete', $schoolGroup)
                          <button type="button" data-url="{{route('school_groups.delete', $schoolGroup)}}" class="btn btn-danger btn-xs pd-r-4 pd-l-4" id="btn_delete" name="{{$schoolGroup->id}}">
                            <i data-feather="trash-2" class=""></i> Borrar
                          </button>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')

@include('shared.parsley')

<script>
$().ready( function () {

  $(".btn-danger").click(function () {
    let _url = $(this).data('url');
    Swal.fire({
      title: '¿Deseas borrar el grupo escolar seleccionado?',
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

  $('#formFilter').parsley({
    errorClass: 'is-invalid',
    successClass: 'is-valid',
    errorsWrapper: '<span class="invalid-feedback"></span>',
    errorTemplate: '<div></div>'
  }).on('field:validate', function () {
    $(this.$element).parsley().removeError('errorServer', {updateClass: true});
  }).on('form:error', function(formInstance){
    let errors = 0;
    $.each(formInstance.fields, function(key, field){
      if (field.validationResult !== true){
        errors++;
      }
    });
    let message = errors === 1
      ? 'Verifica el campo marcado en rojo'
      : 'Verifica los ' +  errors + ' campos marcados en rojo';
    showErrorsForm(message);
  }).on('form:submit', function() {
    return true;
  }).on('form:success', function(){
    return true;
  });

});
</script>
@endpush
