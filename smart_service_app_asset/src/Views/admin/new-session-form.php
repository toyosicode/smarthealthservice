<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Session Registration - Healthcare Smart</title>
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
        <h1>New Session Registration</h1>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Fill the form to create a session for the patient: <strong><?php echo $patient_details->last_name . ' ' . $patient_details->first_name; ?></strong></h5>

                        <p>Please record the patient's vitals in the field below.</p>
                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/new-session/<?= Func::dec_enc('encrypt', $patient_details->patient_id); ?>">
                            <div class="col-md-12">
                                <label for="inputVitals" class="form-label">Vitals</label>
                                <textarea name="patient_vitals" class="form-control" id="inputVitals" rows="7"></textarea>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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