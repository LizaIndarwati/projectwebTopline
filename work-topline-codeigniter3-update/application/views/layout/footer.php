</div>
</div>

<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.6.1.min.js') ?>"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({
            responsive: true
        });

        $('#table-report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
            ],
            responsive: true
        });

        $("#formUbahPassword").submit(function(e) {
            e.preventDefault();
            var password = $("#password").val();
            var konfirmasi_password = $("#konfirmasi_password").val();
            if (password != konfirmasi_password) {
                alert("Password dan Konfirmasi Password tidak boleh sama");
            } else {
                var formData = new FormData();
                formData.append("password", password);
                $.ajax({
                    url: "<?= site_url('user/password') ?>",
                    method: "POST",
                    data: {
                        password: password
                    },
                    success: function(result) {
                        alert("Berhasil Memperbarui Password");
                        location.reload();
                    }
                })
            }
        })
        $("#formUbahProfil").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('user/profil') ?>",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result) {
                    alert("Berhasil Memperbarui Profi");
                    location.reload();
                }
            })
        })
    });
</script>

</body>

</html>