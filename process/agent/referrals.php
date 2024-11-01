<?php
require('header.php');

require('../core/pdo.php');
$db = new DatabaseClass();

// Fetch the agent's current profile details
$user_id = $_SESSION['user_id']; // Get user_id from the session
$agent = $db->SelectOne("SELECT * FROM agent WHERE user_id = :user_id", ['user_id' => $user_id]);
?>



<!-- inner hero end -->
<div class="section-wrapper">
     <div class="cmn-section">
          <div class="container">
               <div class="card">
                    <div class="card-body">
                         <div class="col-md-12 mb-4">
                              <label>Referral Link</label>
                              <div class="input-group">
                                   <input type="text" name="text" class="form-control form--control referralURL" value="https://defiprosolutions.com/share/user/register.php?ref=<?= $agent['user_id'] ?>" readonly>
                                   <span class="input-group-text copytext copyBoard" id="copyBoard"> <i class="fa fa-copy"></i> </span>
                              </div>
                              <div class="mt-5">
                                   <label>Referrals</label>
                                   <?php
                                   $results = $db->SelectAll("SELECT * FROM agent WHERE referral = :referral", ['referral' => $agent['user_id']]);
                                   if ($results && count($results)) {
                                        foreach ($results as $i => $result) {
                                   ?>
                                             <div class="family-tree">
                                                  <div class="person">
                                                       <div class="name"><?php echo ' Name: ' . $result['fullName'] . ' Email: ' . $result['email']; ?></div>
                                                  </div>
                                             </div>
                                        <?php
                                        }
                                   } else {
                                        ?>
                                        <label class="text-center">
                                             No data available in table
                                        </label>
                                   <?php }; ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<script>
     function copyText() {
          // Get the input element
          var referralURL = document.querySelector('.referralURL');

          // Select the text inside the input element
          referralURL.select();
          referralURL.setSelectionRange(0, 99999); // For mobile devices

          // Copy the selected text
          document.execCommand("copy");

          // Alert the user that the text has been copied
          alert("Copied the referral link: " + referralURL.value);
     }

     // Attach the click event listener to the copyBoard element
     document.querySelector('.copyBoard').addEventListener('click', copyText);
</script>

<?php
require('footer.php');
?>