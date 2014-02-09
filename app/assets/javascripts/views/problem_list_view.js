(function($) {
    ProblemListView = BaseView.extend({
        events: _.extend({
            "click #problist a.source_search": "clickSource",
            "page #problist": "updateUrl",
            "filter #problist": "updateUrl"
        }, BaseView.prototype.events),

        _selectors: _.extend({
            PROBLEM_LIST: "#problist",
            SEARCH_INPUT: "#problist_filter input[type=search]"
        }, BaseView.prototype._selectors),

        activeNavbar: "#problem",

        isRendering: false,

        listTable: null,
        currentInfo: {
            page: null,
            searchString: null,
            OJ: null,
            shownStat: null,
            unsolveCheck: null,
        },

        parseUrlParams: function(url) {
            url = url || window.location.href;
            this.currentInfo.page = parseInt(Helpers.getUrlParam('page', url) || "1");
            if (_.isNaN(this.currentInfo.page)) this.currentInfo.page = 1;
            this.currentInfo.searchString = Helpers.getUrlParam('searchstr', url) || "";
            this.currentInfo.unsolveCheck = Helpers.getUrlParam('unsolved', url) || "0";
            this.currentInfo.shownStat = Helpers.getUrlParam('stat', url) || "0";
            this.currentInfo.OJ = Helpers.getUrlParam('oj', url) || "";
        },

        beforeRender: function() {
            this.parseUrlParams();
        },

        changeState: function() {
            var state = History.getState();
            this.parseUrlParams(state.hash);
            this.listTable.fnPageChange(state.data.info.page - 1);
            this.listTable.fnFilter(state.data.info.searchString);
            $(this._selectors.SEARCH_INPUT).val(state.data.info.searchString)
        },

        afterRender: function(evt) {
            var self = this;
            History.Adapter.bind(window, 'statechange', function(){
                self.changeState();
            });
        },

        clickSource: function(evt) {
        },

        updateUrl: function() {
            if (this.isRendering || !this.listTable) return;
            this.currentInfo.page = this.listTable.fnPagingInfo().iPage + 1;
            this.currentInfo.searchString = $(this._selectors.SEARCH_INPUT).val();

            var url = (this.currentInfo.OJ == "" ? "" : "&oj=" + this.currentInfo.OJ) +
                    (this.currentInfo.unsolveCheck == "0" ? "" : "&unsolved=" + this.currentInfo.unsolveCheck) +
                    (this.currentInfo.shownStat == "0" ? "" : "&stat=" + this.currentInfo.shownStat) +
                    (this.currentInfo.page == 1 ? "" : "&page=" + this.currentInfo.page) +
                    (this.currentInfo.searchString == "" ? "" : "&searchstr=" + encodeURIComponent(this.currentInfo.searchString));

            if (url != "") url = "?" + url.substr(1);
            History.pushState({'info': this.currentInfo}, "Problem List", url);
        },

        render: function() {
            this.generateListTable();
        },

        generateListTable: function() {
            var self = this;
            this.listTable = $(this._selectors.PROBLEM_LIST).dataTable({
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"row"<"col-sm-12"pf>r<"table-responsive"t><"col-sm-9"i><"col-sm-3"l>>',
                "oLanguage": {
                    "sEmptyTable": "No problems found.",
                    "sZeroRecords": "No problems found.",
                    "sInfoEmpty": "No entries to show"
                },
                "sAjaxSource": "/resource/problem",
                "fnServerParams": function(aoData) {
                    // set isRendering before ajax call
                    self.isRendering = true;
                    // stop previous ajax, a little bit hacky
                    if (this.fnSettings().jqXHR) this.fnSettings().jqXHR.abort();

                    aoData.push({"name" : 'unsolved', "value" : self.currentInfo.unsolveCheck});
                },
                "aaSorting": [ [ 1, 'asc'] ],
                "sPaginationType": "bs_full",
                "aLengthMenu": [[25, 50, 100, 150, 200], [25, 50, 100, 150, 200]] ,
                "iDisplayLength": globalConfig.limits.problems_per_page,
                "iDisplayStart": (this.currentInfo.page - 1) * globalConfig.limits.problems_per_page,
                
                "oSearch": {"sSearch": self.currentInfo.searchString},
                "aoColumnDefs": [
                    { "sWidth": "65px", "aTargets": [ 10 ] },
                    { "sWidth": "55px", "aTargets": [ 0, 1, 4, 5, 6, 7, 8, 9, 11 ] },
                    { "bSortable": false, "aTargets": [ 0, 10 ] },
                    { "bVisible": false , "aTargets": [ 6, 7, 8, 9 ] },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='status.php?showpid=" + full[1] + "&showres=Accepted'>" + full[4] + "</a>";
                        },
                        "aTargets": [ 4 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='status.php?showpid=" + full[1] + "'>" + full[5] + "</a>";
                        },
                        "aTargets": [ 5 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='problem_show.php?pid=" + full[1] + "' title='" + full[2] + "' >" + full[2] + "</a>";
                        },
                        "aTargets": [ 2 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a class='source_search' href='#' title='" + data + "'>"+data+"</a>";
                        },
                        "aTargets": [ 3 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            return "<a href='problem_show.php?pid=" + data + "'>" + data + "</a>";
                        },
                        "aTargets": [ 1 ]
                    },
                    {
                        "mRender": function ( data, type, full ) {
                            if (data == "Yes") return "<span class='ac'>" + data + "</span>";
                            if (data == "No") return "<span class='wa'>" + data + "</span>";
                            return data;
                        },
                        "aTargets": [ 0 ]
                    }
                ],
                "fnDrawCallback": function() {
                    self.isRendering = false;
                }
            }).fnSetFilteringDelay();
        }
        
    });
}).call(this, jQuery);