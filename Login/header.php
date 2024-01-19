<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../logoo.png">
    <title>MediManager</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="dashboard.php" class="logo">
                    <img src="../redopng.png" width="35" height="35" alt=""> <span>MediManager</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                   <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <?php 
                        if($_SESSION['role']==1){ ?>
                        <span>Administrateur</span>
                    <?php } else {?>
                        <span><?php echo $_SESSION['name']; ?></span>
                    <?php } ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item "  href="edit-employee.php?id=1"> <i class="fa-solid fa-pen"></i><span style="padding-left:7px">Editer le profil </span></a>
                        <a class="dropdown-item"  href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span style="padding-left:7px">Déconnexion</span></a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item "  href="edit-employee.php?id=1"> <i class="fa-solid fa-pen"></i><span style="padding-left:7px">Editer le profil </span></a>
                        <a class="dropdown-item"  href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span style="padding-left:7px">Déconnexion</span></a>
                 
                </div>
            </div>
        </div>
   

      <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            
            if ($_SESSION['role'] == 1) {?>
                <ul>
                    <li class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span></a>
                    </li>
                    <li class="<?php echo ($currentPage == 'doctors.php') ? 'active' : ''; ?>">
                        <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Médecins</span></a>
                    </li>
                    <li class="<?php echo ($currentPage == 'patients.php') ? 'active' : ''; ?>">
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li class="<?php echo ($currentPage == 'appointments.php') ? 'active' : ''; ?>">
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Rendez-vous</span></a>
                        </li>
                        <li class="<?php echo ($currentPage == 'schedule.php') ? 'active' : ''; ?>">
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Programme du médecin</span></a>
                        </li>
                        <li class="<?php echo ($currentPage == 'departments.php') ? 'active' : ''; ?>">
                            <a href="departments.php"><i class="fa fa-hospital-o"></i> <span>Départements</span></a>
                        </li>
                        <li class="<?php echo ($currentPage == 'employees.php') ? 'active' : ''; ?>">
                            <a href="employees.php"><i class="fa fa-user"></i> <span>Employés</span></a>
                        </li>
                </ul>
            <?php } else { ?>
               
            <?php } ?>
        </div>
    </div>
</div>





</div>




</script>
<script src="https://kit.fontawesome.com/1ee95f46e4.js" crossorigin="anonymous"></script>

