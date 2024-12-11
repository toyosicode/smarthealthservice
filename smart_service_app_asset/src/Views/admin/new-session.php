<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Session - Healthcare Smart</title>
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
        <h1>New Session</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Start a new patient session</h5>
                        <p>Use this for every patient visit to the healthcare facility. Search for patient by NIN or Last Name</p>

                        <form class="row g-3" method="post" action="<?= Func::host(); ?>/admin/new-session">
                            <div class="col-md-12">
                                <label for="inputSearch" class="form-label">Search term</label>
                                <input name="search_terms" type="text" class="form-control" id="inputSearch">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Find Patient</button>
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