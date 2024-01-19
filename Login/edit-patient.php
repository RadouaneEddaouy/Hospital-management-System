<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "select * from tbl_patient where id='$id'");
$row = mysqli_fetch_array($fetch_query);

if(isset($_REQUEST['save-patient']))
{
      $first_name = $_REQUEST['first_name'];
      $last_name = $_REQUEST['last_name'];
      $emailid = $_REQUEST['emailid'];
      $dob = $_REQUEST['dob'];
      $gender = $_REQUEST['gender'];
      $patient_type = $_REQUEST['patient_type'];
      $phone = $_REQUEST['phone'];
      $address = $_REQUEST['address'];
      $status = $_REQUEST['status'];

      $update_query = mysqli_query($connection, "update tbl_patient set first_name='$first_name', last_name='$last_name', email='$emailid', dob='$dob', gender='$gender', patient_type='$patient_type',address='$address', phone='$phone', status='$status' where id='$id'");
      if($update_query>0)
      {
          $msg = "Patient mis à jour avec succès.          ";
          $fetch_query = mysqli_query($connection, "select * from tbl_patient where id='$id'");
          $row = mysqli_fetch_array($fetch_query);   
      }
      else
      {
          $msg = "Error!";
      }
  }

?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 ">
                        <h4 class="page-title">Modifier le patient </h4>
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="patients.php" class="btn btn-primary btn-rounded float-right">Précédent</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prénom  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" value="<?php  echo $row['first_name'];  ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input class="form-control" type="text" name="last_name" value="<?php echo $row['last_name']; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="emailid" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                               
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob" value="<?php echo $row['dob']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone </label>
                                        <input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Genre:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="Male" <?php if($row['gender']=='Male') { echo 'checked' ; } ?>>Masculin
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="Female" <?php if($row['gender']=='Female') { echo 'checked' ; } ?>>Féminin
											</label>
										</div>
									</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type de patient </label>
                                        <select class="select" name="patient_type" required>
                                            <option value="">Select</option>
                                            <option <?php if($row['patient_type']=='InPatient') { ?>
                                                selected="selected";
                                                <?php }?>>Hospitalisé
                                            </option>
                                        <option <?php if($row['patient_type']=='OutPatient') { ?>
                                                selected="selected";<?php }?>>Ambulatoire
                                            </option>
                                        
                                        </select>
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Adresse</label>
												<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
											</div>
										</div>
									</div>
								</div>
                                </div>
							
                            <div class="form-group">
                                <label class="display-block">Statut</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_active" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="patient_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="patient_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save-patient">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    
<?php 
include('footer.php');
?>
<script type="text/javascript">
     <?php
         if (isset($msg)) {
            if (strpos($msg, 'succès') !== false) {
                echo 'swal({
                    title: "Succès!",
                    text: "' . $msg . '",
                    icon: "success",
                });';
            } else {
                echo 'swal({
                    title: "Erreur!",
                    text: "' . $msg . '",
                    icon: "error",
                });';
            }
        }
     ?>
</script> 