
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;">
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/ordini.css">
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/ordini.js"></script>

    <title>Form Acquisti</title>
</head>
<body>
<div class="container">
	<br/>
	<div class="row">

		<!-- ORDINI -->
		<div class="col-md-6">
			<center><h2>NUOVO ORDINE</h2></center><br/>
			<div class="form-group">
				<label for="whoOrder">Chi ha fatto l'ordine?</label>
				<input type="text" class="form-control" id="whoOrder" placeholder="Inserisci nome" style="width: 50%;" required>
			  </div>
			  <div class="form-group">
				<label for="whenOrder">Quando?</label>
				<input type="date" class="form-control" id="whenOrder" placeholder="Inserisci data" style="width: 50%;">
			  </div>
			  <label for="payMode">Modalità di pagamento</label><br/>
			  <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Paypal" required>
				<label class="form-check-label" for="inlineRadio1">Paypal</label>
			  </div>
			  <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Contanti">
				<label class="form-check-label" for="inlineRadio2">Contanti</label>
			  </div>
			  <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Bonifico">
				<label class="form-check-label" for="inlineRadio3">Bonifico</label>
			  </div>
			  <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="Carta di credito">
				<label class="form-check-label" for="inlineRadio4">Carta di credito</label>
			  </div><br/><br/>
			  <div class="form-group">
				<label for="howMuch">Importo pagato (euro)</label>
				<input type="number" class="form-control" id="howMuch" placeholder="Inserisci importo" style="width: 50%;" required>
			  </div>
			  <button type="button" class="btn btn-primary" onclick="sendOrder()">Invia</button>

		</div>
		
		<!-- RICEZIONE MERCI -->
		<div class="col-md-6" style="border-left: 1px dashed #333;">
			<center><h2>RICEZIONE MERCI</h2></center><br/>
			<div class="form-group">
				<label for="whoPick">Chi ha ritirato la merce?</label>
				<input type="text" class="form-control" id="whoPick" placeholder="Inserisci nome" style="width: 50%;" required >
			</div>
			<div class="form-group">
				<label for="whenPick">Quando?</label>
				<input type="date" class="form-control" id="whenPick" placeholder="Inserisci data" style="width: 50%;">
			  </div>
			<div class="form-group">
				<label for="sender">Mittente della merce</label>
				<input type="text" class="form-control" id="sender" placeholder="Inserisci nome" style="width: 50%;" required >
			</div>
			<div class="form-group">
				<label for="howMuchPick">Importo pagato (euro)</label>
				<input type="number" class="form-control" id="howMuchPick" placeholder="Inserisci importo" style="width: 50%;">
			  </div>
			<label for="ddt">DDT presente</label>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptionsDDT" id="inlineRadioDdtYes" value="ddtYes" checked>
				<label class="form-check-label" for="inlineRadioDdtYes">Sì</label>
			  </div>
			  <div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="inlineRadioOptionsDDT" id="inlineRadioDdtNo" value="ddtNo">
				<label class="form-check-label" for="inlineRadioDdtNo">No</label>
			  </div><br/>
			  <label for="ddt">Fattura presente</label>
			  <div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="inlineRadioOptionsFattura" id="inlineRadioFatturaYes" value="fatturaYes">
				  <label class="form-check-label" for="inlineRadioFatturaYes">Sì</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="inlineRadioOptionsFattura" id="inlineRadioFatturaNo" value="fatturaNo" checked>
				  <label class="form-check-label" for="inlineRadioFatturaNo">No</label>
				</div><br/>
			<button type="button" class="btn btn-primary" onclick="sendPickData()">Invia</button>
		</div>
	</div>

	
	<!-- FINE CONTAINER -->
	</div>
    </body>
</html>