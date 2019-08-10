<div class="container">
	<br><br>

	<div class="text">
		<h1>Tambah Saldo Anda Sepuasnya</h1>
	</div>

	<br><br>

	<a class="uk-icon-button" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index', 'prefix' => false]) ?>" uk-icon="icon: chevron-left; ratio: 2;"></a>
	
	<br><br>

	<div class="card">
		<div class="card-body">

			<?= $this->Form->create('null') ?>

			<div class="uk-margin">
				<label class="uk-text-uppercase">Saldo</label>
				<input type="text" name="saldo" class="uk-input">
			</div>
			<div class="uk-margin">
				 <button class="uk-button uk-button-danger">Tambah Saldo</button>
			</div>

			<?= $this->Form->end() ?>
		</div>
	</div>
</div>