(function($) {
    StatusListView = DatatableHistoryView.extend({
        events: _.extend({
            "submit #status-filter": "submitStatusFilter"
        }, DatatableHistoryView.prototype.events),

        _selectors: _.extend({
            DATATABLE: "#statuslist",
            FILTER_FORM: "#status-filter",
            USER_FILTER: "#status-filter [name='showname']",
            PID_FILTER: "#status-filter [name='showpid']",
            RESULT_FILTER: "#status-filter [name='showres']",
            LANGUAGE_FILTER: "#status-filter [name='showlang']"
        }, DatatableHistoryView.prototype._selectors),

        activeNavbar: "#status",

        isPoppingState: false,
        isPushingState: false,
        withSearchBar: false,

        currentInfo: _.extend({
            userShown: null,
            pidShown: null,
            resultShown: null,
            languageShown: null,
        }, DatatableHistoryView.prototype.currentInfo),

        parseUrlParams: function(url) {
            url = url || window.location.href;
            this.currentInfo.userShown = Helpers.getUrlParam('user', url) || "";
            this.currentInfo.pidShown = Helpers.getUrlParam('pid', url) || "";
            this.currentInfo.resultShown = Helpers.getUrlParam('result', url) || "";
            this.currentInfo.languageShown = Helpers.getUrlParam('language', url) || "";
        },

        filterStateInfo: function(info) {
            $(this._selectors.USER_FILTER).val(info.userShown);
            $(this._selectors.PID_FILTER).val(info.pidShown);
            $(this._selectors.RESULT_FILTER).val(info.resultShown);
            $(this._selectors.LANGUAGE_FILTER).val(info.languageShown);
            $(this._selectors.FILTER_FORM).submit();
        },

        submitStatusFilter: function() {
            if (this.currentInfo.userShown != $(this._selectors.USER_FILTER).val()) {
                this.currentInfo.userShown = $(this._selectors.USER_FILTER).val();
                this.listTable.fnFilter(this.currentInfo.userShown, 0);
            }
            if (this.currentInfo.pidShown != $(this._selectors.PID_FILTER).val()) {
                this.currentInfo.pidShown = $(this._selectors.PID_FILTER).val();
                this.listTable.fnFilter(this.currentInfo.pidShown, 2);
            }
            if (this.currentInfo.resultShown != $(this._selectors.RESULT_FILTER).val()) {
                this.currentInfo.resultShown = $(this._selectors.RESULT_FILTER).val();
                this.listTable.fnFilter(this.currentInfo.resultShown, 3);
            }
            if (this.currentInfo.languageShown != $(this._selectors.LANGUAGE_FILTER).val()) {
                this.currentInfo.languageShown = $(this._selectors.LANGUAGE_FILTER).val();
                this.listTable.fnFilter(this.currentInfo.languageShown, 4);
            }
        },

        afterRenderView: function() {
            if (this.currentInfo.OJ != "") {
                $(this._selectors.OJ_SELECTOR).val(this.currentInfo.OJ).trigger('change');
            }
            $(this._selectors.STAT_BTNS).filter('[stat=' + this.currentInfo.shownStat + ']').click();
            $(this._selectors.UNSOLVED_BTNS).filter('[unsolved=' + this.currentInfo.unsolveCheck + ']').addClass('active');
        },

        getCurrentTitle: function() {
            return "Status List";
        },

        getViewUrl: function() {
            return (this.currentInfo.userShown == "" ? "" : "&user=" + encodeURIComponent(this.currentInfo.userShown)) +
                    (this.currentInfo.pidShown == "" ? "" : "&pid=" + encodeURIComponent(this.currentInfo.pidShown)) +
                    (this.currentInfo.resultShown == "" ? "" : "&result=" + encodeURIComponent(this.currentInfo.resultShown)) +
                    (this.currentInfo.languageShown == "" ? "" : "&language=" + encodeURIComponent(this.currentInfo.languageShown));
        },

        renderView: function() {
        },

        afterTableDrawn: function() {
            // $(".dataTables_paginate .last").parent().hide();
        },

        setupTableOptions: function() {
            this.tableOptions = ({
                "sDom": '<"row"<"col-sm-12"p>r<"table-responsive"t>>',
                "oLanguage": {
                    "sEmptyTable": "No status found.",
                    "sZeroRecords": "No status found.",
                    "sInfoEmpty": "No status to show."
                },
                "sAjaxSource": basePath + "resource/status",
                "bSort": false,
                "bLengthChange": false,
                "iDisplayLength": globalConfig.limits.status_per_page,
                "iDisplayStart": (this.currentInfo.page - 1) * globalConfig.limits.status_per_page,
                "aoColumnDefs": [
                    { "sWidth": "170px", "aTargets": [ 8 ] },
                    { "sWidth": "210px", "aTargets": [ 3 ] },
                    { "bVisible": false, "aTargets": [ 9 ] },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a target='_blank' href='" + basePath + "user/" + data + "'>" + data + "</a>";
                        },
                        "aTargets": [ 0 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='" + basePath + "problem/" + data + "'>" + data + "</a>";
                        },
                        "aTargets": [ 2 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (!data || (data == "0" && full[6] == "0")) {
                                return "";
                            }
                            return data + " ms";
                        },
                        "aTargets": [ 5 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (!data || data == "0") {
                                return "";
                            }
                            return data + " KB";
                        },
                        "aTargets": [ 6 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (data == "0") {
                                return "";
                            }
                            return data + " B";
                        },
                        "aTargets": [ 7 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            var tdata = "<span class='" + Helpers.getResultClass(data) + "'>" + data + "</span>";
                            if (data.substr(0,7) == "Compile") return "<a href='#' class='ceinfo' runid='" + full[1] + "'>" + tdata + "</a>";
                            return tdata;
                        },
                        "aTargets": [ 3 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return Helpers.getLocalTime(data);
                        },
                        "aTargets": [ 9 ]
                    }
                ]
            });
        }
    });
}).call(this, jQuery);