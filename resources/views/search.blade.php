<div class="card-header">
  <form method="get" action="{{route('roles.index')}}">
    <div class="row">
      <div class="col-sm-4 mb-1">
        <div class="d-flex flex-row justify-content-start align-items-center">
          <label for="length_records" class="my-0 mr-2">Mostrar </label>
          <input type="text" class="form-control mg-0" name="length_records" id="length_records">
          <span class="ml-2">registros</span>
        </div>
      </div>
      <div class="col-sm-4 d-flex flex-row justify-content-center align-items-center">
                <span class="tx-12 tx-color-03 mg-b-0">
                  Página {{$roles->currentPage()}} de {{$roles->lastPage()}}
                </span>
      </div>
      <div class="col-sm-4">
        <div class="search-form">
          <input type="search" name="search" class="form-control" placeholder="Buscar...">
          <button class="btn" type="submit"><i data-feather="search"></i></button>
        </div>
      </div>
    </div>
  </form>
</div>

{{ $roles->appends(request(['length_records','search']))->links() }}