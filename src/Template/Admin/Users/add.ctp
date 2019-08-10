
<title>
    <?php $this->assign('title', 'users - Add') ?>
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
                            <h2 class="pageheader-title" id="apa">users </h2>
                        
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
                    <?= $this->Form->create($users, ['type' => 'file']) ?>
                    
                        <div class="form-group">
                            <label for="title-id">Username</label>
                            <input type="text" name="username" class="form-control" id="title-id" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label for="title-id">Password</label>
                            <input type="text" name="password" class="form-control" id="title-id" placeholder="Title">
                        </div>

                        <div class="form-group">
                        <?= $this->Form->control('group_id', ['class' => 'form-control', 'options' => $groups]); ?>
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



