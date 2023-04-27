<?php echo '
<link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/vendor/DataTables/datatables.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".another-datatable").DataTable({
				paging: true,
				searching: true,
        sorting:false
			});
		});
</script>
<link rel="stylesheet" href="assets/css/table.css">'
?>