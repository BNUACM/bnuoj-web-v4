$(document).ready(function() {
    var viewRoutes = {
        "^/$"                       : "HomeView",
        "^/problem(/?)$"            : "ProblemListView"
    };

    // find first matching route
    var viewName = _.find(viewRoutes, function(viewName, route) {
        return window.location.pathname.match(route);
    });

    currentView = new window[viewName];
    currentView.start();
});