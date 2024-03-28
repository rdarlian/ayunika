<script type="module">
  //button create post event
  $('body').on('click', '#btn-delete-post', function() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    let post_id = $(this).data('id');
    let username = $(this).data('username')
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
      title: 'Apakah Kamu Yakin?',
      html: `ingin menghapus User <span class="text-danger bold">` + username + `</span> ?`,
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'TIDAK',
      confirmButtonText: 'YA, HAPUS!'
    }).then((result) => {
      if (result.value) {
        $(this).closest("form").submit();
        showLoading()
      }
    })
    hideLoading()
  });
</script>