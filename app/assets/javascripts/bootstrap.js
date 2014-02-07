$(document).ready(function() {
    var viewRoutes = {
        "^/$": "HomeView"
    };

    _.each(viewRoutes, function(viewName, route) {
        if (window.location.pathname.match(route)) {
            window.currentView = new window[viewName];
        }
    });

    currentView.start();
});