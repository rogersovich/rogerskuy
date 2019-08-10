
<title>
    <?= $this->assign('title', 'Dashboard'); ?>
</title>


<style type="text/css">
        .container-fluid{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
</style>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <!-- Navbar -->
        <?= $this->element('Admin/navbar'); ?>
        <!-- end navbar -->
        <!-- left sidebar -->
        <?= $this->element('Admin/sidebar'); ?>     
        <!-- end left sidebar -->
        
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Banner </h2>
                            
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active">
                                                <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="breadcrumb-link" style="color: #5969ff;">
                                                    Dashboard
                                                </a>
                                            </li>
                                            <!-- <li class="breadcrumb-item active">E-Commerce Dashboard Template</li> -->
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div>
                            <button class="ui basic button">
                                <i class="icon user"></i>
                                <a href="<?= $this->Url->build(['action' => 'add']) ?>" style="color: #333;">Tambah Data</a>
                            </button>
                        </div>
                        <br>
                        <table id="tabel-data" class="ui celled padded table" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>stock</th>
                                    <th>code_item</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                <?php 
                                    $dirdoang = $product->file_dir;
                                    $dir = str_replace('\\','/',$product->file_dir);
                                    //dd($dir);
                                
                                ?>
                                <tr>
                                    <td><?= $this->Number->format($product->id) ?></td>
                                    <td><?= $product->category->nama ?></td>
                                    <td><?= h($product->name) ?></td>
                                    <td><?= $this->Number->format($product->price) ?></td>
                                    <td><?= $product->stock ?></td>
                                    <td><?= $product->code_item ?></td>
                                    <td>
                                        <img src="<?= $this->url->build(str_replace('webroot','',$dir) . $product->file ) ?>" width="150" height="100">
                                    </td>
                                    <td>
                                        <div class="menu">
                                            <a uk-icon="icon:pencil;" class="uk-icon-button item" href="<?= $this->Url->build(['action' => 'edit',$product->id]) ?>">
                                            </a>
                                           
                                            <a uk-icon="icon:close;" class=" uk-icon-button icon-class icon-href item" data-id="<?= $product->id ?>">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script type="text/javascript">
        $(document).ready(function(){

            $('#tabel-data').DataTable();

            $('.ui.dropdown').dropdown();

            $('.icon-href').on('click', function() {

                alert('fsdsd')

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.value) {

                        var data = $(this).data('id')

                        window.location = "admin/product/delete/"+ data +" ";

                    }else{
                        Swal.fire(
                        'Cancelled!',
                        'Your file has been cancel.',
                        'error'
                        )
                    }
                    
                })
            })

        });
    </script>
