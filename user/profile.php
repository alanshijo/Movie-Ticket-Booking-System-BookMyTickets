<?php
include '../db_conn.php';
include 'user-session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>User profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <div id="updated" class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
            Profile updated successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- Account page navigation-->
        <div class="row">
            <div class="col-xl-12">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form id="updateProfile" enctype="multipart/form-data">
                            <?php
                            $details = "SELECT a.email,b.login_id,b.pro_pic ,b.user_id, b.user_fname, b.user_lname, b.user_phno  FROM tbl_login as a INNER JOIN tbl_users as b ON a.login_id = b.login_id and a.email = '$username';";
                            $details_run = mysqli_query($conn, $details);
                            foreach ($details_run as $detail)
                            ?>
                                <!-- Form Row-->
                                <div>
                                    <center>
                                        <?php
                                        if($detail['pro_pic']=="0")
                                        {
                                        ?>
                                        <img class="img-account-profile rounded-circle mb-2" src="img/no-photo.png" alt=""><br>
                                        <input type="file" name="propic" id="propic" class="btn btn">
                                        <?php
                                        }
                                        else{
                                        ?>
                                        <img class="img-account-profile rounded-circle mb-2" src="img/uploads/<?php echo $detail['pro_pic']; ?>" alt=""><br>
                                        <input type="file" name="propic" id="propic" value="<?php echo $detail['pro_pic']; ?>" class="btn btn">
                                        <?php
                                        }
                                        ?>
                                    </center>
                                </div>
                                <br><br>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <input type="hidden" name="user_id" value="<?php echo $detail['user_id']; ?>">
                                    <input type="hidden" name="login_id" value="<?php echo $detail['login_id']; ?>">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" name="fname" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $detail['user_fname']; ?>">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" name="lname" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $detail['user_lname']; ?>">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $detail['email']; ?>">
                                </div>
                                <!-- Form Row-->
                                <!-- Form Group (phone number)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" name="mobile" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $detail['user_phno']; ?>">
                                </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>

    <script type="text/javascript">
        $(document).on('submit', '#updateProfile', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_profile", true);

            $.ajax({
                type: "POST",
                url: "save.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#updated').show();
                    // $('#updateProfile').load(location.href + " #updateProfile");
                    window.location.reload();
                }
            });

        });
    </script>
</body>

</html>