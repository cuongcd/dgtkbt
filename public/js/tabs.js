var tabs = function(keyId){
    this.keyId = keyId;
    this.init();
};

tabs.prototype = {
    init: function () {
        this.initElements();
        this.onClickTab();
        this.showTabWhenInitPage();
    },

    initElements: function(){
        this.tabClass = '#'+this.keyId+' .nav-tabs li a';
    },

    showTabWhenInitPage: function(){
        var tab = this.getUrlParameter('tab');
        $(this.tabClass).each(function( index ) {
            if($(this).attr('href') == '#'+tab && !$(this).hasClass('active')){
                $(this).click();
            }
        });
    },

    showAjaxTab: function(el){
        var obj = this;
        var url = $(el).attr('data-url');
        var contentTabId = $(el).attr('href');
        var contentElement = $(contentTabId).children(':first').children(':last');
        if(url != '' && contentElement.html().length < 100){
            $.ajax({
                url: url,
                beforeSend: function( xhr ) {
                    toggleLoading();
                }
            })
                .done(function(data) {
                    contentElement.html(data);
                    toggleLoading();
                });
        }
    },

    onClickTab: function(){
        var obj = this;
        $(this.tabClass).click(function(){
            obj.showAjaxTab(this);
        })
    },

    getUrlParameter: function (sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }
}