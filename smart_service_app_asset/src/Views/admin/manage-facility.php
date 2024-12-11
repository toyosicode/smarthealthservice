<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Facility - Healthcare Smart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require_once "layout/head_meta.php"; ?>
</head>

<body>

<?php require_once "layout/header.php"; ?>
<?php require_once "layout/sidebar.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Facility</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of registered facilities</h5>
                        <p>Total: <?=number_format($total); ?></p>
                        <hr />

                        <table class="table table-borderless datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $s_n = 1 + $offset;; if(isset($items) && !empty($items)) { foreach ($items as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $s_n++; ?></th>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->address; ?></td>
                                    <td><?= $row->phone_number; ?></td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php require_once "layout/footer.php"; ?>

</body>

</html>