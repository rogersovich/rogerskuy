<?php $this->start('css'); ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css') ?>
<?php $this->end(); ?>

<div class="container">
	<br><br>

	<div class="text">
		<h1>Pilih Tipe Print</h1>
	</div>

	<br><br>

	<a class="uk-icon-button" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', 'prefix' => 'admin']) ?>" uk-icon="icon: chevron-left; ratio: 2;"></a>
	
	<br><br>

	<div class="card">
		<div class="card-body">

			<?= $this->Form->create('') ?>

			<div class="row">
				<div class="col-md-4">
						
					  	<?= $this->Form->control('type', [
					  		'class' => 'custom-select',
					  		'id' => 'input-select',
					  		'options' => [
					  			'0' => 'Choose',
					  			'1' => 'Month',
					  			'2' => 'Year',
					  			'3' => 'Periode'
					  		]
					  	]) ?>
				</div>
				<div class="col-md-4">
					<div class="form-group">

						<div class="input-group" id="choose-input">
						  <?= $this->Form->control('date', [
						  	'class' => 'form-control',
						  	'id' => 'choosePicker'
						  ]) ?>
						</div>

						<div class="input-group" id="month-input">
						  <?= $this->Form->control('month', [
						  	'class' => 'form-control',
						  	'id' => 'monthPicker'
						  ]) ?>
						</div>

						<div class="input-group" id="year-input">
						  <?= $this->Form->control('year', [
						  	'class' => 'form-control',
						  	'id' => 'yearPicker'
						  ]) ?>
						</div>

						<div class="input-group" id="from-input">
						  <?= $this->Form->control('from', [
						  	'class' => 'form-control',
						  	'id' => 'fromPicker'
						  ]) ?>
						</div>

						<div class="input-group" id="to-input">
						  <?= $this->Form->control('to', [
						  	'class' => 'form-control',
						  	'id' => 'toPicker'
						  ]) ?>
						</div>

						
		            </div>
				</div>
				<div class="col-md-4" style="margin-top: 30px;">
					<div class="input-group mb-3">	
					  <button class="btn btn-primary" formtarget="_blank">Print</button>
					</div>
				</div>
			</div>

			<?= $this->Form->end() ?>
		</div>
	</div>
</div>

<script>

	$( document ).ready(function() {

		var availableTags = [
	      "ActionScript",
	      "AppleScript",
	      "Asp",
	      "BASIC",
	      "C",
	      "C++",
	      "Clojure",
	      "COBOL",
	      "ColdFusion",
	      "Erlang",
	      "Fortran",
	      "Groovy",
	      "Haskell",
	      "Java",
	      "JavaScript",
	      "Lisp",
	      "Perl",
	      "PHP",
	      "Python",
	      "Ruby",
	      "Scala",
	      "Scheme"
	    ];

	    //console.log(availableTags)

		$('#year-input').hide();
		$('#month-input').hide();
		$('#from-input').hide();
		$('#to-input').hide();

		$('#monthPicker').autocomplete({
			source: availableTags
		})

		$('#yearPicker').autocomplete({
			source: availableTags
		})

		$('#choosePicker').autocomplete({
			source: availableTags
		})

		$('#fromPicker').autocomplete({
			source: availableTags
		})

		$('#toPicker').autocomplete({
			source: availableTags
		})

		$('#choosePicker').attr('readOnly',true)

		$('#input-select').on('change', function() {
			var value = $(this).val();

			if(value == 1){
				
				$('#yearPicker').val('');
				$('#fromPicker').val('');
				$('#toPicker').val('');
				$('#year-input').hide();
				$('#choose-input').hide();
				$('#from-input').hide();
				$('#to-input').hide();
				$('#month-input').show();
				$('#monthPicker').datetimepicker( {
		            viewMode: 'years',
	                format: 'YYYY-MM'
	            });
	            
	            

			}else if(value == 2){

				$('#monthPicker').val('');
				$('#fromPicker').val('');
				$('#toPicker').val('');
				$('#month-input').hide();
				$('#choose-input').hide();
				$('#from-input').hide();
				$('#to-input').hide();
				$('#year-input').show();				
				$('#yearPicker').datetimepicker( {
		            viewMode: 'years',
	                format: 'YYYY'
	            });

			}else if(value == 3){

				$('#monthPicker').val('');
				$('#yearicker').val('');
				$('#month-input').hide();
				$('#year-input').hide();
				$('#choose-input').hide();
				$('#from-input').show();
				$('#to-input').show();

				$('#toPicker').datetimepicker( {
		            viewMode: 'years',
	                format: 'YYYY-MM-DD'
	            });

	            $('#fromPicker').datetimepicker( {
		            viewMode: 'years',
	                format: 'YYYY-MM-DD'
	            });
			}else{

				$('#fromPicker').val('');
				$('#toPicker').val('');
				$('#monthPicker').val('');
				$('#yearicker').val('');
				$('#year-input').hide();
				$('#month-input').hide();
				$('#from-input').hide();
				$('#to-input').hide();
				$('#choose-input').show();
			}
		})

		$('#monthPicker').on('change', function(){

			//console.log('month');
		})
	
	});
</script>
