<!-- Import JavaScript -->
<script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
<script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
<script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
<script src="assets/lib/chartjs-2.3.0/Chart.js"></script>
<script src="assets/lib/stackable-1.0.1/stacktable.js"></script>
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	$('[data-toggle="collapse"]').collapse()
})

$(function () {
	var activeTab = $('[href=' + location.hash + ']');
	activeTab && activeTab.tab('show');
});
</script>
