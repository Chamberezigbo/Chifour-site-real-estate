<?php
include 'header.php';
require('../core/pdo.php');
$db = new DatabaseClass();

// Query the database after processing any POST requests
$users = $db->SelectAll("SELECT * FROM agent");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">List of Users</h1>

     <!-- DataTables Example -->
     <div class="card shadow mb-4">
          <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Agent List</h6>
          </div>
          <?php if (isset($users) && count($users)) { ?>
               <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                   <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tfoot>
                                   <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                   </tr>
                              </tfoot>
                              <tbody>
                                   <?php foreach ($users as $i => $user) { ?>
                                        <tr>
                                             <th scope="row"><?php echo ++$i; ?></th>
                                             <td><?php echo htmlspecialchars($user['fullName']); ?></td>
                                             <td><?php echo htmlspecialchars($user['email']); ?></td>
                                             <td><?php echo $user['verified'] ? 'Verified' : 'Not Verified'; ?></td>
                                             <td>
                                                  <?php if (!$user['verified']) { ?>
                                                       <button class="btn btn-success btn-sm verify-btn" data-user-id="<?=$user['user_id']; ?>">Verify</button>
                                                  <?php } else { ?>
                                                       <span class="text-muted">Already Verified</span>
                                                  <?php } ?>
                                             </td>
                                        </tr>
                                   <?php } ?>
                              </tbody>
                         </table>
                    </div>
               </div>
          <?php } else { ?>
               <div class="text-center" style="font-size: 1.2rem;">
                    <p><i class="fa-4x fas fa-exclamation-triangle text-warning"></i></p>
                    <p>No users found. <a href="./tables.php">Try again?</a></p>
               </div>
          <?php } ?>
     </div>

</div>
<!-- /.container-fluid -->

<script>
     // AJAX request to verify the agent
     document.addEventListener("DOMContentLoaded", function() {
          const verifyButtons = document.querySelectorAll(".verify-btn");

          verifyButtons.forEach(button => {
               button.addEventListener("click", function() {
                    const userId = this.getAttribute("data-user-id");

                    fetch("verify_agent.php", {
                         method: "POST",
                         headers: {
                              "Content-Type": "application/x-www-form-urlencoded"
                         },
                         body: `user_id=${userId}` // Changed to user_id
                    })
                    .then(response => response.text())
                    .then(data => {
                         console.log("Response from server:", data);
                         if (data === "success") {
                              location.reload(); // Reload the page to update the verification status
                         } else {
                              alert("Verification failed. Please try again.");
                         }
                    })
                    .catch(error => console.error("Error:", error));
               });
          });
     });
</script>

<?php
include "footer.php";
?>
