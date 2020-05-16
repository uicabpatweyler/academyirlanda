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
                <label for="key_school">Clave de escuela <small><span class="tx-danger tx-bold">*</span></small></label>
                <input class="form-control @error('key_school') is-invalid @enderror"
                       data-parsley-trigger="change" data-parsley-valid-key-school
                       id="key_school" name="key_school"
                       type="text" style="text-transform: uppercase"
                       value="{{old('key_school')}}"
                       autocomplete="key_school"
                       autofocus maxlength="10"  required>
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
      submitForm("POST","{{ route('users.store') }}", $("#formCreate").serialize());
    });
  });
</script>
@endpush