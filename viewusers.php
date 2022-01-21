<div class="d-flex flex-row-reverse">
  <input class="form-control search-input" data-table="customers-list" type="search" placeholder="Filter by Name" aria-label="Search">
  <p><a href="./manageusers.php?source=add_user">ADD USER</a></p>
</div>
<table class="table table-hover table-bordered customers-list">
  <thead>
    <tr>
      <th scope="col">Facilitator ID</th>
      <th scope="col">School ID</th>
      <th scope="col">School</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">UserName</th>
      <th scope="col">Permission</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2">User Tools</th>
    </tr>
  </thead>
  <tbody>

    <?php


    include 'inc/db.php';

    //$user_id = $_POST['user_id'];

    $sql = "select user_id, school_id, school_type, last_name, first_name, username, permission,status from users ";

    $stmt = $conn->prepare($sql);

    //$stmt->bind_param("s", $user_id);
    //$stmt->store_result();

    $stmt->bind_result($user_id, $school_id, $school_type, $last_name, $first_name, $username, $permission, $status);

    $stmt->execute();




    //while loop

    while ($stmt->fetch()) {

      echo "<tr>";
      echo "<td>$user_id</td>";
      echo "<td>$school_id</td>";
      echo "<td>$school_type</td>";
      echo "<td>$last_name</td>";
      echo "<td>$first_name</td>";
      echo "<td>$username</td>";
      echo "<td>$permission</td>";
      echo "<td>$status</td>";
      echo "<td><a href='manageusers.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
      echo "<td><a href='#'>Delete</a></td>";

      echo "</tr>";
    }

    $stmt->close();

    $conn->close();

    //}

    ?>





  </tbody>
</table>