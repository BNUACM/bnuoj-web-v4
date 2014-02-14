<div id="statusdialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rtitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="rtitle">Title</h4>
            </div>
            <div class="modal-body">
                <div class="well" style="text-align:center" id="rcontrol">
                    Result: <span id="rresult"></span> &nbsp;&nbsp;&nbsp; Memory Used: <span id="rmemory"></span> KB &nbsp;&nbsp;&nbsp; Time Used: <span id="rtime"></span> ms <br/>
                    Language: <span id="rlang"></span> &nbsp;&nbsp;&nbsp; Username: <span id="ruser"></span> &nbsp;&nbsp;&nbsp; Problem ID: <span id="rpid"></span> <br/>
                    Share Code? <div class="btn-group" id="rshare"><button id="sharey" type="button" class="btn btn-info">Yes</button><button id="sharen" type="button" class="btn btn-info">No</button></div> <br />
                    <b id='sharenote'>This code is shared.</b>
                </div>
                <button class="pull-right btn btn-mini btn-inverse" data-clipboard-target="dcontent" id="copybtn">Copy</button>
                <pre id="dcontent"></pre>
            </div>
        </div>
    </div>
</div>
