<?php
$layout = 'settings';
/** @var Array $data */
?>
<h3>Password</h3>
<form method="post" action="?c=user&a=changepassword">
   <div class="mb-1">
       <div class="text-center text-danger mb-3">
           <?= @$data['message'] ?>
       </div>
       <label class="text-white" for="oldPassword">Old password</label>
       <input required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*-_]{8,}" name="oldPassword" type="password" class="form-control rounded-3 text-bg-dark " id="oldPassword" placeholder="Old password">
       <label class="text-white" for="newPassword">New password</label>
       <input required pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*-_]{8,}" name="newPassword" type="password" class="form-control rounded-3 text-bg-dark " id="newPassword" placeholder="New Password">
    </div>
    <small class="text-muted">All changes will be saved</small>
    <button class="w-100 mb-2 btn  rounded-3 btn-danger" type="submit">Save</button>
</form>