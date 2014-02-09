<div id="newsshowdialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ntitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="ntitle">News Title</h4>
            </div>
            <div class="modal-body">
                <div style="margin-bottom:10px">by <b id="snauthor"></b> <span id="sntime"></span></div>
                <div id="sncontent"></div>
            </div>
@if (Auth::check() && Auth::user()->is_admin)
            <div class="modal-footer">
                <a class="newseditbutton btn btn-primary" name="" href="">Edit</a>
            </div>
@endif
        </div>
    </div>
</div>