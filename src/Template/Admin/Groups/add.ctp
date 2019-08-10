<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List groups'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



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
                    <?= $this->Form->create($group, ['type' => 'file']) ?>

                        <div class="form-group">
                        <?= $this->Form->control('name', ['class' => 'form-control']); ?>
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




