<?php

include '../../config/koneksi.php';

session_start();


if(!$_SESSION){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "An Error Occurred!",
                text: "You are not logged in !",
                type: "error"
            }, function() {
                window.location = "../../index.php";
            });
        }, 200);
    });
   </script>';
}

if($_SESSION && $_SESSION['user_type'] != 'Admin'){
    echo '<script>
    $(document).ready(function(){
        setTimeout(function() {
            swal({
                title: "ACCESS VIOLATION!",
                text: "YOU ARE NOT ADMIN !",
                type: "error"
            }, function() {
                window.location = "../user/dashboard.php";
            });
        }, 200);
    });
   </script>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory System</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-luggage-cart"></i>
                </div>
                <div class="sidebar-brand-text ">Inventory System</div>
            </a>

            <!-- Divider -->
            <p class="ml-3 pt-2">
                <b class="text-white ">Role : <?= $_SESSION['user_type']?></b>
            </p>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="material_list.php">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Material List</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="material_type.php">
                    <i class="fas fa-fw fa-filter"></i>
                    <span>Material Type List</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="document_list.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Document List</span></a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="user_list.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User List</span></a>
            </li>

            <hr class="sidebar-divider my-0">




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['fullname']?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../config/logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><b>Users List</b></h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 text-primary">Page : Dashboard / <b>Users List</b></h6>

                        </div>
                        <div class="card-body">
                            <div style="justify-content: space-between; display: flex; margin-bottom: 10px">
                                <!--<button class="btn btn-primary px-4 py-2 mb-3"><i class="fas fa-print"></i>
                                    Print</button>-->
                                <a data-toggle="modal" data-target="#addModal" class="my-auto"
                                    style="cursor:pointer; text-decoration: none">+ Add User</a>
                            </div>

                            <!-- Modal Add -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <form method="post" action="action/add_user.php">
                                                    <div class="form-group">
                                                        <label for="my-input">Fullname</label>
                                                        <input id="my-input" class="form-control mb-2" required type="text"
                                                            name="fullname">
                                                            <small>* it will be used as username without whitespace</small><br>
                                                            <small>** user default password is 123456</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">User Type</label>
                                                        <select class="form-control" required name="role" id="">
                                                            <option value="" selected disabled>-- Select User Type --</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Department</label>
                                                        <input type="text" name="department" id="" class="form-control">
                                                    </div>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Add -->



                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="myTable" width="100%">
                                    <p class="py-1">*delete button will hidden if user role is Admin</p>
                                    <thead>
                                        <tr>
                                            <!-- <th>Lego No.</th> -->
                                            <!-- <th>Part No.</th> -->
                                            <th>Fullname</th>
                                            <th>Department</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <!-- <th>SS Code</th> -->
                                            <!-- <th>Material Type</th>
                                            <th>Production</th>
                                            <th>Material Supplier</th>
                                            <th>Accessibility Status</th>
                                            <th>Expire Lab Test</th>-->
                                            <!-- <th>Lab Test</th>
                                            <th>Chemical Status</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $query = mysqli_query($koneksi,"SELECT * FROM tb_user LEFT JOIN tb_user_profile ON tb_user.id_user_profile = tb_user_profile.id_user_profile");
                                        
                                        if(!$query){
                                            echo $koneksi->error;
                                        }

                                        while($data = mysqli_fetch_assoc($query)){
                                            // echo '<pre>';
                                            // print_r($data);
                                            // echo '</pre>';
                                        ?>
                                        <tr>
                                            <td><?= $data["fullname"]?></td>
                                            <td><?= $data["department"]?></td>
                                            <td><?= $data["username"]?></td>
                                            <td><?= $data["user_type"]?></td>
                                            <!-- modal detail button -->
                                            <td>
                                                <a data-target="#detail<?= $data['id_user']?>" class="btn btn-primary" data-toggle="modal"
                                                    style="text-decoration:none; cursor:pointer"><i
                                                class="fas fa-eye"></i> Detail</a> 
                                                <a class="btn btn-danger <?= ($data['fullname'] == $_SESSION['fullname'] ? 'd-none' : '')?>" 
                                                    href="action/delete_user.php?id=<?= $data["id_user"]?>"
                                                    style="text-decoration:none; cursor:pointer"><i
                                                class="fas fa-trash"></i> Delete</a>
                                                    
                                            </td>
                                            <!-- -->
                                        </tr>


                                        <!-- Modal Detail -->
                                        <div class="modal fade  " id="detail<?= $data['id_user']?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content pt-2">
                                                    <!-- <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Material
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div> -->
                                                    <div class="modal-body">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <h5>User Details</h5>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="">Fullname</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $data["fullname"]?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $data["username"]?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Department</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $data["department"]?>" readonly>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label for="">Phone Number</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $data["phone_number"]?>" readonly>
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label for="">Role</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $data["user_type"]?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Detail -->



                                        <?php };?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Inventory System 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../config/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>


    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>