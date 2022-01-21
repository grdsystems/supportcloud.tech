<?php
if (!isset($_SESSION)) {
  session_start();
}
$username = $_SESSION['username'];
//can't access if user not logged in
if (empty($username)) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style type="text/css">
    h3 span {
      font-size: 22px;
    }

    h3 input.search-input {
      width: 300px;
      margin-left: auto;
      float: right
    }

    .mt32 {
      margin-top: 32px;
    }
  </style>



  <title>Support Facilitator - Manage Users</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="manageusers.php">Support Facilitator - Manage Users</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./audit2.php">Audit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./graph/index.php">Graphs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">



    <?php


    if (isset($_GET['source'])) {
      $source = $_GET['source'];
    } else {
      $source = '';
    }

    switch ($source) {
      case 'add_user';
        include "includes/add_user.php";
        break;

      case 'edit_user';
        include "includes/edit_user.php";
        break;

      case '200';
        echo "NICE 200";
        break;
      default:
        include "includes/viewusers.php";
        break;
    }



    ?>


  </div>


  <script>
    (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
        var search_input;

        function _onInputSearch(e) {
          search_input = e.target;
          var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
          myArray.forEach.call(tables, function(table) {
            myArray.forEach.call(table.tBodies, function(tbody) {
              myArray.forEach.call(tbody.rows, function(row) {
                var text_content = row.textContent.toLowerCase();
                var search_val = search_input.value.toLowerCase();
                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
              });
            });
          });
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('search-input');
            myArray.forEach.call(inputs, function(input) {
              input.oninput = _onInputSearch;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          TableFilter.init();
        }
      });

    })(document);
  </script>

</body>

</html>