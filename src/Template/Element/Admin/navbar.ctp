<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.html">
                WARUNG SANTUY
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <input class="form-control" type="text" placeholder="Search..">
                        </div>
                    </li>
                        
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <img src="../assets/images/avatar.jpg" class="user-avatar-md rounded-circle"> -->
                        <span uk-icon="icon:user;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">
                                    <?= $user->username; ?>
                                </h5>
                                <span class="status"></span><span class="">Available</span>
                            </div>
                            <a class="dropdown-item" href="<?= $this->Url->build([
                                'prefix' => 'admin',
                                'controller' => 'Users',
                                'action' => 'logout'
                            ])?>">
                                <i class="fas fa-power-off mr-2"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->