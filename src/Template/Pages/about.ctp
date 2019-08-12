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
		        	<?php if(@$user->id == null): ?>
		            
		        	<?php else: ?>
		        		<li>	
			            	<a href="#saldo-modal" uk-toggle>
				            	<span uk-icon="plus-circle"></span>   		
				            </a>
			        	</li>
		        	<?php endif; ?>
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
            ]) ?>" class="uk-text-uppercase uk-button uk-button-primary">Sign In</a>

            	<hr>

            	<h1>Anda Belum Daftar ?</h1>

            	<a href="<?= $this->Url->build([
                'controller' => 'Customers',
                'action' => 'register',
                'prefix' => false
            ]) ?>" class="uk-text-uppercase uk-button uk-button-danger">Register</a>

            	<hr>

	        </div>
	        <?php else: ?>
	        <div>
		       	<h3>
		       		Nama : <?= @$member->nama_depan.' '.@$member->nama_belakang ?>		
		       	</h3>
		       	<h3>
		       		Email : <?= @$member->email ?>
		       	</h3>
		       	<h3>
	        		Alamat : <?= @$member->address ?>
		        </h3>
		       	<h3>
		       		Saldo : Rp <?= number_format(@$member->saldo) ?>
		       	</h3>
		       	<a href="<?= $this->Url->build([
                		'controller' => 'Customers',
                		'action' => 'logout',
                		'prefix' => false
            		]) ?>"
            		class="uk-text-uppercase uk-button uk-button-default" onclick="return confirm('Apa Anda Yakin Ingin Keluar ? , Jika Anda Keluar Keranjang Anda Akan Terhapus')" id="logout-id">
        			Logout
        		</a>
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

	<div id="saldo-modal" class="uk-flex-top" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

	        <button class="uk-modal-close-default" type="button" uk-close></button>

	       	<h1>Anda Ingin Mengisi Saldo Anda ?</h1>

	       	<a href="<?= $this->Url->build([
                'controller' => 'Pages',
                'action' => 'addSaldo',@$member->id,
                'prefix' => false
            ]) ?>" class="uk-text-uppercase uk-button uk-button-danger">Tambah Saldo</a>

	    </div>
	</div>

	<?= $this->element('navbar'); ?>

	<h1 class="uk-heading-medium uk-text-center uk-text-uppercase" style="padding-bottom: 50px; margin-top: 100px;">
		About	
	</h1>


	<p class="uk-text-lead uk-text-lowercase uk-text-emphasis uk-text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>

<script type="text/javascript">
	$( document ).ready(function() {

		function confirm_logout() {
		  return confirm('Apa Anda Yakin Ingin Keluar ? , Jika Anda Keluar Keranjang Anda Akan Terhapus.');
		}



	});
</script>