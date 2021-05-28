<main class="container">
    <br/>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-body shadow bg-light">
                <br/>
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="card card-body border-0 bg-light">
                            <div class="row justify-content-center">
                                <img src="<?= base_url('assets/imgs/logo/muk-logo.png')?>" class="rounded" width="50%" height="150"/>
                            </div>
                            <div class="row justify-content-center">
                                <h1 class="font-weight-bold text-info">SCIT VOTES <i class="fas fa-check-circle"></i> </h1>
                                <span class="text-info">Welcome to the SCIT E-VOTING SYSTEM, <br/> If you are student, your User ID is your Student Number and your Password is also your Student Number. If you are another user, your User ID is your email and your password is the password used when creating an account</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <h4 class="font-weight-bold">LOGIN</h4>
                        <br/>
                        <form action="<?= site_url('home/auth') ?>" method="post" id="loginForm">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <i class="fas fa-envelope text-primary"></i> <input type="text" name="email" class="form-control-custom bg-light" placeholder="enter your email or phone number" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <div class="input-group">
                                    <a href="javascript:void(0)" class="text-primary" id="show-password"><i class="fas fa-eye text-primary"></i></a>
                                    <a href="javascript:void(0)" class="text-primary d-none" id="hide-password"><i class="fas fa-eye-slash text-primary"></i></a>
                                </div>
                                <input type="password" name="password" id="password" placeholder="password" class="form-control-custom bg-light" autocomplete="off" required/>
                            </div>
                            <div class="form-group">
                                <label for="login" class="sr-only">Login</label>
                                <input type="hidden" name="login" value="1"/>
                                <button type="submit" class="btn btn-info w-100 login-btn">PROCEED</button>
                            </div>
                        </form>
                        <div class="response"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>