<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="m-sm-6">
                        <div class="text-center mb-4">
                            <img src="<?= base_url('assets/img/avatars/avatar.jpg') ?>" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                        </div>
                        <div class="text-center mb-4">
                            <h1 class="text-white login-title">Login</h1>
                        </div>
                        <form method="post">
                            <div class="form-group mb-3">
                                <input class="form-control form-control-lg rounded-pill" type="text" name="username" placeholder="Enter username" />
                            </div>
                            <div class="form-group mb-3">
                                <input id="password" name="password" class="form-control form-control-lg rounded-pill" type="password" name="password" placeholder="*******" />
                                <span id="togglePassword" class="p-viewer">
                                    <i id="show" class="d-block" data-feather="eye" style="cursor: pointer"></i>
                                    <i id="hide" class="d-none" data-feather="eye-off" style="cursor: pointer"></i>
                                </span>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-lg btn-login text-white rounded-pill">Login</button>
                                <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                            </div><br>
                            <center>
                                <?php
                                if (isset($_GET['message'])) :
                                    echo "<font color='red'>" . strtoupper($_GET['message']) . "</font>";
                                endif;
                                ?>
                            </center>
                        </form>
                        <div class="mt-5 text-center">
                            <p class="text-white">Belum memiliki akun? <a class="text-white" href="<?= base_url('register') ?>"><b>Klik di sini</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const p_view = document.querySelector('#togglePassword');;
    const pass = document.querySelector('#password');


    p_view.addEventListener('click', () => {
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';

        password.setAttribute('type', type);
        if (type === 'password') {
            document.querySelector('#show').classList.add('d-block');
            document.querySelector('#show').classList.remove('d-none');
            document.querySelector('#hide').classList.add('d-none');
            document.querySelector('#hide').classList.remove('d-block');
        } else {
            document.querySelector('#show').classList.add('d-none');
            document.querySelector('#show').classList.remove('d-block');
            document.querySelector('#hide').classList.add('d-block');
            document.querySelector('#hide').classList.remove('d-none');
        }
    });
</script>