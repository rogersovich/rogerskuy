<style type="text/css">
	div {
	    box-sizing: border-box;
	    display: inline-block;
	    height: 30px;
	    text-align: left;
	    width: 20%;
	}
	.titik2{
		margin-left: 10px;
	}

	table, td, th {  
	  border: 1px solid #ddd;
	  text-align: left;
	}

	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  padding: 15px;
	}

	.card-4{

	}

</style>

<h1>Warung Santuy</h1>

<br>

<p><b>Invoice</b></p>

<div class="green">
	Nomer Invoice<span class="titik2">:</span>
</div>
<div class="blue">
	<?= $order->code ?>
</div>

<br>

<div class="green">
	Tanggal<span class="titik2">:</span>
</div>
<div class="blue">
	<?= date_format($order->date, 'Y-m-d') ?>
</div>

<br>

<div class="green">
	Customer Name<span class="titik2">:</span>
</div>
<div class="blue">
	<?= $customer->nama_depan.' '.$customer->nama_belakang ?>
</div>

<br>
<hr>
<br>

<table>
	<thead>
		<tr>
			<th>NAMA PRODUK</th>
			<th>JUMLAH BARANG</th>
			<th>SIZE</th>
			<th>HARGA BARANG</th>
			<th>SUBTOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($orderDetails as $od): ?>
	    <tr>
	        <td><?= $od->product->name ?></td>
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
	            <?= $subtotal ?>		
	        </td>
	        </tr>
	    <?php endforeach; ?>
	</tbody>
</table>

<br><br>

<div class="card-3">
	Total<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format( array_sum($total) ); ?>
</div>

<br>

<div class="card-3">
	Saldo Awal<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format($order->saldo_terpakai + $saldoAkhir ); ?>
</div>

<br>

<div class="card-3">
	Saldo Akhir<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format($saldoAkhir); ?>
</div>

<br>

<div class="card-3">
	Saldo Terpakai<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format($order->saldo_terpakai); ?>
</div>

<br>

<div class="card-3">
	Bayar<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format($order->paid) ?>
</div>

<br><br><br>

<div class="card-3">
	Kembalian<span class="titik2">:</span>
</div>
<div class="card-4" style="float: right; text-align: right;">
	Rp <?= number_format($order->change_money) ?>
</div>