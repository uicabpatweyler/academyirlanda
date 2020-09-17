@extends('layouts.index', [
    'title' => 'Configuración: Cuotas Escolares'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item active">Cuotas Escolares</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Cuotas Escolares</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    @can('create', \App\Models\Setting\SchoolFee::class)
      <div class="d-md-block d-none">
        <a href="{{route('school_fees.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
          <i data-feather="plus" class="wd-10 mg-r-5"></i> Nueva Cuota
        </a>
      </div>
    @endcan

  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mb-2">
      <div class="card card-body bd-1 card-accent-indigo-700">
        <form action="" name="formFilter" id="formFilter">
          <div class="row row-sm">
            <div class="col-sm-4 mt-2">
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
            <div class="col-sm-3 mt-2">
              <label class="sr-only" for="school_cycle">Ciclo Escolar</label>
              <select name="school_cycle" id="school_cycle" class="custom-select" required>
                <option selected value="">[Ciclo Escolar]</option>
                @foreach($schoolsCycles as $schoolsCycle)
                  <option value="{{$schoolsCycle->id}}" {{request('school_cycle')==$schoolsCycle->id ? ' selected' : ''}}>
                    {{$schoolsCycle->period}}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3 mt-2">
              <label class="sr-only" for="type">Tipo de cuota</label>
              <select name="type" id="type" class="custom-select" required>
                @foreach($types as $type)
                  @if($loop->first)
                    <option selected value="">[Tipo de Cuota]</option>
                  @endif
                  <option value="{{$type['id']}}" {{request('type')==$type['id'] ? ' selected' : ''}}>{{$type['name']}}</option>
                @endforeach
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
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Nombre</th>
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Cuota</th>
                <th scope="col" class="tx-white text-left" style="background-color: #3367D6">Tipo</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Estado</th>
                <th scope="col" class="tx-white text-center" style="background-color: #3367D6">Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach($schoolFees as $schoolFee)
                <tr>
                  <td class="tx-12 tx-semibold tx-sans text-left">
                    {{$schoolFee->name}}
                    <p class="tx-normal tx-11 tx-color-03 mt-0 mb-0">
                      {{$schoolFee->school->name}}
                    </p>
                  </td>
                  <td class="tx-12 tx-semibold tx-sans text-left">{{$schoolFee->amount_format}}</td>
                  <td class="tx-12 tx-semibold tx-sans text-left">
                    {{$schoolFee->type_name}}
                    <p class="tx-normal tx-11 tx-color-03 mt-0 mb-0">
                      Ciclo: {{$schoolFee->schoolCycle->period}}
                    </p>
                  </td>
                  <td class="tx-12 tx-semibold tx-sans text-center">
                    @if($schoolFee->status)
                      <i class="fas fa-check text-success"></i>
                    @else
                      <i class="fas fa-circle text-danger"></i>
                    @endif
                  </td>
                  <td class="tx-12 tx-semibold tx-sans text-center">
                    <a class="btn btn-info btn-xs pd-r-4 pd-l-4" href="" role="button" data-toggle="tooltip" data-placement="top" title="Aplicar cuota">
                      <i class="fas fa-external-link-alt"></i>
                    </a>
                    @can('update', $schoolFee)
                      <a class="btn btn-success btn-xs pd-r-4 pd-l-4" href="{{route('school_fees.edit', $schoolFee->id)}}" role="button">
                        <i data-feather="edit-3" class=""></i> Editar
                      </a>
                    @endcan
                    @can('delete', $schoolFee)
                      <button type="button" data-url="{{route('school_fees.delete', $schoolFee->id)}}" class="btn btn-danger btn-xs pd-r-4 pd-l-4" id="btn_delete" name="{{$schoolFee->id}}">
                        <i data-feather="trash-2" class=""></i> Borrar
                      </button>
                    @endcan
                  </td>
                </tr>
              @endforeach
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
      title: '¿Deseas borrar la cuota escolar seleccionada?',
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
