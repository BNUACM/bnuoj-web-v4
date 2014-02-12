(function($) {
    BaseView = BaseClass.extend({

        // View events
        // format: "event selector": "handler"
        // if selector contains spaces, we'll create a delegated event from first pattern
        // for details, please refer https://learn.jquery.com/events/event-delegation/
        events: {
            "shown.bs.modal #regdialog": "onRegisterModalShown",
            "shown.bs.modal #logindialog": "onLoginModalShown",
            "shown.bs.modal #modifydialog": "onModifyModalShown",
            "click .newslink": "onShowNews",
            "correct #login_form": "onLoggedIn",
            "correct #reg_form": "onRegistered",
            "correct #modify_form": "onUserinfoModified"
        },

        _selectors: {
            LOGIN_MODAL: "#logindialog",
            REGISTER_MODAL: "#regdialog",
            USERINFO_MODIFY_MODAL: "#modifydialog",
            NEWS_MODAL: "#newsshowdialog",
            AJAX_FORM_BTNS: "input:submit, button:submit, .btn",
            AJAX_FORM_MSG: "#msgbox",
            DISPLAY_TIME: ".display_time",
            MAIN_NAVBAR: "#main_navbar"
        },

        ajaxLoadingHtml: '<img style="height:20px" src="' + basePath + 'assets/ajax-loader.gif" /> Loading....',
        activeNavbar: null,

        start: function() {
            this.prepare();
            this.tickNavTime();
            this.setupAjaxForms();
            this.convertDisplayTime();
            this.setActiveNavbar();
            this.beforeRender();
            this.render();
            this.bindEvents();
            this.afterRender();
        },

        setActiveNavbar: function() {
            if (!this.activeNavbar) return;
            $(this.activeNavbar, this._selectors.MAIN_NAVBAR).addClass("active");
        },

        // should be overwrite by inherited class
        prepare: function() {

        },

        convertDisplayTime: function() {
            $(this._selectors.DISPLAY_TIME).each(function() {
                var time = $(this).text();
                $(this).text(Helpers.getLocalTime(time));
            });
        },

        /**
         * Bind delegated events
         * https://learn.jquery.com/events/event-delegation/
         */
        bindEvents: function() {
            var self = this;
            _.each(this.events, function(func, evt) {
                var result = evt.match(/([^ ]*) (.*)/);
                if (result[2].indexOf(' ') == -1) {
                    $(result[2]).on(result[1], function(evt) {
                        self[func].apply(self, arguments);
                        evt.preventDefault();
                    });
                } else {
                    var doms = result[2].match(/([^ ]*) (.*)/);
                    $(doms[1]).on(result[1], doms[2], function(evt) {
                        self[func].apply(self, arguments);
                        evt.preventDefault();
                    });
                }
            })
        },

        // should be overwrite by inherited class
        beforeRender: function() {

        },

        // should be overwrite by inherited class
        render: function() {

        },

        // should be overwrite by inherited class
        afterRender: function() {

        },

        tickNavTime: function() {
            setInterval("Helpers.displayNavTime()", 1000);
            setInterval("Helpers.getTime()", 180000);
        },

        onRegisterModalShown: function(evt) {
            $("#username", evt.target).focus();
        },

        onLoginModalShown: function(evt) {
            $("#username", evt.target).focus();
        },

        onModifyModalShown: function(evt) {
            $("#ol_password", evt.target).focus();
        },

        onShowNews: function(evt) {
            var nnid = $(evt.target).attr("name");
            var self = this;
            $.get(basePath + "resource/news/" + nnid, { 'rand': Math.random() }).done(function(data) {
                var gval = $.parseJSON(data);
                $("#sntitle", self._selectors.NEWS_MODAL).html(gval.title);
                $("#sncontent", self._selectors.NEWS_MODAL).html(gval.content);
                $("#sntime", self._selectors.NEWS_MODAL).html(gval.time_added);
                $("#snauthor", self._selectors.NEWS_MODAL).html("<a href='" + basePath + "user/show/" + gval.author + "'>" + gval.author + "</a>");
                $(".newseditbutton", self._selectors.NEWS_MODAL).attr("name", gval.newsid);
                $("#ntitle", self._selectors.NEWS_MODAL).html(gval.title);
                $(self._selectors.NEWS_MODAL).modal("show");
            });
        },

        setupAjaxForms: function() {
            var self = this;
            $("form.ajform").ajaxForm({
                dataType: 'json',

                beforeSerialize: function(tform, options) {
                    tform.trigger("preprocess");
                },
                beforeSubmit: function (formData, tform, options) {
                    $(self._selectors.AJAX_FORM_BTNS, tform).attr("disabled", "disabled").addClass("disabled");
                    $(self._selectors.AJAX_FORM_MSG, tform).removeClass().addClass('alert alert-info').html(self.ajaxLoadingHtml).fadeIn(500);
                    return true;
                },
                success: function(responseJSON, statusText, xhr, form) {
                    $(self._selectors.AJAX_FORM_MSG, form).fadeTo(100, 0.1, function() {
                        $(this).html(responseJSON.msg).removeClass().addClass('alert alert-success').fadeTo(100, 1, function(){
                            form.trigger("correct");
                        });
                    });
                    $(self._selectors.AJAX_FORM_BTNS, form).removeAttr("disabled").removeClass("disabled");
                },

                error: function(response, statusText, xhr, form) {
                    responseJSON = response.responseJSON;
                    $(self._selectors.AJAX_FORM_MSG, form).fadeTo(100, 0.1, function() {
                        $(this).html(responseJSON.msg).removeClass().addClass('alert alert-danger').fadeTo(300, 1);
                    });
                    $(self._selectors.AJAX_FORM_BTNS, form).removeAttr("disabled").removeClass("disabled");
                }
            });
        },

        onLoggedIn: function() {
            window.location.reload();
        },

        onRegistered: function() {
            $(this._selectors.REGISTER_MODAL).modal("hide");
            $(this._selectors.LOGIN_MODAL).modal("show");
        },

        onUserinfoModified: function() {
            window.location.reload();
        }

    })
}).call(this, jQuery);
