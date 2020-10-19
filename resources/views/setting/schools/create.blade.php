@extends('layouts.index', [
    'title' => 'Configuración:Escuelas'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item">Escuelas</li>
          <li class="breadcrumb-item active">Nueva Escuela</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Nueva Escuela</h4>
    </div>
    <div class="d-md-block d-none">
      <a href="{{route('schools.index')}}" class="btn btn-outline-secondary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Regresar
      </a>
    </div>
  </div>

  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          <form method="POST" id="formCreate" name="formCreate" action="{{route('schools.create')}}" class="bd bd-1 rounded">
            @csrf
            <div class="pd-x-15 pd-y-15 mb-3 d-flex align-items-center bd-b bd-1">
              <span class="tx-13 tx-semibold text-secondary tx-interui tx-spacing-1">
                Complete el siguiente formulario
              </span>
              <span class="ml-1 tx-12 tx-danger">(*) campo obligatorio</span>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-6">
                <label for="key">Clave de escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('key') is-invalid @enderror"
                       data-parsley-trigger="change" data-parsley-valid-key-school
                       id="key" name="key"
                       type="text" style="text-transform: uppercase"
                       value="{{old('key')}}"
                       autocomplete="key"
                       autofocus maxlength="10" required>
              </div>
              <div class="form-group col-sm-6 d-flex flex-column align-items-start">
                <label for="incorporation">Núm. de Incorporación</label>
                <input class="form-control @error('incorporation') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="incorporation" name="incorporation"
                       type="text" style="text-transform: uppercase"
                       value="{{old('incorporation')}}"
                       autocomplete="incorporation"
                       autofocus maxlength="11">
              </div>
              <div class="form-group col-sm-12 d-flex flex-column align-items-start">
                <label for="name">Nombre de la Escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('name') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="name" name="name"
                       type="text" style="text-transform: capitalize"
                       value="{{old('name')}}"
                       autocomplete="name"
                       autofocus  minlength="3" required>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="school_type_id">Tipo <small><span class="tx-danger tx-bold">*</span></small></label>
                <select class="custom-select @error('school_type_id') is-invalid @enderror"
                        id="school_type_id" name="school_type_id" required>
                  <option selected value=""></option>
                  @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="school_level_id">Nivel <small><span class="tx-danger tx-bold">*</span></small></label>
                <select class="custom-select @error('school_level_id') is-invalid @enderror"
                        id="school_level_id" name="school_level_id" required disabled>
                  <option selected value=""></option>
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="school_service_id">Servicio <small><span class="tx-danger tx-bold">*</span></small></label>
                <select class="custom-select @error('school_service_id') is-invalid @enderror"
                        id="school_service_id" name="school_service_id" required disabled>
                  <option selected value=""></option>
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="work_shift">Turno <small><span class="tx-danger tx-bold">*</span></small></label>
                <select class="custom-select @error('work_shift') is-invalid @enderror"
                        id="work_shift" name="work_shift" required>
                  <option selected value=""></option>
                  <option value="No Aplica">No Aplica</option>
                  <option value="Matutino">Matutino</option>
                  <option value="Vespertino">Vespertino</option>
                  <option value="Nocturno">Nocturno</option>
                  <option value="Discontinuo">Discontinuo</option>
                  <option value="Continuo">Continuo</option>
                </select>
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="economic_support">Sostenimiento <small><span class="tx-danger tx-bold">*</span></small></label>
                <select class="custom-select @error('economic_support') is-invalid @enderror"
                        id="economic_support" name="economic_support" required>
                  <option selected value=""></option>
                  <option value="Público">Público</option>
                  <option value="Privado">Privado</option>
                </select>
              </div>
            </div>
            <div class="row row-sm pd-x-20 pd-b-5">
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="email">E-mail</label>
                <input class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email"
                       type="email"
                       value="{{old('email')}}">
              </div>
              <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                <label for="office_phone">Teléfono</label>
                <input class="form-control @error('office_phone') is-invalid @enderror"
                       id="office_phone" name="office_phone"
                       type="text"
                       value="{{old('office_phone')}}">
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
      showWarningCancel("{{route('schools.index')}}");
    });

    window.Parsley.addValidator('validKeySchool',{
      validateString: function(value){
        return /^[0-9]{2,}[A-Za-z]{3,}[0-9]{4,}[A-Za-z]{1,}$/.test(value);
      },
      messages : {
        es: 'La clave de la escuela es incorrecta'
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
      submitForm("POST","{{ route('schools.store') }}", $("#formCreate").serialize());
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

    $("#school_type_id").change( function (){
      if($(this).val()!==''){

        $("#school_level_id").enableControl(true,true);
        $("#school_service_id").enableControl(true,false);

        $.getJSON('{{Request::root()}}'+'/setting/school_level/'+$(this).val(), null, function (values) {
          $('#school_level_id').populateSelect(values);
        });

      }
      else{
        $("#school_level_id").enableControl(true,false);
        $("#school_service_id").enableControl(true,false);
      }
    });

    $("#school_level_id").change( function () {
      if($(this).val()!==''){

        $("#school_service_id").enableControl(true,true);

        $.getJSON('{{Request::root()}}'+'/setting/school_service/'+$(this).val(), null, function (values) {
          $('#school_service_id').populateSelect(values);
        });

      }
      else{
        $("#school_service_id").enableControl(true,false);
      }
    })

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
