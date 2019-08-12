

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


    <p class="uk-text-center uk-heading-medium" style="margin-top: 0px; margin-bottom: 0px; padding-bottom: 50px; padding-top: 50px;">Cart</>
    <?= $this->Form->create(null, ['url' => [
            'controller' => 'Orders',
            'action' => 'transaksi'
        ]]) ?>
    <div class="uk-child-width-1-2@s uk-child-width-1-2@m" uk-grid>
        
        <div>
            <div class="uk-card uk-card-default uk-card-body" style="width: 120%;">
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-small uk-table-divider">
                            <?php
                                $brg = []; 
                                    foreach($products as $p){
                                        $brg[] = [
                                            'id' => $p->id,
                                            'name' => $p->name,
                                            'harga' => $p->price
                                        ];
                                    }
                            ?>
                            <tr>
                                <th>
                                    Image
                                </th>
                                <th>Name</th>   
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        <tbody id="tbody">
                            <?php foreach($carts as $cart): ?>
                            <?php 
                                $dirdoang = $cart->product->file_dir;
                                $dir = str_replace('\\','/',$cart->product->file_dir);
                            ?>
                            <tr>
                                
                                <td>
                                    <img src="<?= $this->url->build(str_replace('webroot','',$dir) . $cart->product->file ) ?>" class="uk-width-small">
                                </td>
                                <td>

                                    <input type="hidden" class="class-product" name="order_details[<?= $cart->product->name.'-'.$cart->size ?>][product_id]" value="<?= $cart->product_id ?>">
                                    <input type="hidden" name="order_details[<?= $cart->product->name.'-'.$cart->size ?>][size]" value="<?= $cart->size ?>">
                                    <span class="uk-text-uppercase">
                                        <?= $cart->product->name.'-'.$cart->size ?>        
                                    </span>
                                </td>
                                <td>Rp <?= number_format($cart->product->price) ?></td>
                                <td>  
                                    <input type="text" class="qty-product uk-input" name="order_details[<?= $cart->product->name.'-'.$cart->size ?>][qty]" value="<?= $cart->qty ?>" style="width: 50px;">
                                </td>
                            
                                <td>
                                    <?= $this->Form->postLink('Delete', ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?>
                                    
                                </td>

                                
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>     
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body" style="width: 85%; margin-left: 100px;">
                <p class="uk-text-medium uk-text-uppercase">Cart Total</p>

                <!-- <div class="uk-grid uk-margin-small-bottom">
                    <div class="uk-width-1-2">
                        <p class="uk-text-medium">                   
                            <span>
                                Product Name    
                            </span>
                        </p>
                    </div>
                    <div class="uk-width-1-2">
                        <p class="uk-text-medium">
                            <span class="uk-text-uppercase">Subtotal</span>
                        </p>
                    </div>
                </div>

                
                
                <?php foreach($subtotal as $sb): ?>
                <div class="uk-grid uk-margin-remove-top uk-margin-small-bottom">
                    <div class="uk-width-1-2">
                        <p class="uk-text-medium">
                            <span class="uk-text-capitalize">
                                <?= $sb['name'] ?>  
                            </span>   
                        </p>
                    </div>
                    <div class="uk-width-1-2">
                        <p class="uk-text-medium">
                            <input type="text" disabled value="Rp <?= number_format($sb['subtotal']) ?> "> 
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                 -->

                <hr>

                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <p class="uk-text-medium uk-text-uppercase">
                            <span>Total</span>
                            <input type="hidden" name="total_price" id="total-id" value="<?= $totals ?>">
                            
                        </p>
                    </div>
                    <div class="uk-width-1-2">
                        <p>
                            <input type="text" class="uk-input" disabled id="total-change-id" value="Rp <?= number_format($totals) ?>">
                        </p>
                    </div>
                </div>


                <hr>

                <input type="hidden" name="id_user" value="<?= $user->id ?>">

                <div class="uk-margin" uk-margin id="sisa-bayar">
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Sisa Bayar</label>
                        <input class="uk-input" disabled value="0" id="sisa-bayar-id" type="text">
                    </div>
                </div>

                <div class="uk-margin" uk-margin id="saldo-awal">
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Saldo Awal</label>
                        <input class="uk-input" disabled name="" id="saldo-awal-id" type="text">
                    </div>
                </div>

                <div class="uk-margin" uk-margin id="sisa-saldo">
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Sisa Saldo</label>
                        <input class="uk-input" disabled name="" id="sisa-saldo-id" type="text">
                    </div>
                </div>

                <div class="uk-margin" uk-margin id="uang-biasa">
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Uang</label>
                        <input class="uk-input" name="paid" value="" id="paid-id" type="text" placeholder="Masukan Uang">
                    </div>
                    
                    <br>
                </div>

                <div class="uk-margin" uk-margin>
                    <button type="button" class="uk-button uk-button-default" id="bayar-id">Bayar</button>
                        
                    <a href="#saldo-modal" class="uk-button uk-button-danger" id="use-saldo" uk-toggle>
                        Gunakan Saldo
                    </a>
                </div>

                <div class="uk-margin" uk-margin id="st-div-id">
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Saldo Terpakai</label>
                        <input class="uk-input" readonly name="saldo_terpakai" id="st-id" type="text" value="0">
                    </div>                    
                </div>

                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <label class="uk-form-label" for="form-stacked-text">Kembalian</label>
                        <input class="uk-input" readonly name="change_money" id="cm-id" type="text" value="">
                    </div>                    
                </div>

                <br>
                <button class="uk-button uk-button-danger uk-width-1-1 uk-button-large" id="checkout-id">Checkout</button>
            </div>
        </div>
        
    </div>

    <div id="saldo-modal" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" uk-overflow-auto>

            <button class="uk-modal-close-default" id="close-id" type="button" uk-close></button>

            <span class="uk-text-success uk-text-large">Total Bayar: <?= @$totals ?></span>
            <br>
            <span class="uk-text-success uk-text-large">Saldo Tersisa: <?= @$saldo->saldo ?></span>

            <br>
            <hr>

            <div class="uk-child-width-1-2@m" uk-grid>
                <div class="">
                    <button type="button" id="saldo-half" class="uk-button uk-button-default">
                        <span class="uk-text-warning">
                            Use Saldo Sebagian
                        </span>
                    </button>
                </div>
                <div class="" style="padding-left: 70px;">
                    <button type="button" id="saldo-full" class="uk-button uk-button-default">
                    <span class="uk-text-danger">
                        Use Saldo Sepenuhnya
                    </span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <?= $this->Form->end() ?>

    <br><br>

</div>

<script type="text/javascript">
    $( document ).ready(function() {

        //console.log(product);

        function confirm_logout() {
          return confirm('Apa Anda Yakin Ingin Keluar ? , Jika Anda Keluar Keranjang Anda Akan Terhapus.');
        }

        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        var cekKembali = $('#cm-id').val();

        $('#uang-terbayar').hide();
        $('#st-div-id').hide();
        $('#sisa-saldo').hide();
        $('#saldo-awal').hide();
        $('#sisa-bayar').hide();

        var saldo = "<?= $saldo->saldo; ?>"
        var totalSemua = "<?= $totals; ?>"

        $('#saldo-full').on('click', function(){
            var cek = saldo - totalSemua;

            if(cek >= 0){
                var usedSaldo = totalSemua;
                var kembali = usedSaldo - totalSemua;
                var sisaSaldo = saldo - totalSemua;
                var uang = 0;

                $( "#close-id" ).trigger( "click" );

                $('#paid-id').val(uang);
                $('#paid-id').attr('readonly', true);
                $('#uang-biasa').hide();
                $('#bayar-id').hide();
                $('#use-saldo').hide()
                $('#st-div-id').show();
                $('#saldo-awal').show();
                $('#saldo-awal-id').val(saldo);
                $('#sisa-saldo').show();
                $('#sisa-saldo-id').val(sisaSaldo);
                $('#st-id').val(usedSaldo);
                $('#cm-id').val(kembali);
                $('#checkout-id').attr('disabled',false);

            }else{
                alert('saldo anda tidak cukup') 
            }
        });


        $('#saldo-half').on('click', function(){

            if(confirm('Apakah Anda Yakin Ingin Memakai Saldo Anda ?')){
                var cek = saldo >= totalSemua;

                if(cek){
                    var usedSaldo = totalSemua;
                    var kembali = usedSaldo - totalSemua;
                    var sisaSaldo = saldo - totalSemua;
                    var uang = 0;

                    $( "#close-id" ).trigger( "click" );

                    $('#paid-id').val(uang);
                    $('#paid-id').attr('readonly', true);
                    $('#uang-biasa').hide();
                    $('#bayar-id').hide();
                    $('#use-saldo').hide()
                    $('#st-div-id').show();
                    $('#saldo-awal').show();
                    $('#saldo-awal-id').val(saldo);
                    $('#sisa-saldo').show();
                    $('#sisa-saldo-id').val(sisaSaldo);
                    $('#st-id').val(usedSaldo);
                    $('#cm-id').val(kembali);
                    $('#checkout-id').attr('disabled',false);

                }else{
                    var usedSaldo = saldo;
                    var kembali = usedSaldo - totalSemua;
                    var sisaSaldo = saldo - totalSemua;
                    var sisaBayar = totalSemua - saldo;
                    var uang = 0;

                    alert('Saldo Anda Telah Terpakai : Rp '+formatNumber(usedSaldo))

                    $( "#close-id" ).trigger( "click" );

                    $('#use-saldo').hide();
                    $('#sisa-bayar-id').val(sisaBayar);
                    $('#sisa-bayar').show(); 
                    $('#st-id').val(usedSaldo); 
                }

            }else{

            }
        
        })


        $('#bayar-id').on('click', function(){

            if($('#paid-id').val() == ""){
                alert('Masukan Uang Terlebih Dahulu!');
            }else{
                if($('#sisa-bayar-id').val() == 0){

                    var bayar = $('#paid-id').val();
                    var total = $('#total-id').val();

                    var cekUang = parseInt(bayar) < parseInt(total);

                    //console.log(total)

                    if(!cekUang){
                        var kembalian = parseInt(bayar)-parseInt(total);
                        $('#paid-id').attr('readonly',true)
                        $('#bayar-id').attr('disabled', true)
                        $('#cm-id').val(kembalian);
                        $('#use-saldo').hide();
                    }else{
                        alert('Uang anda kurang')
                    }

                    

                }else{

                    var bayar = $('#paid-id').val();
                    var total = $('#sisa-bayar-id').val();

                    var cekUang = parseInt(bayar) < parseInt(total);

                    //console.log(total)

                    if(!cekUang){
                        var kembalian = parseInt(bayar)-parseInt(total);
                        $('#paid-id').attr('readonly',true)
                        $('#bayar-id').attr('disabled', true)
                        $('#cm-id').val(kembalian);
                    }else{
                        alert('Uang anda kurang')
                    }

                }
            }


            var cekKembali = $('#cm-id').val();

            
 
            if(cekKembali == '' || cekKembali == 'NaN'){
                $('#checkout-id').prop('disabled', true);
            }else{
                $('#checkout-id').prop('disabled', false);
            }

        })


        if(cekKembali == '' || cekKembali == 'NaN'){
            $('#checkout-id').prop('disabled', true);
        }else{
            $('#checkout-id').prop('disabled', false);
        }

        var product = <?=json_encode($brg)?>;
        //console.log(product)

        total();

        function total() {

                var totalHarga = 0;
                var subtotal = [];

                var tr = $("#tbody").children('tr');

                $.each(tr, function(){
                    var id = $(this).find('td .class-product').val();
                    
                    var prd = product.find(item => item.id == id);       
                    
                    var qty = $(this).find('td .qty-product').val();
                    //console.log(prd);

                    

                    var harga = parseInt(prd.harga) * parseInt(qty);

                    subtotal.push(harga);

                    totalHarga+=harga;


                });

                //console.log(subtotal);

                $('#total-change-id').val('Rp '+ formatNumber(totalHarga) );
                $('#total-id').val(totalHarga);
        }


        $('body').on('keyup', '.qty-product', function(){
            total();
        });

        

    });
</script>

