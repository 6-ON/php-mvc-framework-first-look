<?php
?>
<h1>Create an Account</h1>

<form method="post">
    <div class="mb-3">
        <label for="fname" class="form-label">Last Name</label>
        <input type="text" name="name" class="form-control" id="fname" placeholder="John">
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">First Name</label>
        <input type="text" name="name" class="form-control" id="lname" placeholder="John">
    </div>

    <div class="mb-3">
            <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="subject" class="form-control" id="password" placeholder="password">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>
