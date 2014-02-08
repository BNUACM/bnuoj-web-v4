<div id="logindialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="loginModal">Login</h4>
            </div>
            {{ Form::open(array(
                'route' => 'login',
                'id' => 'login_form',
                'class' => 'ajform form-horizontal',
                'role' => 'form'
            )) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username', array('class' => 'control-label col-sm-3')) }}
                        <div class="col-sm-9">
                            {{ Form::text('username', '', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-3')) }}
                        <div class="col-sm-9">
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('cksave', '1') }}
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msgbox" style="display:none"></span>
                    {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                    <a class='toregister btn btn-default' href="#">Register</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>