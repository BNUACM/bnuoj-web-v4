<div id="modifydialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modifyUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modifyUserModal">Modify My Information</h4>
            </div>
            <form method="post" action="ajax/user_modify.php" id="modify_form" class="form-horizontal ajform" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rusername">Username </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="username" id="rusername" placeholder="Username" value="{{{ Auth::user()->username }}}" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ropassword">Old Password </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="ol_password" id="ropassword" placeholder="Old Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rpassword">New Password </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" id="rpassword" placeholder="New Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rrpassword">Repeat Password </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="repassword" id="rrpassword" placeholder="Repeat Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-sm-2" for="rnickname">Nickname </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nickname" id="rnickname" placeholder="Nickname" value="{{{ Auth::user()->nickname }}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rschool">School </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="school" id="rschool" placeholder="School" value="{{{ Auth::user()->school }}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="remail">Email </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="email" id="remail" placeholder="Email" value="{{{ Auth::user()->email }}}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msgbox" style="display:none"></span>
                    <input class="btn btn-primary" type="submit" name="name" value="Modify" />
                </div>
            </form>
        </div>
    </div>
</div>