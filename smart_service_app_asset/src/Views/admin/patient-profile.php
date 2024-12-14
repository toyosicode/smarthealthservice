<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Patient Profile - Healthcare Smart</title>
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
        <h1>Patient Profile</h1>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#patient-session">Patient Session</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIN</div>
                                    <div class="col-lg-9 col-md-8"><?= $patient_details->nin; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $patient_details->last_name . ' ' . $patient_details->first_name; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $patient_details->phone_number; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $patient_details->email; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">DOB</div>
                                    <div class="col-lg-9 col-md-8"><?= Func::date_to_text($patient_details->dob); ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Gender</div>
                                    <div class="col-lg-9 col-md-8"><?= $patient_details->gender; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Hospital</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $patient_details->facility->name; ?><br />
                                        <?= $patient_details->facility->address; ?><br />
                                        Director: <?= $patient_details->facility->director_name; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="patient-session">
                                <p>List of the patients sessiosn are displayed below</p>

                                <table class="table table-borderless">
                                    <thead>
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Vitals</th>
                                        <th scope="col">Date Opened</th>
                                        <th scope="col">status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $s_n = 1; if(isset($patient_session) && !empty($patient_session)) { foreach ($patient_session as $row) { ?>
                                        <tr>
                                            <th scope="row"><?= $s_n++; ?></th>
                                            <td><?= $row->patient->last_name . ' ' . $row->patient->first_name; ?></td>
                                            <td><?= $row->vitals_taken; ?></td>
                                            <td><?= Func::datetime_to_text($row->created_at); ?></td>
                                            <td><?= $row->status; ?></td>
                                        </tr>
                                    <?php } } ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once "layout/footer.php"; ?>

</body>

</html>