<div class="d-flex justify-content-center bg-light bg-gradient">


  <?php

  include 'inc/db.php';

  $user_id = $_GET['p_id'];

  $sql = "select user_id, school_id, school_type, last_name, first_name, username, password, permission,status from users where  user_id =?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("s", $user_id);

  $stmt->bind_result($user_id, $school_id, $school_type, $last_name, $first_name, $username, $password, $permission, $status);

  $stmt->execute();

  ?>
  <?php

  //while loop

  while ($stmt->fetch()) {

  ?>


    <form method="post" action="updateuser.php">
      <div class="row mb-3">
        <label class="form-label">School ID </label>
        <div class="col-12">
          <input class="form-control" type="text" name="school_id" required value="<?php echo $school_id; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">Facilitator ID</label>
        <div class="col-12">
          <input class="form-control" type="text" name="user_id" required value="<?php echo $user_id; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">School </label>
        <div class="col-12">
          <input class=" form-control" type=" text" name="school" id="name" required value="<?php echo $school_type; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">Last Name</label>
        <div class="col-12">
          <input class=" form-control" type=" text" name="last_name" required value="<?php echo $last_name; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="form-label">First Name</label>
        <div class="col-12">
          <input class=" form-control" type=" text" name="first_name" required value="<?php echo $first_name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">UserName</label>
        <div class="col-12">
          <input class="form-control" type="text" name="username" required value="<?php echo $username; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">Permission</label>
        <div class="col-12">
          <input class="form-control" type="text" name="permission" required value="<?php echo $permission; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">Password</label>
        <div class="col-12">
          <input class="form-control" type="password" name="password" id="password" required value="<?php echo $password; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="form-label">Status</label>
        <div class="col-12">
          <select class="form-select" name="status">
            <option value="0">
              <?php if ($status == 0) {
                echo "Active";
              } else echo "Inactive"; ?>
            </option>
            <?php if ($status == 1) {
              echo '<option value="0">Activate</option>';
            } else echo '<option value="1">Deactivate</option>'; ?>
          </select>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update</button>
      </div>
    </form>


  <?php

    // close while loop 

  }

  $stmt->close();

  $conn->close();

  //}

  ?>

</div>