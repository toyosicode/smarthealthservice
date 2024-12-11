<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Admin - Healthcare Smart</title>
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
        <h1>New Admin</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Admin</h5>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/new-admin">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">First Name</label>
                                <input name="first_name" type="text" class="form-control" id="inputFirstName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Last Name</label>
                                <input name="last_name" type="text" class="form-control" id="inputLastName">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail" class="form-label">Email Address</label>
                                <input name="email_address" type="text" class="form-control" id="inputEmail">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhone" class="form-label">Phone Number</label>
                                <input name="phone_number" type="text" class="form-control" id="inputPhone">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDepartment" class="form-label">Department</label>
                                <select name="department" id="inputDepartment" class="form-select">
                                    <option selected>Choose Department ...</option>
                                    <?php foreach ($departments AS $department) { ?>
                                        <option value="<?= $department->department_id; ?>"><?= $department->department_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Admin</button>
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