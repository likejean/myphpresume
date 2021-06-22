<div class="m-5">
    <form method="POST" action="includes/signup.inc.php">
        <fieldset>
            <legend>Create User</legend>
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstname" id="firstName" class="form-control" placeholder="User First Name">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastname" id="lastName" class="form-control" placeholder="User Last Name">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="User Nickname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="User Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="User Password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">User Access</label>
                <select class="form-select form-select-lg mb-3" name="role" id="role" aria-label=".form-select-lg example" >
                    <option selected><span>Open to select role</span></option>
                    <option value="guest">Guest</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </fieldset>
    </form>
</div>