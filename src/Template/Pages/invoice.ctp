<div class="uk-container" style="padding: 40px; background: white; max-width: 1400px">
	<h1 class="uk-heading-small uk-text-uppercase">warung santuy</h1>

	<h4 class="uk-text-large uk-text-bold">Invoice</h4>

	<?= $this->Form->create(null) ?>

	<div class="uk-grid-small" uk-grid>
		 <div class="uk-width-1-4@s">
	        <p class="uk-text-small uk-margin-small-bottom ">Nomor. Invoice</p>
	    </div>
	    <div class="uk-width-1-4@s">
	       <?= $order->code ?>
	    </div>
	</div>

	<div class="uk-grid-small" uk-grid>
		 <div class="uk-width-1-4@s ">
	        <p class="uk-text-small uk-margin-small-top ">Tanggal</p>
	    </div>
	    <div class="uk-width-1-4@s">
	       <?= date_format($order->date, 'Y-m-d') ?>
	    </div>
	</div>
	
	<div class="uk-grid-small" uk-grid>
		 <div class="uk-width-1-4@s ">
	        <p class="uk-text-small uk-margin-small-top ">Customer Name</p>
	    </div>
	    <div class="uk-width-1-4@s">
	       <?= $customer->nama_depan.' '.$customer->nama_belakang ?>
	    </div>
	</div>

	<hr>

	

	<div class="uk-overflow-auto">
	    <table class="uk-table uk-table-small uk-table-middle uk-table-justify">
	        <thead>
	            <tr>
	                <th class="uk-table-expand">Nama Produk</th>
	                <th class="uk-table-expand">Jumlah Barang</th>
	                <th class="uk-table-expand">Size</th>
	                <th class="uk-table-expand">Harga Barang</th>
	                <th class="uk-table-shrink">Subtotal</th>
	            </tr>
	        </thead>
	        <tbody>
				<?php foreach($orderDetails as $od): ?>
	            <tr>
	                <td class="uk-text-uppercase"><?= $od->product->name ?></td>
	                <td><?= $od->qty ?></td>
	                <td>
		                	<?php if($od->size == null): ?>
		                		All Size
		                	<?php else: ?>
		                		<?= $od->size ?>
		                	<?php endif; ?>		
	                </td>
	                <td><?= $od->product->price ?></td>
	                <td>
	                	<?php
	                		//$total = [];
	                		$subtotal = (int)$od->qty * (int)$od->product->price;
	                		$total[] = $subtotal;
	                	?>
	                	<?= number_format($subtotal) ?>		
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	</div>

	<hr>

	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	    		<td class="uk-table-expand uk-padding-remove">Total</td>          	            
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">	
	            	<?= number_format( array_sum($total) ); ?>
	            </td>
	            
	    	</tr>
	    </tbody>
	</table>

	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	            <td class="uk-table-expand uk-padding-remove">Saldo Awal</td>
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">
	            	<?= number_format($order->saldo_terpakai + $saldoAkhir) ?>
	            </td>
	            
	        </tr>
	    </tbody>
	</table>

	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	            <td class="uk-table-expand uk-padding-remove">Saldo Akhir</td>
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">
	            	<?= number_format($saldoAkhir) ?>
	            </td>
	            
	        </tr>
	    </tbody>
	</table>

	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	            <td class="uk-table-expand uk-padding-remove">Saldo Terpakai</td>
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">
	            	<?= number_format($order->saldo_terpakai) ?>
	            </td>
	            
	        </tr>
	    </tbody>
	</table>

	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	            <td class="uk-table-expand uk-padding-remove">Uang</td>
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">
	            	<?= number_format($order->paid) ?>
	            </td>
	            
	        </tr>
	    </tbody>
	</table>
	<hr>
	<table class="uk-table uk-table-justify">
	    <tbody>
	    	<tr>
	            <td class="uk-table-expand uk-padding-remove">Kembalian</td>
	            <td class="uk-table-shrink uk-text-capitalize uk-padding-remove" style="font-size: 16px;">
	            	<?= number_format($order->change_money) ?>
	            </td>
	            
	        </tr>
	    </tbody>
	</table>

	<div class="uk-margin">
		<button class="uk-button uk-button-danger" id="print-id" formtarget="_blank" style="float: right;">Cetak</button>
	</div>

	<div class="uk-margin">
		<a class="uk-button uk-button-primary" href="<?= $this->Url->build(['action' => 'index']) ?>" id="back-id" style="float: right;">
			Back
		</a>
	</div>
	<?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $( document ).ready(function() {

    	$('#back-id').hide();

    	$('#print-id').on('click', function(){
    		$('#print-id').hide();
    		$('#back-id').show();
    	})

	  //  	document.getElementById("print-id").onclick = function () {\
	  //  		$('#print-id').hide();
			// $('#back-id').show();	       	
	  //   };	

	});
</script>