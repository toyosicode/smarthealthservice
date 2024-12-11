<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register Patient - Healthcare Smart</title>
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
        <h1>Register Patient</h1>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register a new patient</h5>
                        <p>Fill the form to add a patient. This is an alternative patient registration option for patients that do not
                        have NIN information.</p>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/register-patient/manual">
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
                                <label for="inputDOB" class="form-label">DOB</label>
                                <input name="dob" type="date" class="form-control" id="inputDOB">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Patient</button>
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