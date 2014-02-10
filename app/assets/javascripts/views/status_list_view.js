(function($) {
    StatusListView = DatatableHistoryView.extend({
        events: _.extend({
            "submit #status-filter": "submitStatusFilter"
        }, DatatableHistoryView.prototype.events),

        _selectors: _.extend({
            DATATABLE: "#statuslist",
            FILTER_FORM: "#status-filter"
        }, DatatableHistoryView.prototype._selectors),

        activeNavbar: "#status",

        isPoppingState: false,
        isPushingState: false,
        withSearchBar: false,

        currentInfo: _.extend({
            OJ: null,
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
            if (info.userShown != this.currentInfo.userShown) {
                $(this._selectors.OJ_SELECTOR).val(info.OJ).trigger('change');
            }

            if (info.shownStat != this.currentInfo.shownStat) {
                $(this._selectors.STAT_BTNS).filter('[stat=' + info.shownStat + ']').click();
            }

            if (info.unsolveCheck != this.currentInfo.unsolveCheck) {
                $(this._selectors.UNSOLVED_BTNS).filter('[unsolved=' + info.unsolveCheck + ']').click();
            }
        },

        submitStatusFilter: function() {

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
            return (this.currentInfo.userShown == "" ? "" : "&user=" + this.currentInfo.userShown) +
                    (this.currentInfo.pidShown == "" ? "" : "&pid=" + this.currentInfo.pidShown) +
                    (this.currentInfo.resultShown == "" ? "" : "&result=" + this.currentInfo.shownStat) +
                    (this.currentInfo.languageShown == "" ? "" : "&language=" + this.currentInfo.languageShown);
        },

        renderView: function() {
        },

        afterTableDrawn: function() {
            $(".dataTables_paginate .last").remove();
        },

        setupTableOptions: function() {
            this.tableOptions = ({
                "sDom": '<"row"<"col-sm-12"p>r<"table-responsive"t><"col-sm-9"i><"col-sm-3">>',
                "oLanguage": {
                    "sEmptyTable": "No status found.",
                    "sZeroRecords": "No status found.",
                    "sInfoEmpty": "No status to show."
                },
                "sAjaxSource": globalConfig.misc.base_path + "resource/status",
                "aaSorting": [ [1, 'desc'] ],
                "sPaginationType": "bs_full",
                "bLengthChange": false,
                "iDisplayLength": globalConfig.limits.status_per_page,
                "iDisplayStart": (this.currentInfo.page - 1) * globalConfig.limits.status_per_page,
                "aoColumnDefs": [
                    { "sWidth": "170px", "aTargets": [ 8 ] },
                    { "sWidth": "210px", "aTargets": [ 3 ] },
                    { "bSortable": false, "aTargets": [ 0, 2, 3, 4, 5, 6, 7, 8, 9 ] },
                    { "bVisible": false, "aTargets": [ 9 ] },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a target='_blank' href='" + globalConfig.misc.base_path + "user/" + data + "'>" + data + "</a>";
                        },
                        "aTargets": [ 0 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='" + globalConfig.misc.base_path + "problem/" + data + "'>" + data + "</a>";
                        },
                        "aTargets": [ 2 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (data == "0" && full[6] == "0") {
                                return "";
                            }
                            return data + " ms";
                        },
                        "aTargets": [ 5 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (data == "0") {
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