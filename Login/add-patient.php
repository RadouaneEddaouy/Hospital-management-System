<?php
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');
    
    if(isset($_REQUEST['add-patient']))
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

      
      $insert_query = mysqli_query($connection, "insert into tbl_patient set first_name='$first_name', last_name='$last_name', email='$emailid', dob='$dob', gender='$gender', patient_type='$patient_type', address='$address', phone='$phone', status='$status'");

      if($insert_query>0)
      {
          $msg = "Patient créé avec succès";
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
                        <h4 class="page-title">Ajouter un patient</h4>
                         
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="patients.php" class="btn btn-primary btn-rounded float-right">Précédent</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="first_name" required> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input class="form-control" type="text" name="last_name" required>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="emailid" required>
                                    </div>
                                </div>
                               
                                
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance
</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dob" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Téléphone </label>
                                        <input class="form-control" type="text" name="phone" required>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Genre:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="Male" >masculin
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" name="gender" class="form-check-input" value="Female">féminin
											</label>
										</div>
									</div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type de patient </label>
                                        <select class="select" name="patient_type" required>
                                            <option value="">Select</option>
                                            <option >Hospitalisé</option>
                                            <option >Ambulatoire</option>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                <input type="text" class="form-control" name="address" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label class="display-block">Statut</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_active" value="1" checked>
									<label class="form-check-label" for="patient_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="2">
									<label class="form-check-label" for="patient_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            
                            <div class="m-t-20 text-center">

                                <button name="add-patient" class="btn btn-primary submit-btn">Créer un patient</button>
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