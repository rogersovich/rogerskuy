



<title>
    <?php $this->assign('title', 'product - Edit') ?>
</title>

<?php 
    $this->extend('/Element/Admin/main');
 ?>

<?= $this->start('adminContent'); ?>
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
                            <h2 class="pageheader-title">product </h2>
                        
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="breadcrumb-link">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?= $this->Url->build(['action' => 'edit',@$id]) ?>"class="breadcrumb-link" style="color: #5969ff;">
                                                <?= @$breadCrumb ?>
                                            </a>  
                                        </li>
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
                    <?= $this->Form->create($product, ['type' => 'file']) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <?= $this->Form->control('category_id', ['class' => 'form-control', 'options' => $categories]); ?>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('price', ['class' => 'form-control']) ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->control('stock', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label>Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <?= $this->Form->end() ?>

                    
                </div>
            </div>
        </div>
        
    </div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php $this->end(); ?>
    