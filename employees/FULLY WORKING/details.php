<?php
// Start the session
session_start();
?>
<?php
  include 'action.php';
?>

<?php
  $con = mysqli_connect("localhost","119253","saltaire","119253");
?>
<!DOCTYPE html>
<HTML>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Saltaire Sports</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  <link rel="stylesheet" href="dbstyle.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Target', 'Sales'],
        ['Target', <?= $vSalestarget; ?>],
        ['Sales',  <?= $vsales6; ?>],
      ]);

      var options = {
        title: 'Employee Performance'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

</head>

<body>


  <nav>
    <div class="menu">
      <div class="header">
        <a href="#">SalesKPI</a>
      </div>
      <ul>
        <li><a href="admin.php">All Contacts</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>



<br><br><br><br>



  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-3 bg-info p-4 rounded">
        <h2 class="bg-light p-2 rounded text-center text-dark">ID : <?= $vid; ?></h2>
        <div class="text-center">
          <img src="<?= $vphoto; ?>" width="300" class="img-thumbnail">
        </div>

        <?php
        $tick = '<img src="tick.png" alt="tick" width="25" height="25">';
        $cross = '<img src="cross.png" alt="tick" width="25" height="25">';
        if($vsales6 > $vSalestarget){
          echo 'You qualify for a bonus!';
          $_SESSION["bonus"] = $tick;}
        else{
          echo 'Not qualified';
          $_SESSION["bonus"] = $cross;}
        ?>

        <h4 class="text-light">Name : <?= $vname; ?></h4>
        <h4 class="text-light">Email : <?= $vemail; ?></h4>
        <h4 class="text-light">Phone : <?= $vphone; ?></h4>
        <h4 class="text-light">Region : <?= $vRegion; ?></h4>
        <h4 class="text-light">Sales Target : <?= $vSalestarget; ?></h4>
        <h4 class="text-light">Sales : <?= $vsales6; ?></h4>
        <h4 class="text-light">Bonus Amount : £<?= $vbonusAmount; ?></h4>
        <h4 class="text-light">Achived : <?= $_SESSION["bonus"] ?></h4>
        
      </div>
      <div id="piechart" style="width: 600px; height: 600px; background: red;"></div>
    </div>
  </div>



<footer>
    <p>&copy; Copyright 2021 Fouad Rabah</p>
</footer>


</body>
</html>

