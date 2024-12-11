<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manage Patient - Healthcare Smart</title>
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
        <h1>Manage Patient</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Patient</h5>

                        <p>Total: <?=number_format($total); ?></p>
                        <hr />

                        <table class="table table-borderless datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">NIN</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $s_n = 1 + $offset;; if(isset($items) && !empty($items)) { foreach ($items as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $s_n++; ?></th>
                                    <td><?= $row->first_name . ' ' . $row->last_name; ?></td>
                                    <td><?= $row->nin; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->phone_number; ?></td>
                                    <td>
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li><a class="dropdown-item" href="<?= Func::host() . '/admin/'; ?>patient-profile/<?= Func::dec_enc('encrypt', $row->patient_id); ?>">Patient Profile</a></li>
                                        </ul>
                                    </td>
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