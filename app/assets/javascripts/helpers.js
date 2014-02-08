(function($) {
    Helpers = {
        displayNavTime: function() {
            var padlength = function(what) {
                var output = (what.toString().length == 1) ? ("0" + what) : what;
                return output;
            };
            ++ currentTime;
            var displayTime = moment(currentTime, 'X');
            $("#servertime").text(displayTime.format('YYYY-MM-DD HH:mm:ss'));
        },

        getTime: function() {
            $.get("/timestamp").done(function(data){
                currentTime = data;
            });
        },

        getShortResult: function(res) {
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

        getURLPara: function(a) {
            return decodeURIComponent((RegExp("[?|&|#]" + a + "=" + "(.*?)(&|#|;|$)").exec(window.location.href) || [null, ""])[1].replace(/\+/g, "%20")) || null
        }
    }

}).call(this, jQuery);
