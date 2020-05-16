function showSuccessForm(_message, _url){
  Swal.fire({
    title: '',
    text: _message,
    type: "success",
    confirmButtonText: 'Continuar',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value) {
      location.replace(_url);
    }
  });
}

function showWarningCancel(_url){
  Swal.fire({
    title: '¿Estás seguro de querer cancelar?',
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
      location.replace(_url);
    }
  });
}

function showErrorsForm(_message){
  Swal.fire({
    type:  'error',
    title: 'ERROR',
    text:  _message,
    allowOutsideClick:  false,
    showCancelButton:   true,
    showConfirmButton:  false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor:  '#d33',
    cancelButtonText:   'Corregir'
  });
}