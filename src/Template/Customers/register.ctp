<?= $this->Html->css([
        '../assets/src/fonts/material-icon/css/material-design-iconic-font.min',
        '../assets/src/css/style-1'
]) ?>


<div class="main">
    <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?= $this->Form->create(null, [
                            'class' => 'register-form',
                            'id' => 'register-form'
                        ]) ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_depan" placeholder="Your Front Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_belakang" placeholder="Your Back Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-pin material-icons-name"></i></label>
                                <input type="text" name="address" placeholder="Your Adrress"/>
                            </div>
                            <!-- group -->
                            <input type="hidden" name="group_id" value="2">
                            <!-- end -->
                            <!-- saldo -->
                            <input type="hidden" name="saldo" value="0">
                            <!-- end -->
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <!-- <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div> -->
                            
                            <div class="form-group form-button">
                                <button id="signup" class="uk-button-primary">
                                    SignUp
                                </button>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="signup-image">
                        <figure>
                            <?= $this->Html->image('../assets/images/signup-image.jpg'); ?>
                        </figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

</div>



<?= $this->Html->script([
        '../assets/src/js/main',
]) ?>