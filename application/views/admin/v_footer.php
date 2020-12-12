<script type="text/javascript">
	$(document).ready(function(){
		$('.table-datatable').DataTable();
	});
</script>

<script>
      function cek_denda() {
      var tgl_bataspengembalian  = document.getElementById('tgl_bataspengembalian').value;
      var tgl_peminjaman  = document.getElementById('tgl_peminjaman').value;
      var tgl_pengembalian  = document.getElementById('tgl_pengembalian').value;

   
      if (tgl_peminjaman <= tgl_bataspengembalian) {
        document.getElementById('denda').value = 'tidak denda';
      }else{
      	document.getElementById('denda').value = 'denda';
      }
      

}
</script>

</body>
</html>