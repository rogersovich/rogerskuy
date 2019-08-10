<!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="product-id" href="<?= $this->Url->build([
                                    'prefix' => 'admin',
                                    'controller' => 'Products',
                                    'action' => 'index'])
                                ?>" >
                                    <i class="fa fa-fw fa-user-circle"></i>
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="category-id" href="<?= $this->Url->build([
                                    'prefix' => 'admin',
                                    'controller' => 'Categories',
                                    'action' => 'index']) 
                                ?>">
                                    <i class="fa fa-fw fa-rocket"></i>
                                    Categories
                                </a>
                            </li>
                            
                            
                            <?php if($user->group_id == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="user-id" href="<?= $this->Url->build([
                                    'prefix' => 'admin',
                                    'controller' => 'users',
                                    'action' => 'index'
                                ])?> ">
                                    <i class="fab fa-fw fa-wpforms"></i>
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="group-id" href="<?= $this->Url->build([
                                    'prefix' => 'admin',
                                    'controller' => 'groups',
                                    'action' => 'index'
                                ]) ?>">
                                    <i class="fab fa-fw fa-wpforms"></i>
                                    Groups
                                </a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" id="laporan-id" href="<?= $this->Url->build([
                                    'prefix' => false,
                                    'controller' => 'Pages',
                                    'action' => 'report'
                                ]) ?>">
                                    <i class="fab fa-fw fa-wpforms"></i>
                                    Report
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->


<script>

$(document).ready(function(){

    var url = window.location.href;
    
    var urls = url.split('localhost/pos_app/');
    //console.log(urls[1]);

    var param = urls[1].split('edit');
    

      if( urls[1] == 'admin/products' || urls[1] == 'admin' || urls[1] == 'admin/products/add' || urls[1] == 'admin/products/edit'+param[1] ){
        $('.nav-link').removeClass('active');
        $('#product-id').addClass('active');
      }else if( urls[1] == 'admin/categories' || urls[1] == 'admin/categories/' || urls[1] == 'admin/categories/add' || urls[1] == 'admin/categories/edit'+param[1] ){
        $('.nav-link').removeClass('active');
        $('#category-id').addClass('active');
      }else if( urls[1] == 'admin/users' || urls[1] == 'admin/users/' || urls[1] == 'admin/users/add' || urls[1] == 'admin/users/edit'+param[1] ){
        $('.nav-link').removeClass('active');
        $('#user-id').addClass('active');
      }else{
        $('.nav-link').removeClass('active');
        $('#group-id').addClass('active');
      }

});
</script>