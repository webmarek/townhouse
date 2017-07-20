$(document).ready(function () {

	$('.inputInt').keydown(function (e) {
// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// Allow: Ctrl/cmd+A
			(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: Ctrl/cmd+C
			(e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: Ctrl/cmd+X
			(e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: home, end, left, right
			(e.keyCode >= 35 && e.keyCode <= 39)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});


	$("#noToShowAlert").dialog({
		autoOpen: false,
		show: true,
		hide: true,
		modal: true,
		buttons: {
			"OK": function () {
				$(this).dialog('close');
			}
		},
		width: 500,
		height: 300
	});


	$("#showThose").click(function (e) {

		e.stopPropagation();

		var year = $("#year").val();
		var month = $("#month").val();
		var flat = $("#flat").val();

		if ((year != "") && (month != "") && (flat != "")) {

			$.post(
				'../models/support.php',
				{driver: "particular", year: year, month: month, flat: flat},
				function (data) {

					var returned = jQuery.parseJSON(data);

					if (
						(returned.hwater != null) &&
						(returned.cwater != null) &&
						(returned.electricity != null)
					) {
						$("#hwaterUpdate").val(returned.hwater);
						$("#cwaterUpdate").val(returned.cwater);
						$("#electricityUpdate").val(returned.electricity);
					} else {
						$("#noToShowAlert").dialog('open');
						$("#hwaterUpdate").val('');
						$("#cwaterUpdate").val('');
						$("#electricityUpdate").val('');
					}

				}
			);
		}
	});


});