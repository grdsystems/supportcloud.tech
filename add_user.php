<div class="d-flex justify-content-center bg-light bg-gradient">

  <form method="post" action="adduser.php">

    <div class="row mb-3">
      <label class="form-label">School <a href="addschool.php" onClick="window.open(this.href, 'mywin',
'left=400px,top=200px,width=800px,height=400,toolbar=1,resizable=0'); return false;">Click here to add new a school(s)</a></label>
      <div class="col-12">
        <select name="school">

          <?php
          include 'inc/db.php';
          $sql = "select * from school";
          $stmt = $conn->prepare($sql);
          //$stmt->bind_param("s",$teacherAdmin_id);
          $stmt->bind_result($id, $school_id, $schoolname);

          $stmt->execute();
          //print teachers
          while ($stmt->fetch()) { ?>

            <option value="<?php echo $school_id . "-" . $schoolname; ?>"><?php echo $school_id . "-" . $schoolname; ?></option>

          <?php
          }
          ?>
        </select>
      </div>
    </div>
    <!-- <div class="row mb-3">
        <label class="form-label">School ID </label>
        <div class="col-12">
          <input class="form-control" type="text" name="school_id" required value="<?php echo $school_id; ?>">
        </div>
      </div> -->

    <div class="row mb-3">
      <label class="form-label">Last Name</label>
      <div class="col-12">
        <input type="text" class="form-control" required name="last_name">
      </div>
    </div>
    <div class="row mb-3">
      <label class="form-label">First Name</label>
      <div class="col-12">
        <input type="text" class="form-control" required name="first_name">
      </div>
    </div>
    <div class="row mb-3">
      <label class="form-label">UserName</label>
      <div class="col-12">
        <input type="text" class="form-control" required name="user_name">
      </div>
    </div>
    <div class="row mb-3">
      <label class="form-label"> Permission</label>
      <div class="col-12">
        <select name="permission" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>


        </select>
      </div>
    </div>
    <div class="row mb-3">
      <label class="required">Password</label>
      <div class="col-12">
        <input type="password" id="password" class="form-control" required name="password">
      </div>
    </div>

    <input type="submit" class="btn btn-success" class="form-control" value="GO">
  </form>
</div>