<?php
include '../master/header.php';

$user_query = "SELECT * FROM users";
$users = mysqli_query($db_connect,$user_query);


?>
      
       <div class="row">
        <div class="col">
        <div class="page-description">
          <h1>Dashboard</h1>
             </div> 
        </div>
       </div> 
             
             </div>     <?php if(isset($_SESSION['temp_name'])) : ?>
             <div class="row">
                <div class="col">
                <div class="alert alert-custom" role="alert">
                                                    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
                                                    <div class="alert-content">
                                                        <span class="alert-title"> welcom chief, Mr. <?= $_SESSION['temp_name'] ?></span>
                                                        <span class="alert-text">Your E-mail is - <?=  $_SESSION['author_email'] ?></span>
                                                    </div>
                                                </div>
                </div>
                <?php endif; unset($_SESSION['temp_name']); ?>

                      <div class="row">
                       <div class="col-8">
                      <div class="card">
                        <div class="card-header">
                            Users Information,
                        </div>
                        <div class="card-body" style="overflow-y: scroll; height:300px">
                        <div class="example-content">
                                                <table class="table">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">name</th>
                                                            <th scope="col">email</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php
                                                          $num = 1; 
                                                          $authID = $_SESSION['author_id'];
                                                           foreach($users as $user) : 

                                                            if($user['id'] == $authID ){
                                                                continue;
                                                            }
                                                             
                                                           ?>
                                                        <tr>
                                                            <th scope="row">
                                                            <?= $num++ ?>
                                                            </th>
                                                            <td>
                                                                <?= $user['name']?>
                                                            </td>
                                                            <td>
                                                            <?= $user['email']?>
                                                            </td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                           <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                        </div>
                      </div>

                    </div>
                  </div>
                 

  <?php
  
  include '../master/footer.php';

  ?>