
<div class="container">

    <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control"  placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" placeholder="Enter Password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="First Name">First Name</label>
            <input type="text" class="form-control"  placeholder="First Name" name="firstname">
        </div>

        <div class="form-group">
            <label for="Last Name">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select name="role" required>
                <option value="Select Role">Choose Role</option>
                <option value="Admin">Admin</option>
                <option value="Subscriber">Subscriber</option>
            </select>
        </div>



        <label for="image">Upload Image</label>
        <br>
        <input type="file" name="image" id="fileToUpload">
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
</div>
</body>