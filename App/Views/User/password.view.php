<?php
$layout = 'settings';
?>
<h3>Password</h3>
<form method="post" class="">
   <div class="mb-1">
        <label class="text-white" for="oldPassword">Old password</label>
        <input name="oldPassword" type="password" class="form-control rounded-3 text-bg-dark " id="oldPassword" placeholder="Old password">
        <label class="text-white" for="newPassword">New password</label>
        <input name="newPassword" type="password" class="form-control rounded-3 text-bg-dark " id="newPassword" placeholder="New Password">
    </div>
    <small class="text-muted">All changes will be saved</small>
    <button class="w-100 mb-2 btn  rounded-3 btn-danger" type="submit">Save</button>
</form>