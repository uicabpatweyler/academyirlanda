@extends('layouts.index',[
    'title' => 'Inicio'
])

@section('content')
  <div class="text-center">
    <h2 class="df-title">Management Platform & Administration (MP&A)</h2>
    <span class="tx-18 tx-color-03">Plataforma de Gestión y Administración</span>
    <hr class="mg-y-5">
  </div>
  <div class="d-sm-flex justify-content-center align-items-center">
    <!-- logo company width="300" height="240" -->
    <img class="mb-4" src="{{asset('assets/img/LogoAcademiaIrlanda.png')}}" alt="" width="190" height="240">
  </div>
  
  <div class="text-center mt-2 mb-2">
    Plataforma de Gestión y Administración empresarial basada en la nube, para uso exclusivo de:
  </div>
  
  <div class="card mt-4 mb-4 text-center shadow-sm">
    <div class="card-body">
      <span class="tx-bold tx-16">Irlanda México Asociados, S.C.</span> (IMA-040824-R97)
      <br>
      Calle Faisán # 147 Entre Chablé y Retorno 3, Colonia: Payo Obispo II. C.P.: 77083
      <br>
      Chetumal, Othon P. Blanco, Quintana Roo, México.
    </div>
  </div>
  
  <div class="d-sm-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-outline-primary tx-bold bd-2 mr-3">
      <i data-feather="info"></i>
      Acerca de
    </button>
    <button type="button" class="btn btn-outline-twitter tx-bold bd-2">
      <i data-feather="help-circle"></i>
      Ayuda</button>
  </div>
  
  <hr class="mt-5">
  <div class="text-capitalize text-center tx-12 tx-color-03">&copy; 2020 Todos los derechos reservados</div>
@endsection