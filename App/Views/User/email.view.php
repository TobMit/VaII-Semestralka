<?php
$layout = 'settings';
/** @var Array $data */
?>
<h3>Email</h3>
<form method="post" action="?c=user&a=changeemail">
    <div class="mb-1">
        <div class="text-center text-danger mb-3">
            <?= @$data['message'] ?>
        </div>
        <label class="text-white" for="oldEmail">Old email</label>
        <input name="oldEmail" type="email" class="form-control rounded-3 text-bg-dark " id="oldEmail" placeholder="name@example.com">
        <label class="text-white" for="newEmail">New email</label>
        <input name="newEmail" type="email" class="form-control rounded-3 text-bg-dark " id="newEmail" placeholder="name@example.com">
    </div>

    <small class="text-muted">All changes will be saved</small>
    <button class="w-100 mb-2 btn  rounded-3 btn-danger" type="submit">Save</button>
</form>