<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Modify Admins - Healthcare Smart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php use Helpers\Func;

    require_once "layout/head_meta.php"; ?>
</head>

<body>

<?php require_once "layout/header.php"; ?>
<?php require_once "layout/sidebar.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Admins</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modify the selected admin - <?= $admin_details->first_name; ?> <?= $admin_details->last_name; ?></h5>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/modify-admins/<?= Func::dec_enc('encrypt', $admin_details->staff_id); ?>">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">First Name</label>
                                <input name="first_name" type="text" class="form-control" id="inputFirstName" value="<?= $admin_details->first_name; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Last Name</label>
                                <input name="last_name" type="text" class="form-control" id="inputLastName" value="<?= $admin_details->last_name; ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail" class="form-label">Email Address</label>
                                <input name="email_address" type="text" class="form-control" id="inputEmail" value="<?= $admin_details->email_address; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhone" class="form-label">Phone Number</label>
                                <input name="phone_number" type="text" class="form-control" id="inputPhone" value="<?= $admin_details->phone_number; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDepartment" class="form-label">Department</label>
                                <select name="department" id="inputDepartment" class="form-select">
                                    <option selected>Choose Department ...</option>
                                    <?php foreach ($departments AS $department) { ?>
                                        <option value="<?= $department->department_id; ?>" <?php if($department->department_id == $admin_details->department_id) { echo 'selected'; } ?>><?= $department->department_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Modify Admin</button>
                            </div>
                        </form>

                        <hr />

                        <form data-toggle="validator" role="form" method="post" action="<?= Func::host(); ?>/admin/modify-admin-privilege/<?= Func::dec_enc('encrypt', $admin_details->staff_id); ?>">

                            <div class="row">
                                <div class="col-sm-12 container">
                                    <h4 class="col-sm-12 text-center font-weight-bold border mt-4"><span class="btn btn-lg"><i class="fa fa-cogs"></i> Set Privileges.</span></h4>

                                    <p><strong>Patients</strong></p>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="1" id="" <?php if (in_array(1, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Register Patient
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="2" id="" <?php if (in_array(2, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Manage Patient
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="3" id="" <?php if (in_array(3, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Patient Profile
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <p><strong>Patient Session</strong></p>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="4" id="" <?php if (in_array(4, $admin_privileges)) { echo 'checked="checked"'; } ?> /> New Session
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="5" id="" <?php if (in_array(5, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Manage Session
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <p><strong>Facility</strong></p>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="6" id="" <?php if (in_array(6, $admin_privileges)) { echo 'checked="checked"'; } ?> /> New Facility
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="7" id="" <?php if (in_array(7, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Manage Facility
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <p><strong>Admins</strong></p>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="8" id="" <?php if (in_array(8, $admin_privileges)) { echo 'checked="checked"'; } ?> /> New Admin
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <input type="checkbox" name="page[]" value="9" id="" <?php if (in_array(9, $admin_privileges)) { echo 'checked="checked"'; } ?> /> Manage Admin
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">Modify Admin Privileges</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php require_once "layout/footer.php"; ?>

</body>

</html>