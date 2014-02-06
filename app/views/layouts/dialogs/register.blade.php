<div id="regdialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="registerModal">Register</h4>
            </div>
            <form method="post" action="ajax/register.php" id="reg_form" class="form-horizontal ajform" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="rusername">Username </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="username" id="rusername" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="rpassword">Password </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="password" id="rpassword" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="rrpassword">Repeat Password </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="repassword" id="rrpassword" placeholder="Repeat Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="rnickname">Nickname </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="nickname" id="rnickname" placeholder="Nickname" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="rschool">School </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="school" id="rschool" placeholder="School" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="remail">Email </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="email" id="remail" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msgbox" style="display:none"></span>
                    <input class="btn btn-primary" type="submit" name="name" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</div>