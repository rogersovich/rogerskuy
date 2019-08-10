

<title>
    <?php $this->assign('title', 'product - Add') ?>
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
                            <h2 class="pageheader-title" id="apa">product </h2>
                        
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="breadcrumb-link">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?= $this->Url->build(['action' => 'add']) ?>"class="breadcrumb-link" style="color: #5969ff;">
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
                    
                        <div class="form-group">
                            <label for="title-id">Title</label>
                            <input type="text" name="name" class="form-control" id="title-id" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label for="title-id">Title</label>
                            <?= $this->Form->control('category_id', ['class' => 'form-control', 'options' => $categories->all()]); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="desc-id">Price</label>
                            <input type="number" name="price" class="form-control" id="desc-id" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="desc-id">Stock</label>
                            <input type="text" name="stock" class="form-control" id="desc-id" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label for="file-id">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="file-id">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        
    </div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php $this->end(); ?>

