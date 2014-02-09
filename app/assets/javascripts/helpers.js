(function($) {
    Helpers = {
        displayNavTime: function() {
            var padlength = function(what) {
                var output = (what.toString().length == 1) ? ("0" + what) : what;
                return output;
            };
            ++ currentServerTimeStamp;
            var displayTime = moment(currentServerTimeStamp.toString() + ' ' + globalConfig.misc.server_timezone_offset , 'X Z').local();
            $("#servertime").text(displayTime.format(globalConfig.misc.datetime_format));
        },

        getTime: function() {
            $.get("/timestamp").done(function(data){
                currentServerTimeStamp = data;
            });
        },

        getLocalTime: function(servertime) {
            var displayTime = moment(servertime + ' ' + globalConfig.misc.server_timezone_offset , globalConfig.misc.datetime_format + ' Z').local();
            return displayTime.format(globalConfig.misc.datetime_format);
        },

        convertToServerTime: function(localtime) {
            var displayTime = moment(localtime);
            return displayTime.zone(globalConfig.misc.server_timezone_offset).format(globalConfig.misc.datetime_format);
        },

        getResultClass: function(res) {
            switch (res) {
                case "Compile Error":
                    return "ce";
                    break;
                case "Accepted":
                    return "ac";
                    break;
                case "Wrong Answer":
                    return "wa";
                    break;
                case "Runtime Error":
                    return "re";
                    break;
                case "Time Limit Exceed":
                    return "tle";
                    break;
                case "Memory Limit Exceed":
                    return "mle";
                    break;
                case "Output Limit Exceed":
                    return "ole";
                    break;
                case "Presentation Error":
                    return "pe";
                    break;
                case "Challenged":
                    return "wa";
                    break;
                case "Pretest Passed":
                    return "ac";
                    break;
                case "Restricted Function":
                    return "rf";
                    break;
                default:
                    return "";
            }
        },

        stripTags: function(a) {
            return a.replace(/(<([^>]+)>)/ig, "")
        },

        getUrlParam: function(a, url) {
            url = url || window.location.href;
            return decodeURIComponent((RegExp("[?|&|#]" + a + "=" + "(.*?)(&|#|;|$)").exec(url) || [null, ""])[1].replace(/\+/g, "%20")) || null
        },

        escapeHtml: function(unsafe) {
            return String(unsafe)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&apos;");
        }

    }

}).call(this, jQuery);
