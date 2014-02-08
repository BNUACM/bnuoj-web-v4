<div id="modifydialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modifyUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modifyUserModal">Modify My Information</h4>
            </div>
            {{ Form::open(array(
                'url' => '/register',
                'id' => 'reg_form',
                'class' => 'ajform form-horizontal',
                'role' => 'form'
            )) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::text('username', Auth::user()->username, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('ol_password', 'Old Password', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::password('ol_password', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'New Password', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('repassword', 'Repeat Password', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::password('repassword', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nickname', 'Nickname', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::text('nickname', Auth::user()->nickname, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('school', 'School', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::text('school', Auth::user()->school, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::email('email', Auth::user()->email, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msgbox" style="display:none"></span>
                    {{ Form::submit('Modify', array('class' => 'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>