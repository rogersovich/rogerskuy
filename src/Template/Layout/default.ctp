
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    
    <?= $this->fetch('css') ?>
    <?= $this->Html->css([
        '../assets/src/css/uikit',
        '../assets/src/css/bootstrap-datetimepicker.min',
        '../assets/src/css/dataTables.semanticui.min',
        '../assets/src/css/semantic.min',
        '../assets/vendor/bootstrap/css/bootstrap.min',
        '../assets/vendor/fonts/circular-std/style',
        '../assets/libs/css/style',
        '../assets/vendor/fonts/fontawesome/css/fontawesome-all',
        '../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min',
        '../assets/vendor/fonts/flag-icon-css/flag-icon.min'
    ]) ?>


    <?= $this->fetch('script') ?>
    <?= $this->Html->script([
        '../assets/src/js/jquery-3.4.1.min',
        '../assets/src/js/jquery.validate',
        '../assets/src/js/jquery-ui.min',
        '../assets/src/js/moment.min',
        '../assets/src/js/uikit',
        '../assets/src/js/uikit-icons',
        '../assets/src/js/sweetalert2.all',
        '../assets/src/js/bootstrap.min',
        '../assets/src/js/bootstrap.bundle',
        '../assets/src/js/bootstrap-datetimepicker.min',
        '../assets/src/js/semantic.min',
        '../assets/src/js/datatables.min',
        '../assets/src/js/dataTables.semanticui.min',
        '../assets/vendor/slimscroll/jquery.slimscroll',
        '../assets/libs/js/main-js'
    ]) ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</body>
</html>
