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
          <li class="breadcrumb-item">Grados Escolares</li>
          <li class="breadcrumb-item active">Editar Grado Escolar</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Editar Grado Escolar</h4>
    </div>
    <div class="d-md-block d-none">
      <a href="{{route('school_grades.index')}}" class="btn btn-outline-secondary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Regresar
      </a>
    </div>
  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          <form method="POST" id="formEdit" name="formEdit" action="{{route('school_grades.update', $schoolGrade)}}" class="bd bd-1 rounded">
            @csrf
            @method('PATCH')
            <div class="pd-x-15 pd-y-15 mb-3 d-flex align-items-center bd-b bd-1">
              <span class="tx-13 tx-semibold text-secondary tx-interui tx-spacing-1">
                Complete el siguiente formulario
              </span>
              <span class="ml-1 tx-12 tx-danger">(*) campo obligatorio</span>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-4">
                <label for="school_id">Escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="school_id" id="school_id" class="custom-select @error('school_id') is-invalid @enderror" required>
                  @foreach($schools as $school)
                    @if($loop->first)
                      <option value="">[Elija una escuela]</option>
                    @endif
                    <option value="{{$school->id}}" {{$school->id == $schoolGrade->school_id ? 'selected' : ''}}>{{$school->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="name">Nombre <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('name') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="name" name="name"
                       type="text" style="text-transform: capitalize"
                       value="{{$schoolGrade->name}}"
                       autocomplete="name" required>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="abreviation">Abreviación <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('abreviation') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="abreviation" name="abreviation"
                       type="text" style="text-transform: uppercase"
                       value="{{$schoolGrade->abreviation}}"
                       autocomplete="abreviation" required>
              </div>
            </div>
            <div class="bd-t bd-1 py-2 pd-x-20 mt-4 d-flex justify-content-end">
              <button type="button" class="btn btn-danger mr-2" id="btn_cancel" name="btn_cancel">
                <i data-feather="x-circle" class="mg-r-5"></i>
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">
                <i data-feather="save" class="mg-r-5"></i>
                Guardar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')

@include('shared.parsley')

<script>
$().ready( function () {
  $("#btn_cancel").click(function () {
    showWarningCancel("{{route('school_grades.index')}}");
  });

  $('#formEdit').parsley({
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
    return false;
  }).on('form:success', function(){
    $("#btn_submit").prop('disabled', 'disabled');
    submitForm("POST","{{ route('school_grades.update', $schoolGrade) }}", $("#formEdit").serialize());
  });

  function submitForm(_method, _url, _data){
    $.ajax({
      method: _method,
      url: _url,
      data: _data
    }).done( function(data, textStatus, jqXHR) {
      showSuccessForm(data.message, data.url);
    }).fail( function (jqXHR, textStatus, errorThrown) {
      $("#btn_submit").removeAttr('disabled');
      $.each(jqXHR.responseJSON.errors, function(key,value){
        $("#"+key).parsley().addError('errorServer', {message: value, updateClass: true});
      });
      let errors = Object.keys(jqXHR.responseJSON.errors).length;
      let message = errors === 1
        ? 'Verifica el campo marcado en rojo'
        : 'Verifica los ' +  errors + ' campos marcados en rojo';
      showErrorsForm(message);
    });
  }
});
</script>
@endpush

