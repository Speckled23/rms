<?php
  require_once '../tools/functions.php';
  require_once '../classes/tenants.class.php';
  require_once '../tools/variables.php';
  require_once '../includes/dbconfig.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin'){
        header('location: ../login/login.php');
    }

    if(isset($_POST['save'])){

      //sanitize user inputs
      
      $p_unit_id = htmlentities($_POST['p_unit_id']);
      $tenant_id = htmlentities($_POST['tenant_id']);
      $sdate = htmlentities($_POST['sdate']);
      $ndate = htmlentities($_POST['ndate']);
      $rent = htmlentities($_POST['rent']);
      $deposit = htmlentities($_POST['deposit']);
      $advance = htmlentities($_POST['advance']);
      $electricity = htmlentities($_POST['electricity']);
      $water = htmlentities($_POST['water']);
     // $leasedos = htmlentities($_POST['leasedos']);

      // Attempt insert query execution
      $sql = "INSERT INTO `lease`(`p_unit_id`, `tenant_id`, `sdate`, `ndate`, `rent`, `deposit`, `advance`, `electricity`, `water`) 
      VALUES ('$p_unit_id', '$tenant_id', '$sdate', '$ndate', '$rent', '$deposit', '$advance', '$electricity', '$water' )";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        header("Location: lease.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }

    
    $page_title = 'RMS | Add LEASE';
    $tenant = 'active';
    require_once '../includes/header.php';
?>
<body>
  <div class="container-scroller">
    <?php
      require_once '../includes/navbar.php';
    ?>
  <div class="container-fluid page-body-wrapper">
  <?php
      require_once '../includes/sidebar.php';
    ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bolder">ADD LEASE</h3> 
        </div>
        <div class="add-page-container">
          <div class="col-md-2 d-flex justify-align-between float-right">
            <a href="lease.php" class='bx bx-caret-left'>Back</a>
          </div>
        </div>
      </div>
      <form action="add_lease.php" method="POST">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-bolder">Lease Details</h4>
                    <form class="form-sample">

                              <label for="p_unit_id">Property Unit Name</label>
                              <input class="form-control form-control-sm" type="text" id="p_unit_id" name="p_unit_id" value="" required>                              </div>



                              <label for="tenant_id">Tenant Name</label>
                              <input class="form-control form-control-sm" type="text" id="tenant_id" name="tenant_id" value="">



                              <label for="sdate">Start Date</label>
                              <input class="form-control form-control-sm" type="date" id="sdate" name="sdate" value="" required>



                              <label for="ndate">End DAte</label>
                              <input class="form-control form-control-sm" type="date" id="ndate" name="ndate" value="">

                              <label for="rent">Monthly Rate</label>
                              <input class="form-control form-control-sm" type="number" id="rent" name="rent" value="">



                              <label for="deposit">One Month Deposit</label>
                              <input class="form-control form-control-sm" type="number" id="deposit" name="deposit" value="">


                              <label for="advance">One Month Advance</label>
                              <input class="form-control form-control-sm"  type="number" id="advance" name="advance" required>

                              <label for="electricity">Electricity</label>
                              <input class="form-control form-control-sm"  type="number" id="electricity" name="electricity" required>

                              <label for="water">Water</label>
                              <input class="form-control form-control-sm"  type="number" id="water" name="water" required>


                          <div class="ps-6">
                            <input type="submit" class="btn btn-success btn-sm" value="Save Tenant" name="save" id="save">
                          </div>
                      </div>
                    </form> 
                  </div>
                </div>
            </div>
          </div>
        </div>

       <!--   <script>

              document.getElementById("set_to_primary").addEventListener("click", function(){
              document.getElementById("status").value = "Primary";
            });

            // Script to show/hide "other_vehicle_type" input field
            var vehicleTypeCheckboxes = document.querySelectorAll('input[name="vehicle_type[]"]');
            var otherVehicleTypeInput = document.querySelector('input[name="other_vehicle_type"]');
            var otherVehicleTypeLabel = document.querySelector('label[for="other_vehicle"]');

            vehicleTypeCheckboxes.forEach(function(checkbox) {
              checkbox.addEventListener('change', function() {
                if (checkbox.value === 'others' && checkbox.checked) {
                  otherVehicleTypeInput.style.display = 'block';
                  otherVehicleTypeLabel.hidden = false;
                } else {
                  otherVehicleTypeInput.style.display = 'none';
                  otherVehicleTypeLabel.hidden = true;
                }
              });
            });
          </script> -->
      </form>
