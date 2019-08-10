<div class="uk-container" style="padding-top: 50px;">
	<?= $this->Form->create() ?>

	<fieldset>
	    
	    <a class="uk-button uk-button-danger" href="<?= $this->Url->build([
			'controller' => 'Pages',
			'action' => 'index'
		]) ?>">Back</a>
		<h1 class="uk-heading-medium">Halaman Login Member</h1>
		<br>
		<div class="uk-margin">
			<?= $this->Form->control('username', ['class' => 'uk-input']) ?>
	    	<?= $this->Form->control('password', ['class' => 'uk-input']) ?>
		</div>
	    
	</fieldset>
	<br>
	<div class="uk-margin">
		<button class="uk-button uk-button-primary">Login</button>
	</div>

	<?= $this->Form->end() ?>
</div>