@extends('layouts.index', [
    'title' => 'Administración:Roles'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Administración</li>
          <li class="breadcrumb-item">Roles</li>
          <li class="breadcrumb-item active">Nuevo Rol</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Nuevo Rol</h4>
    </div>
    <div class="d-md-block d-none">
      <a href="{{route('roles.index')}}" class="btn btn-outline-secondary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Regresar
      </a>
    </div>
  </div>
  
  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <form method="POST" id="formCreate" name="formCreate" action="{{route('roles.store')}}">
        @csrf
        <div class="card card-accent-green-700 shadow-sm">
          <div class="card-header pd-x-10 pd-y-15 d-md-flex align-items-center justify-content-start">
            <span class="tx-13 tx-semibold text-secondary tx-interui tx-spacing-1">
                Complete el siguiente formulario
            </span>
            <span class="ml-1 tx-12 tx-danger">(*) obligatorio</span>
          </div>
          <div class="card-body">
            
            <div class="row row-sm ">
              <div class="form-group col-sm-6">
                <label for="display_name">Nombre del rol <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('display_name') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="display_name" name="display_name"
                       type="text"
                       value="{{old('display_name')}}" minlength="4" maxlength="30" required>
              </div><!-- col -->
              <div class="form-group col-sm-6 d-flex flex-column align-items-start">
                <label for="description">Descripción <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('description') is-invalid @enderror"
                       data-parsley-trigger="change"
                       id="description" name="description"
                       type="text"
                       value=" {{old('description')}}" minlength="4" required>
              </div><!-- col -->
            </div>
            <div class="bd-t bd-1 py-2 pd-x-10 mt-4 d-flex justify-content-end">
              <button type="button" class="btn btn-danger mr-2" id="btn_cancel" name="btn_cancel">
                <i data-feather="x-circle" class="mg-r-5"></i>
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">
                <i data-feather="save" class="mg-r-5"></i>
                Guardar
              </button>
            </div>
            
          </div>
        </div>
        <div class="row row-xs">
          <div class="col-md-12 mt-2">
            @if(count($errors) > 0)
              <div class="alert alert-danger text-center tx-bold" role="alert">
                @foreach ($errors->get('permissions') as $message)
                  {{$message}}
                @endforeach
              </div>
            @endif
          </div>
        </div>
        <!-- Menus, Modules and Permissions -->
        <div class="row row-xs">
          @foreach($modules as $module)
            <div class="col-md-6 mt-2">
              <div class="card">
                <div class="card-header d-sm-flex align-items-start justify-content-between">
                  <h6 class="lh-5 mg-b-0">{{$module->name}}</h6>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input module"
                           name="permissions[]"
                           id="module{{$module->id}}"
                           value="{{$module->permission}}">
                    <label class="custom-control-label" for="module{{$module->id}}"></label>
                  </div>
                </div>
                <div class="card-body pd-y-15 pd-x-10">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm tx-13 tx-nowrap mg-b-0">
                      <thead>
                      <tr class="tx-12 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th>Modulo</th>
                        <th>Permiso(s)</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($module->options as $option)
                        <tr>
                          <td class="tx-medium">
                            <div class="d-sm-flex align-items-start justify-content-between mr-2">
                              {{$option->opt_name}}
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input module-option"
                                       name="permissions[]"
                                       id="module{{$module->id}}-option-{{$option->opt_resource}}"
                                       value="{{$option->opt_resource}}">
                                <label class="custom-control-label" for="module{{$module->id}}-option-{{$option->opt_resource}}"></label>
                              </div>
                            </div>
                          </td>
                          <td>
                            @foreach($option->permissions as $permission)
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input the-permission" name="permissions[]" id="module{{$module->id}}-permission-{{$permission->name}}" value="{{$permission->name}}">
                                <label class="custom-control-label" for="module{{$module->id}}-permission-{{$permission->name}}">{{$permission->display_name}}</label>
                              </div>
                            @endforeach
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </form>
    </div>
  </div>
  
@endsection
@push('scripts')

@include('shared.parsley')

<script>
    $().ready(function () {

      $("#btn_cancel").click(function () {
      showWarningCancel("{{route('roles.index')}}");
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
        submitForm("POST","{{ route('roles.store') }}", $("#formCreate").serialize());
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

      $('.module-option').on('change', function(){
        //module-option-resource
        let idInputSplit = $(this).prop("id").split('-'); //split property 'id' of the checkbox
        let nameModule   = idInputSplit[0]; //name of module
        let nameResource = idInputSplit[2]; //name of resource
        //this checkbox is checked
        if($(this).is(':checked')){
          //activate checkbox of the main parent of this option
          parentCheck(nameModule);
        }
        else{
          $('#'+nameModule).prop('checked', countCheckSelect(nameModule+'-option-'));
          //module1-permission-resource
          $('input[id^="'+nameModule+'-permission-'+nameResource+'"]').each( function() {
            if($(this).is(':checked')){
              $(this).prop('checked', false);
            }
          });
        }
      });

      $('.the-permission').on('change', function(){
        //module-permission-resource.ability
        let idInputSplit = $(this).prop("id").split('-'); //split property 'id' of the checkbox
        let nameResource = idInputSplit[2].split('.')[0]; //name resource
        let nameModule   = idInputSplit[0]; //name of module
        
        //this checkbox is checked
        if($(this).is(':checked')){
          //activate checkbox of the module parent of the permission
          parentCheck(nameModule+'-option-'+nameResource);
          //activate checkbox of the main parent of this option
          parentCheck(nameModule);
        }
        //this checkbox is unchecked
        else{
          $('#'+nameModule+'-option-'+nameResource).prop('checked', countCheckSelect(nameModule+'-permission-'+nameResource));
          $('#'+nameModule).prop('checked', countCheckSelect(nameModule+'-option-'));
        }
      });
      
      function parentCheck(idCheckBox){
        //property checked = true only when the control is unchecked
        if(!$('#'+idCheckBox).is(':checked')){
          $('#'+idCheckBox).prop('checked', true);
        }
        else{}
      }
      
      function countCheckSelect(idInput){
        let counter = 0;
        $('input[id^="'+idInput+'"]').each( function() {
          if(this.checked) counter++;
        });
        return counter !== 0;
      }
      
    });
</script>
@endpush