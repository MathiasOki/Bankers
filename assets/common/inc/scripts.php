<!-- Import JavaScript -->
<script src="assets/lib/jquery-3.1.1/jquery-3.1.1.min.js"></script>
<script src="assets/lib/bootstrap-3.3.7/js/bootstrap.js"></script>
<script src="assets/lib/bootstrap-toggle/js/bootstrap-toggle.js"></script>
<script src="assets/lib/chartjs-2.3.0/Chart.js"></script>
<script src="assets/lib/stackable-1.0.1/stacktable.js"></script>
<script src="assets/lib/typeahead.js-0.11.1/typeahead.bundle.js"></script>

<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	$('[data-toggle="collapse"]').collapse()
})

$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
		content: '<p class="bg-info padding-all">Kundehjelp: Kan jeg hjelpe deg med noe?</p><p><input type="text" class="form-control"></p>',
		html: true,
	});
});

// Javascript to enable link to tab
var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
	$('.nav-pills a[href="'+hash.replace(prefix,"")+'"]').tab('show');
}

// Change hash for page-reload
$('.nav-pills a').on('shown.bs.tab', function (e) {
	window.location.hash = e.target.hash.replace("#", "#" + prefix);
});
</script>
