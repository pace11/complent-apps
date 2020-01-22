<script>
    $(document).ready(function(){
      $('#btnRefresh').hide();
      $("#isinotifikasi").load("notifikasi.php");
        var refreshId = setInterval(function() {
          $("#isinotifikasi").load('notifikasi.php');
          if ($('#count').val() > 0){
            $('#notifikasi').addClass('beep');
          } else if ($('#count').val() < 1) {
            $('#notifikasi').removeClass('beep');
          }
      }, 2000);
    });

</script>