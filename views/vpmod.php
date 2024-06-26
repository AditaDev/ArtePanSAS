<?php require_once 'controllers/cpmod.php';?>

<div class="secmod">
	<?php if ($datAll) { foreach ($datAll as $dt) {
			$modact = "No";
			if ($datPfPr) {
				foreach ($datPfPr as $dtfp) {
					if ($dt['idmod'] == $dtfp['idmod']) $modact = "Si";
				}
			}
			if ($modact == "Si") { ?>
				<form action="pmod.php" method="POST">
					<button type="submit" class="modulo">
						<?php if (file_exists($dt['imgmod'])) { ?>
							<img class="logmod" src="<?= $dt['imgmod']; ?>" alt="Logo módulo <?= $dt['nommod']; ?>" />
						<?php } else { ?>
							<img class="logmod" src="img/logo.png" alt="Logo módulo <?= $dt['nommod']; ?>" />
						<?php } ?>
						<br>
						<?= $dt['nommod']; ?>
					</button>
					<input type="hidden" name="idmod" value="<?= $dt['idmod']; ?>">
					<input type="hidden" name="ope" value="dircc">
				</form>
			<?php } else { ?>
				<form>
					<button disabled class="modulo1">
						<?php if (file_exists($dt['imgmod'])) { ?>
							<img class="logmod" src="<?= $dt['imgmod']; ?>" alt="Logo módulo <?= $dt['nommod']; ?>" />
						<?php } else { ?>
							<img class="logmod" src="img/logo.png" alt="Logo módulo <?= $dt['nommod']; ?>" />
						<?php } ?>
						<br>
						<?= $dt['nommod']; ?>
					</button>
				</form>
	<?php }}} ?>
</div>
<style>
	.secmod {
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 30px;
		width: 70%;
		margin: auto;
		justify-content: center;
		align-items: center;
		text-align: center;
		height: 500px;
	}

	.modulo,
	.modulo1 {
		background-color: rgba(255, 255, 255, 0.8);
		padding: 15px;
		border-radius: 30px;
		justify-content: center;
		align-items: center;
		text-align: center;
		box-shadow: 0 4px 10px rgba(7, 54, 99, 0.2);
		border: none;
		width: 80%;
	}

	.logmod {
		width: 80%;
	}

	.modulo:hover {
		box-shadow: 0 4px 20px rgba(7, 54, 99, 0.2);
		background-color: rgba(7, 54, 99, 0.2);
	}

	@media screen and (max-width: 1024px) {
		.secmod {
			width: 90%;
			gap: 15px;
		}
	}

	@media screen and (max-width: 600px) {
		.secmod {
			display: inline-block;
			justify-content: center;
			align-items: center;
			text-align: center;
			width: 100%;
		}

		.modulo,
		.modulo1 {
			width: 50%;
			margin: 15px 0;
		}

	}
</style>

<!-- <a href="home.php">Home</a> -->