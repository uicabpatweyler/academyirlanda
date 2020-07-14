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
          <li class="breadcrumb-item active">Editar Escuela</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Editar Escuela</h4>
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
          <form method="POST" id="formEdit" name="formEdit" action="{{route('schools.update', $school->id)}}" class="bd bd-1 rounded">
            @csrf
            @method('PATCH')
            <div class="pd-x-15 pd-y-15 mb-3 d-flex align-items-center bd-b bd-1">
              <span class="tx-13 tx-semibold text-secondary tx-interui tx-spacing-1">
                Complete el siguiente formulario
              </span>
              <span class="ml-1 tx-12 tx-danger">(*) campo obligatorio</span>
            </div>
            <ul class="nav nav-tabs pd-l-20" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link tx-bold tx-roboto active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="true">Escuela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link tx-bold tx-roboto" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Dirección</a>
              </li>
            </ul>
            <div class="tab-content  pd-20" id="myTabContent">
              <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                <div class="row row-sm pd-b-5">
                  <div class="form-group col-sm-6">
                    <label for="key">Clave de escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                    <input class="form-control @error('key') is-invalid @enderror"
                           data-parsley-trigger="change" data-parsley-valid-key-school
                           id="key" name="key"
                           type="text" style="text-transform: uppercase"
                           value="{{$school->key}}"
                           autocomplete="key"
                           autofocus maxlength="10" required>
                  </div>
                  <div class="form-group col-sm-6 d-flex flex-column align-items-start">
                    <label for="incorporation">Núm. de Incorporación</label>
                    <input class="form-control @error('incorporation') is-invalid @enderror"
                           data-parsley-trigger="change"
                           id="incorporation" name="incorporation"
                           type="text" style="text-transform: uppercase"
                           value="{{$school->incorporation}}"
                           autocomplete="incorporation"
                           autofocus maxlength="11">
                  </div>
                  <div class="form-group col-sm-12 d-flex flex-column align-items-start">
                    <label for="name">Nombre de la Escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                    <input class="form-control @error('name') is-invalid @enderror"
                           data-parsley-trigger="change"
                           id="name" name="name"
                           type="text" style="text-transform: capitalize"
                           value="{{$school->name}}"
                           autocomplete="name"
                           autofocus  minlength="3" required>
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="school_type_id">Tipo <small><span class="tx-danger tx-bold">*</span></small></label>
                    <select class="custom-select @error('school_type_id') is-invalid @enderror"
                            id="school_type_id" name="school_type_id" required>
                      @foreach($types as $type)
                        @if($loop->first)
                          <option value=""></option>
                        @endif
                        <option value="{{$type->id}}" {{ $school->school_type_id === $type->id ? "selected" : "" }}>{{$type->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="school_level_id">Nivel <small><span class="tx-danger tx-bold">*</span></small></label>
                    <select class="custom-select @error('school_level_id') is-invalid @enderror"
                            id="school_level_id" name="school_level_id" required>
                      @foreach($levels as $level)
                        @if($loop->first)
                          <option value=""></option>
                        @endif
                        <option value="{{$level->id}}" {{ $school->school_level_id === $level->id ? "selected" : "" }}>{{$level->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="school_service_id">Servicio <small><span class="tx-danger tx-bold">*</span></small></label>
                    <select class="custom-select @error('school_service_id') is-invalid @enderror"
                            id="school_service_id" name="school_service_id" required>
                      @foreach($services as $service)
                        @if($loop->first)
                          <option value=""></option>
                        @endif
                        <option value="{{$service->id}}" {{ $school->school_service_id === $service->id ? "selected" : "" }}>{{$service->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="work_shift">Turno <small><span class="tx-danger tx-bold">*</span></small></label>
                    <select class="custom-select @error('work_shift') is-invalid @enderror"
                            id="work_shift" name="work_shift" required>
                      <option value=""></option>
                      <option value="No Aplica" {{ $school->work_shift === "No Aplica" ? "selected" : "" }}>No Aplica</option>
                      <option value="Matutino" {{ $school->work_shift === "Matutino" ? "selected" : "" }}>Matutino</option>
                      <option value="Vespertino" {{ $school->work_shift === "Vespertino" ? "selected" : "" }}>Vespertino</option>
                      <option value="Nocturno" {{ $school->work_shift === "Nocturno" ? "selected" : "" }}>Nocturno</option>
                      <option value="Discontinuo" {{ $school->work_shift === "Discontinuo" ? "selected" : "" }}>Discontinuo</option>
                      <option value="Continuo" {{ $school->work_shift === "Continuo" ? "selected" : "" }}>Continuo</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="economic_support">Sostenimiento <small><span class="tx-danger tx-bold">*</span></small></label>
                    <select class="custom-select @error('economic_support') is-invalid @enderror"
                            id="economic_support" name="economic_support" required>
                      <option value=""></option>
                      <option value="Público" {{ $school->economic_support === "Público" ? "selected" : "" }}>Público</option>
                      <option value="Privado" {{ $school->economic_support === "Privado" ? "selected" : "" }}>Privado</option>
                    </select>
                  </div>
                </div>
                <div class="row row-sm pd-b-5">
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="email">E-mail</label>
                    <input class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email"
                           type="email"
                           value="{{$school->email}}">
                  </div>
                  <div class="form-group col-sm-4 d-flex flex-column align-items-start">
                    <label for="office_phone">Teléfono</label>
                    <input class="form-control @error('office_phone') is-invalid @enderror"
                           id="office_phone" name="office_phone"
                           type="text"
                           value="{{$school->office_phone}}">
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                <div class="row row-sm pd-b-5">
                  <div class="form-group col-sm-6 d-flex flex-column align-items-start">
                    <label for="street">Calle</label>
                    <input class="form-control @error('street') is-invalid @enderror"
                           id="street" name="street"
                           type="text"
                           value="{{$school->street}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="exterior_number">Núm. Ext.</label>
                    <input class="form-control @error('exterior_number') is-invalid @enderror"
                           id="exterior_number" name="exterior_number"
                           type="text"
                           value="{{$school->exterior_number}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="interior_number">Núm. Int.</label>
                    <input class="form-control @error('interior_number') is-invalid @enderror"
                           id="interior_number" name="interior_number"
                           type="text"
                           value="{{$school->interior_number}}">
                  </div>
                  <div class="form-group col-sm-5 d-flex flex-column align-items-start">
                    <label for="references">Referencias</label>
                    <input class="form-control @error('references') is-invalid @enderror"
                           id="references" name="references"
                           type="text"
                           value="{{$school->references}}">
                  </div>
                  <div class="form-group col-sm-5 d-flex flex-column align-items-start">
                    <label for="settlement">Colonia</label>
                    <input class="form-control @error('settlement') is-invalid @enderror"
                           id="settlement" name="settlement"
                           type="text"
                           value="{{$school->settlement}}">
                  </div>
                  <div class="form-group col-sm-2 d-flex flex-column align-items-start">
                    <label for="postal_code">C.P.</label>
                    <input class="form-control @error('postal_code') is-invalid @enderror"
                           id="postal_code" name="postal_code"
                           type="text"
                           value="{{$school->postal_code}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="entity">Entidad</label>
                    <input class="form-control @error('entity') is-invalid @enderror"
                           id="entity" name="entity"
                           type="text"
                           value="{{$school->entity}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="town">Municipio</label>
                    <input class="form-control @error('town') is-invalid @enderror"
                           id="town" name="town"
                           type="text"
                           value="{{$school->town}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="location">Localidad</label>
                    <input class="form-control @error('location') is-invalid @enderror"
                           id="location" name="location"
                           type="text"
                           value="{{$school->location}}">
                  </div>
                  <div class="form-group col-sm-3 d-flex flex-column align-items-start">
                    <label for="country">País</label>
                    <input class="form-control @error('country') is-invalid @enderror"
                           id="country" name="country"
                           type="text"
                           value="{{$school->country}}">
                  </div>
                </div>
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
        submitForm("POST","{{ route('schools.update', $school->id) }}", $("#formEdit").serialize());
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