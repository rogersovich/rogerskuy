<nav class="uk-navbar-container" uk-navbar style="background: none;">
    <div class="uk-navbar-center">

        <ul class="uk-navbar-nav">
            <li class="uk-active">
            	<a href="<?= $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'index'
                ]) ?>" class="uk-text-uppercase">Home</a>
            </li>
            <li>
                <a href="#" class="uk-text-uppercase">Category</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active">
                            <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','all'
                            ]) ?>">All</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','shirt'
                            ]) ?>">Shirt</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','t-shirt'
                            ]) ?>">T-Shirt</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','hood'
                            ]) ?>">Hoods</a>
                        </li>
                        <li>
                             <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','jacket'
                            ]) ?>">Jacket</a>
                        </li>
                        <li>
                             <a href="<?= $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'category','accessories'
                            ]) ?>">Accessories</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'about'
                ]) ?>" class="uk-text-uppercase">About</a>
            </li>
            <?php if(@$user->id == null): ?>
            <li>
                <a href="<?= $this->Url->build([
                'controller' => 'Customers',
                'action' => 'login',
                'prefix' => false
            ]) ?>" class="uk-text-uppercase">Login</a>
            <?php else: ?>

            <?php endif; ?>
        </li>
        </ul>

    </div>
</nav>