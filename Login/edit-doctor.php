<?php 
session_start();
if(empty($_SESSION['name']))
{
    header('location:index.php');
}
include('header.php');
include('includes/connection.php');

$id = $_GET['id'];
$fetch_query = mysqli_query($connection, "select * from tbl_employee where id='$id' and role=2");
$row = mysqli_fetch_array($fetch_query);

if(isset($_REQUEST['save-doc']))
{
      $first_name = $_REQUEST['first_name'];
      $last_name = $_REQUEST['last_name'];
      $username = $_REQUEST['username'];
      $emailid = $_REQUEST['emailid'];
      $pwd = $_REQUEST['pwd'];
      $dob = $_REQUEST['dob'];
      $employee_id = $_REQUEST['employee_id'];
      $joining_date = $_REQUEST['joining_date'];
      $gender = $_REQUEST['gender'];
      $phone = $_REQUEST['phone'];
      $address = $_REQUEST['address'];
      $bio = $_REQUEST['bio'];
      $status = $_REQUEST['status'];

      $update_query = mysqli_query($connection, "update tbl_employee set first_name='$first_name', last_name='$last_name', username='$username', emailid='$emailid', password='$pwd',  dob='$dob', employee_id='$employee_id', joining_date = '$joining_date', gender='$gender', address='$address', phone='$phone',  bio='$bio',  status='$status' where id='$id'");
      if($update_query>0)
      {
          $msg = "Médecin mis à jour avec succès  ";
          $fetch_query = mysqli_query($connection, "select * from tbl_employee where id='$id' and role=2");
          $row = mysqli_fetch_array($fetch_query);   
      }
      else
      {
          $msg = "Erreur!";
      }
  }

?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 ">
                        <h4 class="page-title">Modifier le Docteur</h4>
                    </div>
                    <div class="col-sm-8  text-right m-b-20">
                        <a href="doctors.php" class="btn btn-primary btn-rounded float-right">Précédent</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prénom <span class="text-danger">*</span></label>
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
                                        <label>Nom d’utilisateur  <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="emailid" value="<?php echo $row['emailid']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input class="form-control" type="password" name="pwd" value="<?php echo $row['password']; ?>">
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
                                        <label>ID de l’employé </label>
                                        <input class="form-control" type="text" name="employee_id" required value="<?php echo $row['employee_id']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date d’adhésion</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="joining_date" required value="<?php echo $row['joining_date']; ?>">
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
                                <label>Courte biographie</label>
                                <textarea class="form-control" rows="3" cols="30" name="bio"><?php echo $row['bio']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Statut</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_active" value="1" <?php if($row['status']==1) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="doctor_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0" <?php if($row['status']==0) { echo 'checked' ; } ?>>
									<label class="form-check-label" for="doctor_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save-doc">Sauvegarder</button>
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