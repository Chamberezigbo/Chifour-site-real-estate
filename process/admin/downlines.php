<?php
require 'header.php';
require('../core/pdo.php');

$db = new DatabaseClass();
$id = (isset($_GET) && isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : exit();

?>
<style>

</style>

<div class="content-inner w-100">
     <!-- Forms Section-->
     <section class="forms">
          <div class="container-fluid">
               <div class="row">

                    <div class="mt-4 col-md-12">
                         <h2 class="title1 text-dark text-left">Your Referrals.</h2>
                         <div class="table-responsive">
                              <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                   <div class="row">
                                        <div class="col-sm-12">
                                             <table class="table UserTable table-hover text-dark dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                  <thead>
                                                       <tr role="row">
                                                            <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 174.359px;" aria-sort="descending" aria-label="Client name: activate to sort column ascending">Client name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 112.297px;" aria-label="Parent: activate to sort column ascending">Email</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182.438px;" aria-label="Client status: activate to sort column ascending">Client status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 182.438px;" aria-label="Client status: activate to sort column ascending">Refered</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php
                                                       $results = $db->SelectAll("SELECT * FROM agent WHERE referral = :referral", ['referral' => $id]);
                                                       if ($results && count($results)) {
                                                            foreach ($results as $i => $result) {
                                                       ?>
                                                                 <tr>
                                                                      <td><?php echo $result['fullName']; ?></td>
                                                                      <td><?php echo $result['email']; ?></td>
                                                                      <td><?php ($result['verified'] == 1 ? print('Verified') : print('Not verified')) ?></td>
                                                                      <td><?php echo $result['referral']; ?></td>
                                                                 </tr>
                                                            <?php
                                                            }
                                                       } else {
                                                            ?>
                                                            <tr class="odd">
                                                                 <td valign="top" colspan="3" class="dataTables_empty text-center">No data available in table</td>
                                                            </tr>
                                                       <?php }; ?>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Page Footer-->
     <?php require 'footer.php'; ?>
</div>
</div>
</div>