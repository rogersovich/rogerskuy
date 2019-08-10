<style type="text/css">
	.error{
		color: #f0506e;
	}
	.uppersace{
		text-transform: uppercase;
	}
</style>

<div class="uk-container">
	<div class="text-title" style="padding-top: 0px;">
		<nav class="uk-navbar-container" uk-navbar style="background: none;">
		    <div class="uk-navbar-right">

		        <ul class="uk-navbar-nav">
		            <li class="uk-active">
		            	<?php if(@$res == null): ?>
		            	<a href="#cart-modal" uk-toggle>
		            		<span uk-icon="cart"></span>
		            		<span style="margin-left: 5px;">
		            			<?= array_sum($res); ?>
		            		</span>
		            	</a>
		            	<?php else: ?>
		            	
		            	<a href="<?= $this->Url->build(['controller' => 'Carts', 'action' => 'index' ]) ?>">
		            		<span uk-icon="cart"></span>
		            		<span style="margin-left: 5px;">
		            			<?= array_sum($res); ?>
		            		</span>
		            	</a>
		            	<?php endif; ?>
		        	</li>
		            <li>
		            	
		            	<a href="#modal-center" uk-toggle>
			            	<span uk-icon="user" ></span>   		
			            </a>
		        	</li>
		            
		        </ul>

		    </div>
		</nav>
		<p class="uk-text-center uk-heading-large" style="margin-top: 0px; margin-bottom: 0px; padding-bottom: 50px;">WARUNG SANTUY</>
	</div>

	<div id="modal-center" class="uk-flex-top" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

	        <button class="uk-modal-close-default" type="button" uk-close></button>

	        <?php if(@$user->id == null): ?>
	        <div>
	        	<h1>Anda Belum Login, Silah Login Dulu</h1>
	        	<a href="<?= $this->Url->build([
                'controller' => 'Customers',
                'action' => 'login',
                'prefix' => false
            ]) ?>" class="uk-text-uppercase uk-button uk-button-default">Login</a>
	        </div>
	        <?php else: ?>
	        <div>
	        	<h3>
	        	Id : <?= @$user->id ?>
		        </h3>
		       	<h3>
		       		Username : <?= @$user->username ?>		
		       	</h3>
		       	<a href="<?= $this->Url->build([
                'controller' => 'Customers',
                'action' => 'logout',
                'prefix' => false
            ]) ?>" class="uk-text-uppercase uk-button uk-button-default">Logout</a>
	        </div>
            <?php endif; ?>

	    </div>
	</div>

	<div id="cart-modal" class="uk-flex-top" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

	        <button class="uk-modal-close-default" type="button" uk-close></button>

	       	<h1>Keranjang Anda Masih Kosong, Silahkan Order</h1>

	    </div>
	</div>
	
	<?= $this->element('navbar'); ?>

	<div class="uk-section uk-section-white uk-preserve-color" style="padding: 30px;">
	    <div class="uk-container">
	        
	        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2 uk-margin" uk-grid>
	        	<?php foreach($productCategory as $pc): ?>
	        	<?php 
		            $dirdoang = $pc->file_dir;
		            $dir = str_replace('\\','/',$pc->file_dir);
		            //dd($dir);
		        ?>
			    <div class="uk-card-media-left uk-cover-container" >
			        <img src="<?= $this->url->build(str_replace('webroot','',$dir) . $pc->file ) ?>">
			    </div>
			    <div>
			        <div class="uk-card-body">

			            <h3 class="uk-card-title uk-text-uppercase">
			            	<?= $pc->name ?>
			            </h3>
			            <br>
			            <p class="uk-text-bold">
			            	<?php if($pc->stock - @$rc == null): ?>
			            		<span class="uk-text-danger">
			            			Stock: <?= $pc->stock - @$rc ?>
			            		</span>
			            	<?php elseif($pc->stock - @$rc <= 10): ?>
			            		<span class="uk-text-warning">
			            			Stock: <?= $pc->stock - @$rc ?>
			            		</span>
			            	<?php else: ?>
			            		<span class="uk-text-success">
			            			Stock: <?= $pc->stock - @$rc ?>
			            		</span>
			            	<?php endif; ?>

			            </p>
			            <p>
			            	Rp <?=  $this->Number->format($pc->price) ?>
			            </p>
			            <?= $this->Form->create(null, [
			            	'url' => [
			            		'controller' => 'Carts',
			            		'action' => 'add'
			            	],
			            	'class' => 'form-basic'
			            ]) ?>

			            	<?php if($pc->category_id == 5): ?>

			            	<?php else: ?>
			            		<div class="div-size">
				            		<label>SIZE</label>
					            	<select name="size" class="uk-select">
					            		<option value="">Choose Any Options</option>
					            		<option value="S">S</option>
					            		<option value="M">M</option>
					            		<option value="L">L</option>
					            	</select>
				            	</div>
			            	<?php endif; ?>


			            	<div>
			            		<input type="hidden" name="stock_dulu" value="<?= $pc->stock - @$cart->qty ?>">
			            		<input type="hidden" name="product_id" value="<?= $pc->id ?>">
			            		<input type="hidden" name="price" value="<?= $pc->price ?>">
			            	</div>

			            	<div id="param-output">
			            		
			            	</div>

			            	<div class="div-size">
			            		<label>Jumlah</label>
			            		<input type="number" class="uk-input qty-class" name="qty">
			            	</div>

			            	<br>

			            	<div>
			            		<button class="uk-button uk-button-primary">add to cart</button>
			            	</div>
			            	
			            <?= $this->Form->end() ?>
			  
			        </div>
			    </div>
				<?php endforeach; ?>
			</div>

	    </div>
	</div>

</div>

<script type="text/javascript">
	$( document ).ready(function() {

		$('.uk-button').on('click', function(){

			var qty = $('.qty-class').val();
			$('.error').addClass('error');
		})

		

		$('.form-basic').validate({
			rules: {
				size: {
					required: true
				}, 
				qty: {
					required: true,
					min: 1
				}
			},
			messages : {
				size: {
					required: "isi size dahulu"
				},
				qty: {
					required: "isi jumlah dahulu",
					min: "jumlah tidak boleh MIN"
				}
			}
		});

		var url = window.location.href;
    
	    var urls = url.split('localhost/pos_app/pages/shop/');
	    
	    var titleCategory = urls[1];

	    var output = document.getElementById("param-output");

	    output.innerHTML = "<input type='hidden' name='params' value='"+ titleCategory +"'> "

	    //console.log(titleCategory);

	});
</script>