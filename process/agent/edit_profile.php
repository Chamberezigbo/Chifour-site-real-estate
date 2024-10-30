<?php
require "header.php";
require('../core/pdo.php');

$db = new DatabaseClass();

$msg = $success = '';
if (isset($_SESSION['success']) && isset($_SESSION['msg'])) {
     $success = $_SESSION['success'] || false;
     $msg = $_SESSION['msg'];
     unset($_SESSION['success']);
     unset($_SESSION['msg']);
}

// Fetch the agent's current profile details
$user_id = $_SESSION['user_id']; // Get user_id from the session
$agent = $db->SelectOne("SELECT * FROM agent WHERE user_id = :user_id", ['user_id' => $user_id]);

// Handle form submission for updating agent profile
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     try {
          if (isset($_POST['action']) && $_POST['action'] == 'update-profile') {
               $db->Update("UPDATE agent SET fullName = :fullName, phone = :phone, bank_acc_name = :bank_acc_name, address = :address, bank_name = :bank_name, bank_acc_number = :bank_acc_number WHERE user_id = :user_id", [
                    'fullName' => $_POST['full_name'],
                    'phone' => $_POST['phone'],
                    'bank_acc_name' => $_POST['bank_acc_name'],
                    'address' => $_POST['address'],
                    'bank_name' => $_POST['bank_name'],
                    'bank_acc_number' => $_POST['bank_acc_number'],
                    'user_id' => $user_id,
               ]);
               $_SESSION['success'] = true;
               $_SESSION['msg'] = "Profile has been updated.";
               header("Location:../agent/edit_profile.php");
               exit();
          }
     } catch (Exception $e) {
          error_log($e);
          $_SESSION['success'] = false;
          $_SESSION['msg'] = "A server error has occurred.";
          header("Location:../agent/edit_profile.php");
          exit();
     }
}
?>

<div class="content-inner w-100">
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Edit Agent Profile</h2>
          </div>
     </header>

     <section class="container-fluid p-3">
          <div style="max-width: 500px; margin:auto;">
               <form method="post" action="" novalidate>
                    <input type="hidden" name="action" value="update-profile">
                    
                    <div class="mb-3">
                         <label class="form-label">Full Name</label>
                         <input class="form-control" type="text" name="full_name" value="<?= htmlspecialchars($agent['fullName']) ?>" required>
                    </div>

                    <div class="mb-3">
                         <label class="form-label">Phone</label>
                         <input class="form-control" type="text" name="phone" value="<?= htmlspecialchars($agent['phone']) ?>" required>
                    </div>

                    <div class="mb-3">
                         <label class="form-label">Bank Account Name</label>
                         <input class="form-control" type="text" name="bank_acc_name" value="<?= htmlspecialchars($agent['bank_acc_name']) ?>" required>
                    </div>

                    <div class="mb-3">
                         <label class="form-label">Address</label>
                         <input class="form-control" type="text" name="address" value="<?= htmlspecialchars($agent['address']) ?>" required>
                    </div>

                    <div class="mb-3">
                         <label class="form-label">Bank Name</label>
                         <input class="form-control" type="text" name="bank_name" value="<?= htmlspecialchars($agent['bank_name']) ?>" required>
                    </div>

                    <div class="mb-3">
                         <label class="form-label">Bank Account Number</label>
                         <input class="form-control" type="text" name="bank_acc_number" value="<?= htmlspecialchars($agent['bank_acc_number']) ?>" required>
                    </div>

                    <div class="mb-2">
                         <button class="btn btn-success">Update Profile</button>
                    </div>
               </form>
          </div>
     </section>

     <?php if (isset($success) && isset($msg)) : ?>
          <script>
               toastr.<?= $success ? 'success' : 'error' ?>("<?php echo $msg; ?>");
          </script>
     <?php endif; ?>
</div>

<?php require 'footer.php'; ?>
