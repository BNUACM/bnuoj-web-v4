$(document).ready(function() {
    var viewRoutes = {
        "^$"                                : "HomeView",
        "^problem\/list(\/?)$"              : "ProblemListView",
        "^status\/list(\/?)$"               : "StatusListView"
    };

    // find first matching route
    var viewName = _.find(viewRoutes, function(viewName, route) {
        return window.location.pathname.substr(basePath.length).match(route);
    });

    currentView = new window[viewName];
    currentView.start();
});