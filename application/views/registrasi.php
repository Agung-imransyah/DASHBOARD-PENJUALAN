
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                            </div>

                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?php echo base_url('registrasi/index'); ?>" class="user">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                        id="exampleInputName" placeholder="Nama Anda" name="nama" 
                                        value="<?php echo set_value('nama') ?>">
                                    <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" 
                                        id="exampleInputUsername" placeholder="Username Anda" name="username"
                                        value="<?php echo set_value('username') ?>">
                                    <?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label class="small">Pilih Role</label>
                                    <select name="role_id" class="form-control" style="position:relative; z-index:1000;" id="roleSelect">
                                        <option value="">-- Pilih Role --</option>
                                        <option value="1" <?php echo set_select('role_id', '1'); ?>>Admin</option>
                                        <option value="2" <?php echo set_select('role_id', '2'); ?>>User</option>
                                    </select>
                                    <?php echo form_error('role_id', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>

                                <div class="form-group" id="adminCodeField" style="display: none;">
                                    <label class="small">Kode Admin</label>
                                    <input type="password" class="form-control form-control-user" 
                                        id="adminCode" placeholder="Masukkan kode admin" name="admin_code"
                                        value="<?php echo set_value('admin_code') ?>">
                                    <small class="form-text text-muted">Hubungi administrator untuk mendapatkan kode admin.</small>
                                    <?php echo form_error('admin_code', '<div class="text-danger small ml-2">', '</div>') ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" 
                                            id="exampleInputPassword" placeholder="Password" name="password_1">
                                        <small class="form-text text-muted">Minimal 6 karakter; harus mengandung huruf dan karakter khusus (mis. @, #, !).</small>
                                        <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" 
                                            id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    DAFTAR
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle admin code field visibility based on role selection
        document.getElementById('roleSelect').addEventListener('change', function() {
            const adminCodeField = document.getElementById('adminCodeField');
            if (this.value === '1') {
                adminCodeField.style.display = 'block';
            } else {
                adminCodeField.style.display = 'none';
                document.getElementById('adminCode').value = '';
            }
        });

        // Show admin code field on page load if Admin was previously selected
        window.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            if (roleSelect.value === '1') {
                document.getElementById('adminCodeField').style.display = 'block';
            }
        });
    </script>
</body>