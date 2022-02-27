<?php
    include "database.php";

    $Contacts = mysqli_query($connection, "SELECT * FROM contact");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="bootstrap\bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

        <title>PhoneBook</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img\phonebook-logo.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                </a>
                <a class="navbar-brand" href="#">PhoneBook</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Button trigger modal -->
                            <button type="button" class="ms-2 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Contact
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-light">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="add_contact.php">
                                    <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                                <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                                <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@example.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">photo</label>
                                                <input class="form-control" name="photo" type="file" id="formFile">
                                            </div>

                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <!-- Button trigger modal -->
                            <button type="button" class="ms-2 btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            Delete All Contacts
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark text-light">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete All Contacts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="delete_contact.php">
                                    <div class="modal-body">
                                        <div class="mb-3 text-center">
                                            Are you sure ?
                                        </div>
                                        <div class="d-flex justify-content-center">
                                        <button type="button" style="margin-right:5px;" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <button type="sumbit" name="delete" class="btn btn-danger">Yes</button></div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>                 

        <div class="container">
            <div class="row mt-4">
                <ul class="list-group list-group">
                    <li class="list-group-item d-flex border-secondary text-light" style="background-color:darkslategray;">
                        <div class="col-3">
                            <div class="fw-bold ms-3">First Name</div>
                        </div>
                        <div class="col-3">
                            <div class="fw-bold ms-3">Last Name</div>
                        </div>
                        <div class="col-3">
                            <div class="fw-bold ms-2">Phone Number</div>
                        </div>
                        <div class="col-3">
                            <div class="fw-bold ms-2">Email</div>
                        </div>
                    </li>
                </ul>
                <ol class="list-group list-group-numbered">
                    <?php foreach($Contacts as $Contact): ?>
                    <li class="list-group-item d-flex  bg-dark border-secondary text-light">
                        <div class="col-3">
                            <div class="fw-bold ms-2"><?php echo $Contact["firstname"]; ?></div>
                        </div>
                        <div class="col-3">
                            <div class="fw-bold ms-2"><?php echo $Contact["lastname"]; ?></div>
                        </div>
                        <div class="col-3">
                            <div><?php echo $Contact["phone"]; ?></div>
                        </div>
                        <div class="col-3">
                            <div><?php echo $Contact["email"]; ?></div>
                        </div>
                    </li>
                    <?php endforeach; ?>                    
                </ol>
            </div>
        </div>


       
        
        <script src="bootstrap\bootstrap.js"></script>
    </body>
</html>