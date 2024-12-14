<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Facility - Healthcare Smart</title>
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
        <h1>New Facility</h1>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add a new facility to the platform</h5>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/new-facility">
                            <div class="col-md-12">
                                <label for="inputFacilityName" class="form-label">Facility Name</label>
                                <input name="facility_name" type="text" class="form-control" id="inputFacilityName">
                            </div>
                            <div class="col-md-12">
                                <label for="inputFacilityAddress" class="form-label">Facility Address</label>
                                <textarea name="facility_address" class="form-control" id="inputFacilityAddress" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputFacilityPhone" class="form-label">Facility Phone Number</label>
                                <input name="facility_phone" type="text" class="form-control" id="inputFacilityPhone">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDirectorName" class="form-label">Director Name</label>
                                <input name="director_name" type="text" class="form-control" id="inputDirectorName">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDirectorPhone" class="form-label">Director Phone Number</label>
                                <input name="director_phone" type="text" class="form-control" id="inputDirectorPhone">
                            </div>
                            <div class="col-md-12">
                                <label for="inputDirectorEmail" class="form-label">Director Email Address</label>
                                <input name="director_email" type="email" class="form-control" id="inputDirectorEmail">
                            </div>
                            <div class="text-center">
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