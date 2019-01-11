<div class="container">
    <div class="row align-middle">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="height: 100%">
            <div class="row justify-content-center">
                <h1 class="my-4">edit your profile</h1>
                <form id="loginForm" action="../profile/edit"  method="post">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">Current email:</label>
                        <div class="col-md-8">
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $_SESSION['profile'][0]['email']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label">Current password:</label>
                        <div class="col-md-8">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword1" class="col-md-4 col-form-label">New password:</label>
                        <div class="col-md-8">
                            <input type="password" id="newPassword1" name="newPassword1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword2" class="col-md-4 col-form-label">Repeat new password:</label>
                        <div class="col-md-8">
                            <input type="password" id="newPassword2" name="newPassword2"" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newEmail" class="col-md-4 col-form-label">New email address:</label>
                        <div class="col-md-8">
                            <input type="text" id="newEmail" name="newEmail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label">Phone:</label>
                        <div class="col-md-8">
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstName" class="col-md-4 col-form-label">First name:</label>
                        <div class="col-md-8">
                            <input type="text" id="firstName" name="firstName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-md-4 col-form-label">Last name:</label>
                        <div class="col-md-8">
                            <input type="text" id="lastName" name="lastName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="loginName" class="col-md-4 col-form-label">Login name:</label>
                        <div class="col-md-8">
                            <input type="text" id="loginName" name="loginName" class="form-control">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="update" value="update" >
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>


