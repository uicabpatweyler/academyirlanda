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
          <li class="breadcrumb-item active">Roles</li>
        </ol>
      </nav>
      <h4 class="mg-b-0 tx-spacing--1">Roles</h4>
    </div>
    {{-- Authorizing Actions Using Policies - Actions That Don't Require Models --}}
    @can('create', \App\Models\Admin\Role::class)
      <div class="d-md-block d-none">
        <a href="{{route('roles.create')}}" class="btn btn-outline-primary btn-sm bd-2 mg-l-5 btn-uppercase ">
          <i data-feather="plus" class="wd-10 mg-r-5"></i> Nuevo Rol
        </a>
      </div>
    @endcan
  </div>
  
  <div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-0">
      <div class="card card-accent-green-700 shadow-sm">
        <div class="card-body">
          @if($roles->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Nombre</th>
                  <th scope="col" class="text-center tx-white" style="background-color: #3367D6">Usuarios</th>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Descripción</th>
                  <th scope="col" class="tx-white" style="background-color: #3367D6">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                  <tr>
                    <td class="tx-13 tx-semibold" style="width:20%">
                      {{$role->display_name}}
                    </td>
                    <td class="tx-13 tx-semibold text-center" style="width:20%">
                      {{ $role->users_count }}
                    </td>
                    <td class="text-left tx-13" style="width:40%">
                      {{$role->description}}
                    </td>
                    <td class="text-left" style="width:20%">
                      @can('update', $role)
                        <a class="btn btn-success btn-xs pd-r-4 pd-l-4" href="{{route('roles.edit', $role)}}" role="button">
                          <i data-feather="edit-3" class=""></i> Editar
                        </a>
                      @endcan
                      @can('delete', $role)
                          <button type="button" data-url="{{ route('roles.delete', $role) }}" class="btn btn-danger btn-xs pd-r-4 pd-l-4" id="btn_delete" name="{{$role->id}}">
                            <i data-feather="trash-2" class=""></i> Borrar
                          </button>
                      @endcan
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $roles->links() }}
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
    $(".btn-danger").click(function () {
      let _url = $(this).data('url');
      
      Swal.fire({
        title: '¿Deseas borrar el rol seleccionado?',
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