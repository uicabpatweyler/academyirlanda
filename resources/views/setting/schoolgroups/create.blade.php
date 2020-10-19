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
          <li class="breadcrumb-item">Grupos Escolares</li>
          <li class="breadcrumb-item active">Nuevo Grupo Escolar</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Nuevo Grupo Escolar</h4>
    </div>
    <div class="d-md-block d-none">
      <a href="{{route('school_groups.index')}}" class="btn btn-outline-secondary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Regresar
      </a>
    </div>
  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          <form method="POST" id="formCreate" name="formCreate" action="{{route('school_groups.create')}}" class="bd bd-1 rounded">
            @csrf
            <div class="pd-x-15 pd-y-15 mb-3 d-flex align-items-center bd-b bd-1">
              <span class="tx-13 tx-semibold text-secondary tx-interui tx-spacing-1">
                Complete el siguiente formulario
              </span>
              <span class="ml-1 tx-12 tx-danger">(*) campo obligatorio</span>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-4">
                <label for="school_id">Escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="school_id" id="school_id"
                        class="custom-select @error('school_id') is-invalid @enderror"
                        required>
                  @foreach($schools as $school)
                    @if($loop->first)
                      <option selected value="">[Elija una escuela]</option>
                    @endif
                    <option value="{{$school->id}}">{{$school->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="school_cycle_id">Ciclo Escolar <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="school_cycle_id" id="school_cycle_id"
                        class="custom-select @error('school_cycle_id') is-invalid @enderror"
                        required>
                  @foreach($cycles as $cycle)
                    @if($loop->first)
                      <option selected value="">[Elija un ciclo escolar]</option>
                    @endif
                    <option value="{{$cycle->id}}">{{$cycle->period}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="school_grade_id">Grado Escolar <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="school_grade_id" id="school_grade_id"
                        class="custom-select @error('school_grade_id') is-invalid @enderror"
                        required disabled>
                  <option selected value=""></option>
                </select>
              </div>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-5">
                <label for="fee_one">Cuota de Inscripción <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="fee_one" id="fee_one"
                        class="custom-select @error('fee_one') is-invalid @enderror"
                        required disabled>
                  <option selected value=""></option>
                </select>
              </div>
              <div class="form-group col-sm-5 d-flex flex-column align-items-start">
                <label for="fee_two">Cuota de Colegiatura <small><span class="tx-danger tx-bold">*</span></small></label>
                <select name="fee_two" id="fee_two"
                        class="custom-select @error('fee_two') is-invalid @enderror"
                        required disabled>
                  <option selected value=""></option>
                </select>
              </div>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-4">
                <label for="name">Nombre del Grupo <small><span class="tx-danger tx-bold">*</span></small></label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror"
                       data-parsley-trigger="change" style="text-transform: uppercase;"
                       id="name" name="name" autocomplete="name" minlength="3" required>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="allowed_students">Alumnos Permitidos <small><span class="tx-danger tx-bold">*</span></small></label>
                <input type="text"  class="form-control @error('allowed_students') is-invalid @enderror"
                       data-parsley-trigger="change" data-parsley-valid-allowed
                       id="allowed_students" name="allowed_students" autocomplete="allowed_students" required>
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
  let school = null;
  let cycle = null;
  let urlRoot = "{{Request::root()}}";

  $("#btn_cancel").click(function () {
    showWarningCancel("{{route('school_groups.index')}}");
  });

  window.Parsley.addValidator('validAllowed',{
    validateString: function(value){
      //return /^[1-9]\d{2}$/.test(value);
      return /^[1-9]\d$/.test(value);
    },
    messages : {
      es: 'El número de alumnos es incorrecto.'
    }
  });

  $('#formCreate').parsley({
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
    submitForm("POST","{{ route('school_groups.store') }}", $("#formCreate").serialize());
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

  $("#school_id").change( function() {
    school = $(this).val()!=="" ? $(this).val() : null;
    if($(this).val()!=='')
    {
      $("#school_grade_id").enableControl(true, true);
      $.getJSON(urlRoot+'/setting/grades_by_school/'+school, null, function (values) {
        $('#school_grade_id').populateSelect(values);
      });
    }
    else{
      $("#school_grade_id").enableControl(true, false);
    }
    activateSelectsOfFees();
  } );

  $("#school_cycle_id").change( function() {
    cycle = $(this).val()!=="" ? $(this).val() : null;
    activateSelectsOfFees();
  } );

  function activateSelectsOfFees()
  {
    if(school!==null && cycle!==null)
    {
      $("#fee_one").enableControl(true, true);
      $("#fee_two").enableControl(true, true);

      $.getJSON(urlRoot+'/setting/filter_school_fees/'+school+'/'+cycle+'/1', null, function (values) {
        $('#fee_one').populateSelect(values);
      });
      $.getJSON(urlRoot+'/setting/filter_school_fees/'+school+'/'+cycle+'/2', null, function (values) {
        $('#fee_two').populateSelect(values);
      });
    }
    else {
      $("#fee_one").enableControl(true, false);
      $("#fee_two").enableControl(true, false);
    }
  }

  $.fn.enableControl = function(empty, state){
    if(empty){ $(this).empty(); }
    if(state){
      $(this).removeAttr('disabled');
    }
    else{
      $(this).prop('disabled','disabled');
    }
  };

  $.fn.populateSelect = function (values) {
    var options = '';
    $.each(values, function (key, row) {
      options += '<option value="' + row.value + '">' + row.text + '</option>';
    });
    $(this).html(options);
  };

});
</script>
@endpush
