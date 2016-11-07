
$.validator.prototype.checkForm = function () {
    //override check form in validate
    this.prepareForm();
    for (var i = 0, elements = (this.currentElements = this.elements()); elements[i]; i++) {
        if (this.findByName(elements[i].name).length != undefined && this.findByName(elements[i].name).length > 1) {
            for (var cnt = 0; cnt < this.findByName(elements[i].name).length; cnt++) {
                if(!$(this.findByName(elements[i].name)[cnt]).is(':disabled'))
                    this.check(this.findByName(elements[i].name)[cnt]);
            }
        } else {
            this.check(elements[i]);
        }
    }
    return this.valid();
}

var form = function(keyId, countryStates){
    this.keyId = '#'+keyId;
    this.countryStates = countryStates;
    this.init();
};

form.prototype = {
    init: function(){
        this.initElements();
        this.initCountryStates();
        this.onChangeCountry();        

        var obj = this;
        this.validator = $(this.keyId).validate({
            ignore: ".grid-filter",
            invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var el = validator.errorList[0].element;
                    var tab = $(el).parents('.tab-pane');
                    var tabId = $(tab).attr('id');
                    $(obj.tab).each(function( index ) {
                        if($(this).attr('href') == '#'+tabId && !$(this).hasClass('active')){
                            $(this).click();
                        }
                    });
                }
            }
        });
    },
    
    initCountryStates: function() {
        this.stateValues = [];
        this.contryValues = [];
        this.stateElements = $(this.stateId);
        this.countryElements = $(this.countryId);
        
        for(var i=0; i < this.stateElements.length; i++){
            this.stateValues[i] = $(this.stateElements[i]).val();
        }
        
        for(var i=0; i < this.countryElements.length; i++){
            this.contryValues[i] = $(this.countryElements[i]).val();
            this.updateState(i);
        }        
    },

    initElements: function(){
        this.countryId = this.keyId + ' .country';
        this.stateId = this.keyId + ' .state';
        this.activeTab = this.keyId + ' ul.nav.nav-tabs li.active a';
        this.tab = this.keyId + ' ul.nav.nav-tabs li a';
        this.requiredEl = '<span class="required">*</span>';

    },

    getCountry: function() {
        return this.countryValue;
    },

    submit : function(){
        if($(this.keyId).valid())
            $(this.keyId).submit();
        else
            this.validator.focusInvalid();
    },

    saveAndContinueEdit: function(){
        var submitUrl = $(this.keyId).attr('action');
        var activeTabId = $(this.activeTab).attr('href');
        var form = $(this.keyId);
        submitUrl += ((submitUrl.indexOf('?') == -1) ? '?' : '&');
        submitUrl += 'tab='+activeTabId.replace('#','');
        form.attr('action', submitUrl);
        if(form.valid())
            form.submit();
    },

    confirm: function(confirmUrl){
        var activeTabId = $(this.activeTab).attr('href');
        var form = $(this.keyId);
        confirmUrl += '?tab='+activeTabId.replace('#','');
        form.attr('action', confirmUrl);
        if(form.valid())
            form.submit();
    },

    setCountryStates: function(countryStates){
        this.countryStates = countryStates;
    },

    onChangeCountry: function(){
        var obj = this;
        for(var i=0; i<this.countryElements.length; i++){
            $(this.countryElements[i]).attr('field_id',i);
            $(this.countryElements[i]).change(function() {
                obj.updateState($(this).attr('field_id'));
            });
        }
    },

    updateState: function(countryFieldIndex){
        var contryElement = $($(this.countryId)[countryFieldIndex]);
        var stateElement = $($(this.stateId)[countryFieldIndex]);
        var countryValue = contryElement.val();
        var stateLabel = stateElement.parent().prev();
        var stateLabelHtml = stateLabel.html();

        if(this.countryStates.hasOwnProperty(countryValue)){
            var selectedStates = this.countryStates[countryValue];
            var options = '<option></option>';
            var obj = this;
            $.each(selectedStates, function(key, val) {
                if(obj.stateValues[countryFieldIndex] == key){
                    options += '<option value="'+key+'" selected>'+val+'</option>';
                } else {
                    options += '<option value="'+key+'">'+val+'</option>';
                }
            });

            var selectStateEl = $('<select/>', {
                id: stateElement.attr('id'),
                class: stateElement.attr('class'),
                name: stateElement.attr('name'),
                required: 'required'
            }).html(options);
            stateElement.parent().html(selectStateEl);
            if (stateLabelHtml.indexOf(this.requiredEl) < 0)
                stateLabel.html(stateLabelHtml+this.requiredEl);
        }else{
            var inputStateEl = $('<input/>', {
                id: stateElement.attr('id'),
                class: stateElement.attr('class'),
                name: stateElement.attr('name')
            });

            stateElement.parent().html(inputStateEl);
            if (stateLabelHtml.indexOf(this.requiredEl) >= 0)
                stateLabel.html(stateLabelHtml.replace(this.requiredEl, ''));
        }

        this.stateValues[countryFieldIndex] = '';
    }
}