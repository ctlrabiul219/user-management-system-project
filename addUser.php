<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
if ($sId === '1') { ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

  $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


<div class="card ">
    <div class="card-header">
        <h3 class='text-center'>Add New User</h3>
    </div>
    <div class="cad-body">



        <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group">
                    <label for="username">Your username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="sel1">Select user Role</label>
                        <select class="form-control" name="roleid" id="roleid">
                            <option value="1">Admin</option>
                            <option value="2">User</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="addUser" class="btn btn-success">Save</button>
                </div>


            </form>
        </div>


    </div>
</div>

<?php
}else{

  header('Location:index.php');



}
 ?>

<?php
  include 'inc/footer.php';

  ?>