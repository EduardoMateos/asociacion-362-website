$(".delete-block").click(function() {
    const Swal = require('sweetalert2')
    Swal.fire({
       title: '¿Estas seguro?',
       text: "No hay vuelta atras.",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Si, borralo.'
       }).then((result) => {
       if (result.isConfirmed) {
           window.location.href = "/admin/blocks/destroy/"+$(this).attr("data-id");
       }
   })
 });