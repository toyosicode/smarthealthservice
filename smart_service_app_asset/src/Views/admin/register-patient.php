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
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Enter a NIN to register a new patient. The system will import the patient basic biodata.
                        </div>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/register-patient">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">NIN (National Identity Number)</label>
                                <input type="text" class="form-control" id="inputName5" name="nin_number">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Start Registration</button>
                            </div>

                            <div class="text-center">
                                <p><strong>Note: </strong>You can do a manual registration if the patient does not have a NIN number.
                                <a href="<?= Func::host() . '/admin/register-patient/manual'; ?>">Click here to do manual patient registration</a>
                                </p>

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