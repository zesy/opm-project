<style type="text/css">
	.welcomeDiv{
		padding: 1%;
	}

	.welcomeOption{
		width: 100%;
		height: 100%;
		border: 1px solid lightgray;
		margin: 0;
		padding: 10%;
	}

	.welcomeButton{
		width: 100%;
		height: 100%;
		padding-top: 5%;
		padding-bottom: 5%;
	}

	.faIcon{
		font-size: 3em;
	}

	.txtIcon{
		font-size: 1.5em;
	}
</style>
<div style="width: 98%; text-align: center;">
<h1>Bem-Vindo <?php echo $_SESSION['user_name']; ?></h1>
<hr class="colorgraph">
</div>
<div class="col-md-5 welcomeDiv">
	<div class="welcomeOption">
		<a href="agenda_ensaio.php"><button class="welcomeButton btn btn-success txtIcon"><i class="faIcon far fa-calendar-minus"></i><br>Agenda Ensaios</button></a>
	</div>
</div>
<div class="col-md-5 welcomeDiv">
	<div class="welcomeOption">
		<a href="agenda_apresentacao.php"><button class="welcomeButton btn btn-success txtIcon"><i class="faIcon far fa-calendar-check"></i><br>Agenda Apresentações</button></a>
	</div>
</div>