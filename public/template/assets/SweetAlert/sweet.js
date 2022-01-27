var flash = $('#flash').data('flash');

if(flash){
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text : flash
    })
      

    
}
var gagal = $('#gagal').data('gagal');
  if(gagal){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username dan Password Tidak Ditemukan',
    })
}
