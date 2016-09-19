// Check instance
if (typeof dist == "undefined" || !dist) {
    var dist = {};
}

dist.Project = function () {
    this.init();
};

// Declare project prototype
dist.Project.prototype = {

    ie8: (document.all && document.querySelector && ! document.addEventListener) ? true : false,

    init: function () {
        jQuery(document).ready(jQuery.proxy(this, 'onDocumentReady'));
        jQuery(window).load(jQuery.proxy(this, 'onWindowLoad'));
    },

    onDocumentReady: function () {

    },

    onWindowLoad: function () {
        //
    }

};

// Run instance
var app = new dist.Project();