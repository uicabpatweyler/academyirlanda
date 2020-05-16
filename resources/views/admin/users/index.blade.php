@extends('layouts.index', [
    'title' => 'Administración:Usuarios'
])

@section('content')
  <!-- Breadcrumb, title and buttons section -->
  <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item">Administración</li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Usuarios</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    <div class="d-md-block d-none">
      <a href="{{route('users.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
        <i data-feather="plus" class="wd-10 mg-r-5"></i> Nuevo Usuario
      </a>
    </div>
  </div>
  
  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          @if($users->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Nombre</th>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Rol</th>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  @can('view', $user)
                    <tr>
                      <td class="tx-12 tx-semibold tx-sans" style="width:30%">
                        {{$user->full_name}}
                       <p class="tx-normal tx-11 tx-color-03 mt-0 mb-0">{{$user->email}}</p>
                      </td>
                      <td class="" style="width:40%">
                        {{$user->getRolesList()}}
                      </td>
                      <td class="" style="width: 30%">
                        @can('update', $user)
                          <a class="btn btn-success btn-xs pd-r-4 pd-l-4" href="{{route('users.edit', $user)}}" role="button">
                            <i data-feather="edit-3" class=""></i> Editar
                          </a>
                        @endcan
                        @can('delete', $user)
                          <button type="button" data-url="{{ route('users.delete', $user) }}" class="btn btn-danger btn-xs pd-r-4 pd-l-4" id="btn_delete" name="{{$user->id}}">
                            <i data-feather="trash-2" class=""></i> Borrar
                          </button>
                        @endcan
                      </td>
                    </tr>
                  @endcan
                @endforeach
                </tbody>
              </table>
            </div>
          @else
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  $().ready( function () {
    $("#btn_delete").click(function () {
      let _url = $(this).data('url');
      Swal.fire({
        title: '¿Deseas borrar el usuario seleccionado?',
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