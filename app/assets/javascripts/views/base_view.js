(function($) {
    BaseView = BaseClass.extend({
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
            NAVBAR: "#nav"
        },

        formValidationHtml: '<img style="height:20px" src="assets/ajax-loader.gif" /> Validating....',
        activeNavbar: null,

        start: function() {
            this.beforeAll();
            this.tickNavTime();
            this.setupAjaxForms();
            this.bindEvents();
            this.setActiveNavbar();
            this.run();
        },

        setActiveNavbar: function() {
            if (!this.activeNavbar) return;
            $(this.activeNavbar, this._selectors.NAVBAR).addClass("active");
        },

        beforeAll: function() {

        },

        bindEvents: function() {
            var self = this;
            _.each(this.events, function(func, evt) {
                var result = evt.match(/([^ ]*) (.*)/);
                $(result[2]).on(result[1], function() {
                    self[func].apply(self, arguments);
                });
            })
        },

        run: function() {

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
            $.get("resource/news/" + nnid, { 'rand': Math.random() }).done(function(data) {
                var gval = $.parseJSON(data);
                $("#sntitle", self._selectors.NEWS_MODAL).html(gval.title);
                $("#sncontent", self._selectors.NEWS_MODAL).html(gval.content);
                $("#sntime", self._selectors.NEWS_MODAL).html(gval.time_added);
                $("#snauthor", self._selectors.NEWS_MODAL).html("<a href='userinfo.php?name=" + gval.author + "'>" + gval.author + "</a>");
                $(".newseditbutton", self._selectors.NEWS_MODAL).attr("name", gval.newsid);
                $("#ntitle", self._selectors.NEWS_MODAL).html(gval.title);
                $(self._selectors.NEWS_MODAL).modal("show");
            });
            return false;
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
                    $(self._selectors.AJAX_FORM_MSG, tform).removeClass().addClass('alert alert-info').html(self.formValidationHtml).fadeIn(500);
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
