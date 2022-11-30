<?php
?>
<h1>Create an Account</h1>

<form method="post">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="fname" class="form-label">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="fname" placeholder="John">
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="lname" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control" id="lname" placeholder="John">
            </div>
        </div>

    </div>


    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="password">
    </div>
    <div class="mb-3">
        <label for="confirm_psd" class="form-label">Confirm Password</label>
        <input type="password" name="passwordConfirm" class="form-control" id="confirm_psd" placeholder="Confirm password">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>
