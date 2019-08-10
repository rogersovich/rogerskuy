<style type="text/css">
	div {
	    box-sizing: border-box;
	    display: inline-block;
	    height: 30px;
	    text-align: left;
	    width: 20%;
	}
	.green {
	    background: none;
	}
	.blue {
	    background: none;
	}
	.titik2{
		margin-left: 70px;
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

<h3><b>Laporan</b></h3>

<div class="green">
	Nomer<span class="titik2">:</span>
</div>
<div class="blue">
	L0000001
</div>

<br>

<div class="green">
	Tanggal<span class="titik2">:</span>
</div>
<div class="blue">
	<?= date("Y-m-d") ?>
</div>

<br>
<hr>
<br>


<table>
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH BARANG</th>
			<th>SIZE</th>
			<th>HARGA BARANG</th>
			<th>SUBTOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php $i= 1; ?>
		<?php foreach($data as $key => $val): ?>
		<?php foreach ($val->order_details as $keys => $od): ?>

	    <tr>
	    	<td><?= $i; ?></td>
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
	    <?php $i++; ?>
	    <?php endforeach; ?>
	    <?php endforeach; ?>
	</tbody>
</table>