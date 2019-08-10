<div class="uk-container">
	<div class="text-title" style="padding-top: 30px;">
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
		<h1 class="uk-text-center uk-heading-large">WARUNG SANTUY</h1>
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

	<h1 class="uk-heading-medium uk-text-center uk-text-uppercase" id="title-category" style="padding-bottom: 50px; margin-top: 100px;">	
	</h1>

	<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
		<?php foreach($productCategory as $pc): ?>
		<?php 
            $dirdoang = $pc->file_dir;
            $dir = str_replace('\\','/',$pc->file_dir);
            $category = strtolower($pc->category->nama);
            //dd($category);
            $categoryName = str_replace(' ','-',$pc->name);
        ?>
	    <div>
	        <div class="uk-card uk-card-default uk-card-body">
	        	<a href="<?= $this->Url->build([
	        		'controller' => 'Pages',
	        		'action' => 'shop',$category,$categoryName
	        	]) ?>">
	        		<img src="<?= $this->url->build(str_replace('webroot','',$dir) . $pc->file ) ?>" width="300" height="100">
	        	</a>
	          	<h3><?= $pc->name ?></h3>
	          	<div class="info-div">
	          		<p class="harga-cl">Rp <?= $this->Number->format($pc->price) ?></p>
	          	</div>
	          	
	        </div>
	    </div>
		<?php endforeach; ?>
	</div>

</div>

<script type="text/javascript">
	$( document ).ready(function() {

		var url = window.location.href;
    
	    var urls = url.split('localhost/pos_app/pages/category/');
	    
	    var titleCategory = urls[1];
	    //console.log(titleCategory);

	    //var param = urls[1].split('edit');
	    $('#title-category').text(titleCategory);
	});
</script>