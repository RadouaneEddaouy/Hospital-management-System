<?php
function getDayOfWeek() {
    $daysOfWeek = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    $currentDayIndex = date("w"); 
    
    return $daysOfWeek[$currentDayIndex];
}

function convertTo24HourFormat($time) {
    return date("H:i", strtotime($time));
}

session_start();
if (empty($_SESSION['name'])) {
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Planifications</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-schedule.php" class="btn btn-primary btn-rounded float-right">Ajouter une Planification <i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="datatable table table-stripped">
                <thead>
                    <tr>
                        <th>Nom du médecin</th>
                        <th>Jours disponibles</th>
                        <th>Temps disponible</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        date_default_timezone_set('Africa/Casablanca');
                    if (isset($_GET['ids'])) {
                        $id = $_GET['ids'];
                        $delete_query = mysqli_query($connection, "delete from tbl_schedule where id='$id'");
                    }
                    $fetch_query = mysqli_query($connection, "select * from tbl_schedule");
                    while ($row = mysqli_fetch_array($fetch_query)) {
                        $dayOfWeek = getDayOfWeek();
                        
                        $startTime24 = convertTo24HourFormat($row['start_time']);
                        $endTime24 = convertTo24HourFormat($row['end_time']);
                        $availableDays = explode(",", $row['available_days']);
                        
                        $currentDayTime = date('H:i');
                        
                        if (in_array($dayOfWeek, $availableDays) && ($currentDayTime >= $startTime24 && $currentDayTime <= $endTime24)) {
                            $status = 1; 
                        } else {
                            $status = 0;
                        }

                        $scheduleId = $row['id'];
                        $updateQuery = "UPDATE tbl_schedule SET status = '$status' WHERE id = '$scheduleId'";
                        $updateResult = mysqli_query($connection, $updateQuery);
                        
                        ?>

                        <tr>
                            <td><?php echo $row['doctor_name']; ?></td>
                            <td><?php echo implode(", ", $availableDays); ?></td>
                            <td><?php echo $row['start_time'] . ' - ' . $row['end_time']; ?></td>
                            <td>
                                <?php if ($status == 1) { ?>
                                    <span class="custom-badge status-green">Active</span>
                                <?php } else { ?>
                                    <span class="custom-badge status-red">Inactive</span>
                                <?php } ?>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-schedule.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item" href="schedule.php?ids=<?php echo $row['id']; ?>" onclick="return confirmDelete()"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
<script language="JavaScript" type="text/javascript">
    function confirmDelete() {
        return confirm("Voulez-vous vraiment supprimer le Programme ?");
    }
</script>
