const flashData = $('.flash-data').data('flashdata');
const flashLogin = $('.flash-login').data('flashlogin');

if (flashData) {
    Swal.fire({
        icon: 'success',
        title: 'Yeyyy, Sukses!',
        text: 'Data berhasil '+ flashData,
        type: 'success'
    });
} else if (flashLogin) {
  Swal.fire({
        icon: 'success',
        title: 'Hai, Selamat Datang!',
        text: 'Anda berhasil '+ flashLogin,
        type: 'success'
      });
  }

// if (flashLogin) {
  

//  
// }

// btn-hapus
$('.btn-hapus').on('click', function (e) {
    
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
            title: 'Apakah anda yakin',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              document.location.href = href;
            }
    });
   
});