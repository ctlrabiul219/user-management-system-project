<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php

if (isset($_GET['remove'])) {
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $removeUser = $users->deleteUserById($remove);
}

if (isset($removeUser)) {
  echo $removeUser;
}

 ?>
<div class="card ">
    <div class="card-header">
        <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
                    <span class="badge badge-lg badge-secondary text-white">
                        <?php
$username = Session::get('username');
if (isset($username)) {
  echo $username;
}
 ?></span>

                </strong></span></h3>
    </div>
    <div class="card-body pr-2 pl-2">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">User Name</th>

                    <th class="text-center">Email address</th>

                    <th width='25%' class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                      $allUser = $users->selectAllUserData();

                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                <tr class="text-center" <?php if (Session::get("id") == $value->id) {
                        echo "style='background:#d9edf7' ";
                      } ?>>

                    <td><?php echo $i; ?></td>
                    <td><?php echo $value->username; ?></td>

                    <td><?php echo $value->email; ?></td>

                    <td>
                        <?php if ( Session::get("roleid") == '1') {?>
                        <a class="btn btn-success btn-sm
                            " href="profile.php?id=<?php echo $value->id;?>">View</a>
                        <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                   
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>


                        <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                        <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                        <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php  }elseif( Session::get("roleid") == '2'){ ?>
                        <a class="btn btn-success btn-sm
                         
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>
                        <a class="btn btn-info btn-sm
                         
                          " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                        <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                        <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }else{ ?>
                        <a class="btn btn-success btn-sm
                        
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>

                        <?php } ?>

                    </td>
                </tr>
                <?php }}else{ ?>
                <tr class="text-center">
                    <td>No user availabe now !</td>
                </tr>
                <?php } ?>

            </tbody>

        </table>


    </div>
</div>

<?php
  include 'inc/footer.php';

  ?>