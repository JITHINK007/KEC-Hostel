<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/title.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<style>
    /* Add your styles here */
    html {
        position: relative;
        min-height: 100%;
    }

    body {
        padding-top: 4.5rem;
        margin-bottom: 4.5rem;
        background: linear-gradient(to left, #55A8FB 0%, white 100%);
    }

    #navbarCollapse a {
        color: #fff;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 3.5rem;
        line-height: 3.5rem;
        background-color: #2196f3;
    }

    .nav-link:hover {
        transition: all 0.4s;
    }

    .nav-link-collapse:after {
        float: right;
        content: '\f067';
        font-family: 'FontAwesome';
    }

    .nav-link-show:after {
        float: right;
        content: '\f068';
        font-family: 'FontAwesome';
    }

    .nav-item ul.nav-second-level {
        padding-left: 0;
    }

    .nav-item ul.nav-second-level>.nav-item {
        padding-left: 20px;
    }

    @media (min-width: 992px) {
        .sidenav {
            position: absolute;
            top: 0;
            left: 0;
            width: 230px;
            height: calc(100vh - 3.5rem);
            margin-top: 3.5rem;
            background: #2196f3;
            box-sizing: border-box;
            border-top: 1px solid rgba(0, 0, 0, 0.3);
        }

        .navbar-expand-lg .sidenav {
            flex-direction: column;
        }

        .content-wrapper {
            margin-left: 230px;
        }

        .footer {
            width: calc(100% - 230px);
            margin-left: 230px;
        }
    }

    .active {
        background-color: #1565c0;
    }





    /* Style for the file input container */
    .file-input-container {
        position: relative;
        width: 100%;
    }

    /* Style for the custom button */
    .custom-file-input {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* Style for the custom button text */
    .custom-file-label {
        display: inline-block;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        cursor: pointer;
    }

    /* Adjust styles as needed */
</style>

<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top " style="background:#2196f3;">
            <a class="navbar-brand" style="color: white;" href="#">E-Out Pass</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php"> &#128233; Requests<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="accepts.php"> &#128505; Accepts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rejects.php"> &#128503; Rejects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sickdetails.php"> &#127973; Sick Details<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-collapse" href="#" id="hasSubItems" data-toggle="collapse" data-target="#collapseSubItems2" aria-controls="collapseSubItems2" aria-expanded="false"> &#128202;
                            Statistics <big>⇩</big></a>
                        <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                            <li class="nav-item " style="background-color:#2196f3;">
                                <a class="nav-link" href="homestatustics.php">
                                    <span class="nav-link-text"> &#127968; Home Permissions</span>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color:#2196f3;">
                                <a class="nav-link" href="onehourstatustics.php">
                                    <span class="nav-link-text"> &#127966; Evening Permissions</span>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color:#2196f3;">
                                <a class="nav-link" href="sickstatestics.php">
                                    <span class="nav-link-text"> &#127973; Sick Permissions</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="studentregistration.php"> &#128221; Student Registration</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="xmlstudentdata.php"> &#128221; Upload File</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentdata.php">&#127891; Student Data</a>
                    </li>
                </ul>
                <form class="form-inline ml-auto mt-2 mt-md-0">
                </form>
                <a href="logout.php">Logout &#128473;</a>
            </div>
        </nav>

        <main class="content-wrapper">
            <div class="container-fluid ">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-heading">
                        </div>

                        <div class="modal-body" style=" background: linear-gradient(to right, #55A8FB 0%, white 100%);">
                            <h2 class="text-center">Student Registration</h2>
                            <form action="formregistration.php" enctype="multipart/form-data" role="form" method="POST">

                                <div class="form-group">
                                    <label>Upload the Excel File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="excelfile" name="excelfile" required>
                                        <label class="custom-file-label" for="excelfile">Choose File</label>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary rounded-pill ">Submit</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </section>
</body>

<script>
    // Update the file input styling
    document.getElementById('xmlfile').addEventListener('change', function() {
        var fileName = this.value.split('\\').pop();

        // Display the selected file name
        var nextSibling = this.nextElementSibling;
        nextSibling.innerText = fileName;
        // Optionally, you can add additional styling to indicate a selected file
        nextSibling.classList.add('file-selected');
    });
</script>




</html>