<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>New Facility - Healthcare Smart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once "layout/head_meta.php"; ?>
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
                        <h5 class="card-title">Add a new facility to the Healthcare Smart platform</h5>

                        <form class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="inputName5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName5" class="form-label">Director Name</label>
                                <input type="text" class="form-control" id="inputName5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Director Email</label>
                                <input type="email" class="form-control" id="inputEmail5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhone" class="form-label">Director Phone</label>
                                <input type="text" class="form-control" id="">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress5" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Facility</button>
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