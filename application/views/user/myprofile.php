<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">My Profile</h5>
        <div class="container">
            <div class="dataTables_length" id="DataTables_Table_1_length">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td>:</td>
                                    <td><?=$user['username'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td><?=$user['email'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row">password</th>
                                    <td>:</td>
                                    <td><?=$user['password'];?></td>
                                </tr>
                                <p>password encrypt SHA5</p>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button modal -->
    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalUpdateUser">
        Update Profile
    </button>
</div>

<!-- Modal Update -->
<div class="modal fade" id="modalUpdateUser" tabindex="-1" aria-labelledby="modalUpdateUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateUserLabel">Harap perbarui password atau ketik ulang password lama, Demi keamanan akun bersama</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUpdateUser" action="<?=base_url('User/update_profile');?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=$user['username'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$user['email'];?>">
                    </div>
                    <div class="mb-3">
                        <p>password must be 6 character</p>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?=$user['password'];?>">
                        <p>password encrypt SHA5</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
