//FILE JS

//invio mail con dati relativi all'ordine effettuato
function sendOrder() {
	//invio mail
	$.post('include/API.php', {
		op: 'sendOrder',
		who: $('#whoOrder').val(),
		when: $('#whenOrder').val(),
		payMode: $('input[type="radio"][name="inlineRadioOptions"]:checked').val(),
		howMuch: $('#howMuch').val()
	})
		.done(function(data) {
			if (data.rsp == 'ok') {
				alert('Mail inviata!');
			} else {
				console.error('Errore');
			}
		})
		.fail(function(jqXHR, textStatus, error) {
			console.log('Fail ' + textStatus + ' ' + error);
		});
}

//invio mail con dati relativi all'ordine ritirato
function sendPickData() {
	//invio mail
	$.post('include/API.php', {
		op: 'sendPickData',
		who: $('#whoPick').val(),
		when: $('#whenPick').val(),
		sender: $('#sender').val(),
		fattura: $('input[type="radio"][name="inlineRadioOptionsFattura"]:checked').val(),
		ddt: $('input[type="radio"][name="inlineRadioOptionsDDT"]:checked').val(),
		howMuch: $('#howMuchPick').val()
	})
		.done(function(data) {
			if (data.rsp == 'ok') {
				alert('Mail inviata!');
			} else {
				console.error('Errore');
			}
		})
		.fail(function(jqXHR, textStatus, error) {
			console.log('Fail ' + textStatus + ' ' + error);
		});
}

$(document).ready(function() {
	//aggiorno data ordine con oggi
	var today = new Date();
	var dd = ('0' + today.getDate()).slice(-2);
	var mm = ('0' + (today.getMonth() + 1)).slice(-2);
	var yyyy = today.getFullYear();
	today = yyyy + '-' + mm + '-' + dd;
	$('#whenOrder').attr('value', today);
	$('#whenPick').attr('value', today);
});
