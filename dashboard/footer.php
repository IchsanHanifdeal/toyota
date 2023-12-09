 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout"", jika anda ingin meninggalkan dashboard.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="logout.php">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="../plugins/vendor/jquery/jquery.min.js"></script>
 <script src="../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="../plugins/js/sb-admin-2.min.js"></script>
 <script>
     function confirmDelete(id_mobil) {
         Swal.fire({
             title: "Apa kamu yakin?",
             text: "Ketika dihapus, Anda tidak dapat mengembalikan data ini!",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Yes",
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.href = "hapus.php?id_mobil=" + id_mobil;
             } else {
                 Swal.fire({
                     title: "Data tidak dihapus!",
                     icon: "error",
                 });
             }
         });
     }
 </script>

 </body>

 </html>