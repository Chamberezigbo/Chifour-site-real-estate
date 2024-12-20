<?php
include './header.php';
require('../core/pdo.php');

$db = new DatabaseClass();

// Fetch the agent's current profile details
$user_id = $_SESSION['user_id']; // Get user_id from the session
$agent = $db->SelectOne("SELECT * FROM agent WHERE user_id = :user_id", ['user_id' => $user_id]);

// Check if the agent is verified
$is_verified = $agent['verified'] == 1;
$verification_status = $is_verified ? "Verified" : "Not Verified";
$border_class = $is_verified ? "border-left-warning" : "border-left-danger";
$text_class = $is_verified ? "text-warning" : "text-danger";

?>
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
     </div>

     <!-- Content Row -->
     <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <!-- <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Number Of Users</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div> -->

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Number Of Sales</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <!-- <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products
                                   </div>
                                   <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $products ?></div>
                                        </div>
                                        <div class="col">
                                             <div class="progress progress-sm mr-2">
                                                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div> -->

          <!-- Status Card (Verification) -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card <?= $border_class ?> shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold <?= $text_class ?> text-uppercase mb-1">
                                        Status</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800"><?= htmlspecialchars($verification_status) ?></div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-comments fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<?php
include './footer.php';
ob_end_flush();
