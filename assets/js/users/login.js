$(function () {

	$("#loginContainer").dialog({
		modal: true,
		autoOpen: true,
		resizable: false,
		draggable: true,
		show: true,
		hide: true,
		height: 500,
		width: 750,
		close: function(){
			$("#clue").html("wygląda na to, że formularz logowania zostal zamknięty. Naciśnij przycisk \"zaloguj\" by ponownie otworzyć formularz logowania");
		}
	});

	$("#signIn").click(function (evt) {
		evt.preventDefault();
		$("#loginContainer").dialog('open');
	});

	$("#signInForm").submit(function () {
		$("#loginContainer").dialog('open');
	});


});