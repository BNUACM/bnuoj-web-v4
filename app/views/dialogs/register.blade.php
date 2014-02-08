<div id="regdialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="registerModal">Register</h4>
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
                            {{ Form::text('username', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-4')) }}
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
                            {{ Form::text('nickname', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('school', 'School', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::text('school', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-4')) }}
                        <div class="col-sm-8">
                            {{ Form::email('email', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msgbox" style="display:none"></span>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>