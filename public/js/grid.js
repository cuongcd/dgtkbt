
var grid = function(keyId, url, gridUrl, inputVars, filter, useAjax){
    this.keyId = keyId;
    this.url = url;
    this.gridUrl = gridUrl;
    this.filter = filter;
    this.inputVars = inputVars;
    this.useAjax = useAjax;
    this.init();
};

grid.prototype = {
    init: function () {
        this.initElements();
        this.initGrid();
        this.onCheckboxClick();
        this.initInputsMode();
        //this.updateRowsInputs();
    },
    initElements: function () {
        this.containerId = '#'+this.keyId+'-grid-content';
        this.container = $(this.containerId);
        this.selectedElementsId = '#'+this.keyId+'_selected_ids';
        this.inputPageId = this.containerId+ ' .input-page';
        this.inputFilterId = this.containerId+' table tr.filter td input, '+this.containerId+' table tr.filter td select';
        this.sortingId = this.containerId+' .sorting_asc,'+this.containerId+' .sorting,'+this.containerId+' .sorting_desc';
        this.searchButtonId = this.containerId+' button.search-button';
        this.resetButtonId = this.containerId+' button.reset-button';
        this.isLoading = false;
        this.selectedElements = [];
        this.checkboxClass = 'element-checkbox';
        this.checkboxes = this.containerId+' tr td input.'+this.checkboxClass;
        this.rows = this.containerId + ' table tbody tr';
        this.rowsInputName = this.rows +' input, '+this.rows+' select';
    },

    initGrid : function(){
        this.onClickToSort();
        this.onInputPage();
        this.onClickSearchButton();
        this.onClickResetButton();
        this.onInputFilter();
        this.onClickRow();
        this.initSelectedElements();
        this.initRows();

    },

    initRows: function(){
        var checkboxClass = this.checkboxClass;
        var obj = this;
        $(document).on('keyup, change', this.rowsInputName, function(){
            if($(this).attr('class') != checkboxClass) {
                var row = $(this).parent('td').parent('tr');
                var checkbox = row.find('input[type=checkbox]');
                var values = obj.getRowInputsValues(row);
                obj.selectedElements[$(checkbox).val()] = $.base64.encode($.param(values));
                $(obj.selectedElementsId).val($.param(obj.selectedElements));
            }
        })
    },

    updateRowsInputs: function (){
        var rows = $(this.rows);
        for(var i = 0; i < rows.length; i++){
            var checkbox = $(rows[i]).find('input[type=checkbox]');
            var id = $(checkbox).val();
            //alert(this.objToString(this.selectedElements));
            if(this.selectedElements.hasOwnProperty(id)){
                var encodedValues = decodeURIComponent(this.selectedElements[id]);
                var values = this.convertParamsToObject($.base64.decode(encodedValues));
                var inputs = $(rows[i]).find('input, select');
                for(var j = 0; j < inputs.length; j++){
                    if($(inputs[j]).attr('class') == this.checkboxClass){
                        $(inputs[j]).prop('checked', true);
                    }else{
                        $(inputs[j]).prop('disabled', false);
                        $(inputs[j]).val(values[$(inputs[j]).attr('name')]);
                    }
                }
            }

        }
    },

    onClickSearchButton: function(){
        var obj = this;
        $(document).on('click', this.searchButtonId, function(){
            var filterVars = obj.getFilterVars();
            var inputVars = obj.addSortAndOrderToInputVars(filterVars);
            obj.inputVars = inputVars;
            obj.loadUrl();
        });
    },

    onClickRow: function(){
        var obj = this;
        $(document).on('click', this.containerId + ' table tr td', function(){
            var tr = $(this).parent();
            if($(this).children('a').length > 0 || $(this).children('select').length > 0 ||
                $(this).children('input').length > 0)
                return;
            if($(this).children('input[type=checkbox]').length > 0){
                var checkbox = $(this).children('input[type=checkbox]').first();
                //if(checkbox.hasClass('element-checkbox'))
                   // obj.setCheckboxChecked(checkbox, $(checkbox).prop('checked'));
                //if(checkbox.hasClass('massaction-checkbox'))
                    //obj.massaction.clickCheckbox(checkbox);
            }else {
                if($(tr).attr('title') != null){
                    window.location = $(tr).attr('title');
                }
            }
        });
    },

    onClickResetButton: function(){
        var obj = this;
        $(document).on('click', this.resetButtonId, function(){
            var inputVars = obj.addSortAndOrderToInputVars({});
            inputVars = obj.addVar(inputVars, 'reset', 1);
            obj.inputVars = inputVars;
            obj.loadUrl();
        });
    },

    onInputPage: function(){
        var obj = this;
        $(document).on('keypress', this.inputPageId, function(event){
            if (event.which == 13) { //enter
                var inputVars = obj.addVar(obj.inputVars, 'page', $(this).val());
                obj.inputVars = inputVars;
                obj.loadUrl();
            }
        });
    },

    onInputFilter: function(){
        var obj = this;
        $(document).on('keypress', this.inputFilterId, function(event){
            if (event.which == 13) { //enter
                var filterVars = obj.getFilterVars();
                var inputVars = obj.addSortAndOrderToInputVars(filterVars);
                if($.isEmptyObject(inputVars['filter']))
                    inputVars = obj.addVar(inputVars, 'reset', 1);

                obj.inputVars = inputVars;
                obj.loadUrl();
            }
        });
    },

    onClickToSort: function(){
        var obj = this;
        $(document).on('click', this.sortingId, function(){
            var inputVars = obj.inputVars;
            inputVars = obj.addVar(inputVars, 'order', $(this).attr('data-name'));
            inputVars = obj.addVar(inputVars, 'dir', $(this).attr('data-dir'));
            obj.inputVars = inputVars;
            obj.loadUrl();
        });
    },

    loadPage: function(pageNumber){
        this.inputVars = this.addVar(this.inputVars, 'page', pageNumber);
        this.loadUrl();
    },

    loadUrl: function(){
        var obj = this;
        if(this.useAjax && !this.isLoading){ //ajax
            $.ajax({
                url: obj.getUrlWithParams(),
                beforeSend: function( xhr ) {
                    toggleLoading();
                    obj.isLoading = true;
                }
            })
            .done(function(data) {
                obj.container.html(data);
                toggleLoading();
                obj.massaction.checkCheckboxesAfterLoadedAjax();
                obj.isLoading = false;
                obj.initInputsMode();
                obj.initRows();
                obj.updateRowsInputs();
            });
        }else{
            window.location = obj.getUrlWithParams();
        }
    },

    getUrlWithParams : function(){
        var paramsString = this.serialize(this.inputVars);
        var url = this.useAjax?this.gridUrl:this.url;
        if(this.useAjax)
            return (paramsString.length > 0)?this.gridUrl+'/'+$.base64.encode(paramsString):this.gridUrl+'/false';
        else
            return (paramsString.length > 0)?this.url+'/'+this.filter+'/'+$.base64.encode(paramsString):this.url;
    },

    serialize: function(obj, prefix) {
        var str = [];
        for(var p in obj) {
            if (obj.hasOwnProperty(p)) {
                var k = prefix ? prefix + '[' + p + ']' : p, v = obj[p];
                str.push(typeof v == 'object' ?
                    this.serialize(v, k) :
                encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        }
        return str.join('&');
    },


    addSortAndOrderToInputVars: function(inputVars){
        if(this.checkInputExist(this.inputVars, 'order'))
            inputVars = this.addVar(inputVars, 'order', this.inputVars['order']);
        if(this.checkInputExist(this.inputVars, 'dir'))
            inputVars = this.addVar(inputVars, 'dir', this.inputVars['dir']);
        return inputVars;
    },

    checkInputExist: function(vars, attr){
        if(typeof(vars[attr]) == 'function' || typeof(vars[attr]) == 'undefined')
            return false;
        return true;
    },

    addVar: function (vars, varName, varValue){
        vars[varName] = varValue;
        return vars;
    },

    checkCheckboxes: function(element){
        var elements = $(this.containerId + ' input[name="' + $(element).attr('name')+'"]');
        for(var i = 1; i < elements.length ; i++){
            this.setCheckboxChecked(elements[i], $(element).prop('checked'));
        }
    },

    initSelectedElements:function(){
        if($(this.selectedElementsId).length > 0){
            var selectedElementsString = $(this.selectedElementsId).val();
            this.selectedElements = (selectedElementsString.length > 0)?this.convertParamsToObject(selectedElementsString):{};
        }
    },

    setCheckboxChecked : function(element, checked){
        var row = $(element).parent('td').parent('tr');
        var values = this.getRowInputsValues(row);
        if(checked)
            this.selectedElements[$(element).val()] = $.base64.encode($.param(values));
        else
            delete this.selectedElements[$(element).val()];

        $(this.selectedElementsId).val($.param(this.selectedElements));
        $(element).prop('checked', checked);
        this.changeInputsMode(element);
    },

    convertParamsToObject: function(params){
        var obj = {};
        var hashes = params.split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            obj[hash[0]] = hash[1];
        }
        return obj;
    },

    getSelectedIds: function(){
        var ids = [];
        for(var key in this.selectedElements) {
            ids.push(key);
        }
        return ids.join(',');
    },

    getRowInputsValues: function(row){
        var inputs = $(row).find('input, select');
        var values = {};
        for(var i = 0; i < inputs.length; i++){
            if($(inputs[i]).attr('class') != this.checkboxClass){
                values[$(inputs[i]).attr('name')] = $(inputs[i]).val();
            }
        }
        //alert(this.objToString(values));
        return values;
    },

    onCheckboxClick: function() {
        var obj = this;
        $(document).on('click', this.checkboxes, function(){
            obj.setCheckboxChecked(this, $(this).prop('checked'));

        });
    },

    initInputsMode: function(){
        for(var i = 0; i < $(this.checkboxes).length; i++){
            this.changeInputsMode($(this.checkboxes)[i]);
        }
    },

    changeInputsMode: function(element){
        var tr = $(element).parent('td').parent('tr');
        var inputs = tr.find('input, select');
        for(var i = 0; i < inputs.length; i++){
            if($(inputs[i]).attr('class') != this.checkboxClass){
                $(inputs[i]).prop('disabled', !$(element).prop('checked'));
            }
        }
    },

    getRowInputs: function(element){

        //alert(inputs);
    },

    getFilterVars: function(){
        var filterVars = {'filter':{}};
        $(this.inputFilterId).each(function() {
            if($(this).val() && $(this).val().length) {
                if($(this).is('input')){
                    if($(this).attr('name').indexOf('[') == -1 && $(this).attr('name').indexOf(']') == -1){
                        filterVars['filter'][$(this).attr('name')] = {};
                        filterVars['filter'][$(this).attr('name')]['like'] = $(this).val();
                    }else{
                        if($(this).attr('name').indexOf('[from]') > -1){
                            var attr = $(this).attr('name').replace('[from]', '');
                            if (typeof(filterVars['filter'][attr]) != "object")
                                filterVars['filter'][attr] = {};
                            filterVars['filter'][attr]['from'] = $(this).val();
                        }else if($(this).attr('name').indexOf('[to]') > -1){
                            var attr = $(this).attr('name').replace('[to]', '');
                            if (typeof(filterVars['filter'][attr]) != "object")
                                filterVars['filter'][attr] = {};
                            filterVars['filter'][attr]['to'] = $(this).val();
                        }
                    }
                }
                else
                    filterVars['filter'][$(this).attr('name')] = $(this).val();
            }
        });
        if($(this.selectedElementsId).length){
            filterVars['selected_ids'] = this.getSelectedIds();
        }

        if(this.massaction.getCheckedIds().length){
            filterVars['selected_ids'] = this.massaction.getCheckedIds().join(',');
        }
        return filterVars;
    },

    objToString: function (obj) {
        var str = '';
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str += p + '::' + obj[p] + '\n';
            }
        }
        return str;
    }

}

var gridMassaction = function(keyId, grid, errorText){
    this.keyId = keyId;
    this.grid = grid;
    this.errorText = errorText;
    this.init();
};

gridMassaction.prototype = {
    init: function () {
        this.grid.massaction = this;
        this.checkedIds = [];
        this.initMassactionElements();
        this.onSelectChange();
        this.onCheckboxClick();
        this.form.validate();
    },

    initMassactionElements: function () {
        this.form = $('#'+this.keyId + '-massaction-form');
        this.totalId = '#'+this.keyId + '-massaction-total';
        this.selectId = '#'+this.keyId + '-massaction-select';
        this.select = $(this.selectId);
        this.itemBlocks = $('.'+this.keyId+'-massaction-block');
        this.checkboxes = 'tr td input.massaction-checkbox';
        this.checkedIdsInHtmlId = '#'+this.keyId+'-massaction-selected-ids';
    },

    setActionItems: function (items) {
        this.items = items;
    },

    getActionItem: function(key) {
        var items = $.map(this.items, function(obj, keyName) {
            if(keyName === key)
                return obj;
        });
        return items[0];
    },

    getItemBlock: function(key) {
        return $('#'+this.keyId+'-massaction-'+key+'-block');
    },

    onSelectChange: function () {
        var obj = this;
        $(document).on('change', this.selectId, function(){
            var actionKey = $(this).val();
            if(actionKey != ''){
                var actionItem = obj.getActionItem(actionKey);
                obj.form.attr('action', actionItem.url);
            }
            for(var key in obj.items) {
                if(key == actionKey)
                    obj.getItemBlock(key).show();
                else
                    obj.getItemBlock(key).hide();
            }
        });
    },

    setGridIds: function(gridIds) {
        this.gridIds = gridIds;
    },
    getGridIds: function() {
        return this.gridIds;
    },

    setCheckedIds: function(checkedIds) {
        this.checkedIds = checkedIds;
    },

    getCheckedIds: function() {
        return this.checkedIds;
    },

    updateTotal: function() {
        $(this.totalId).html(this.checkedIds.length);
        $(this.checkedIdsInHtmlId).val(this.checkedIds.join(','));
    },

    getCheckboxes: function() {
        return $(this.checkboxes);
    },

    checkCheckboxes: function() {
        this.getCheckboxes().each(function() {
            $(this).prop('checked', true);
        });
    },

    onCheckboxClick: function() {
        var obj = this;
        $(document).on('click', this.checkboxes, function(){
            obj.clickCheckbox(this);
        });
    },

    clickCheckbox: function(el){
        var checkedIds = this.getCheckedIds();
        var checkboxVal = $(el).val();
        if($(el).is(':checked')){
            checkedIds.push(checkboxVal);
        }else{
            checkedIds = $.grep(checkedIds, function (value, index) {
                return value != checkboxVal;
            });
        }
        this.setCheckedIds(checkedIds);
        this.updateTotal();
    },

    objToString: function (obj) {
        var str = '';
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str += p + '::' + obj[p] + '\n';
            }
        }
        return str;
    },

    getCheckboxesValues: function() {
        var result = [];
        this.getCheckboxes().each(function() {
            result.push($(this).val());
        });
        return result;
    },

    uncheckCheckboxes: function() {
        this.getCheckboxes().each(function() {
            $(this).prop('checked', false);
        });
    },

    selectAll: function(){
        this.checkCheckboxes();
        this.setCheckedIds(this.getGridIds());
        this.updateTotal();
        return false;
    },

    unselectAll: function(){
        this.uncheckCheckboxes();
        this.setCheckedIds([]);
        this.updateTotal();
        return false;
    },

    selectVisible: function(){
        this.checkCheckboxes();
        this.setCheckedIds(this.getCheckboxesValues());
        this.updateTotal();
        return false;
    },

    unselectVisible: function(){
        this.uncheckCheckboxes();
        var checkboxesValues = this.getCheckboxesValues();
        var checkedIds = this.getCheckedIds();
        $.each(checkboxesValues, function(index, value){
            $.each(checkedIds, function(index1, value1) {
                if (value == value1) {
                    checkedIds.splice(index1, 1);
                }
            });
        });
        this.setCheckedIds(checkedIds);
        this.updateTotal();
        return false;
    },

    checkActionConfirm: function() {
        var actionKey = this.select.val();
        //alert(actionKey);
        var actionItem = this.getActionItem(actionKey);
        if(actionItem.confirm != null || actionItem.confirm != 'undefined')
            return confirm(actionItem.confirm);
        return true;
    },

    checkCheckboxesAfterLoadedAjax: function(){
        var obj = this;
        obj.getCheckboxes().each(function() {
            if($.inArray( $(this).val(), obj.getCheckedIds()) > -1)
                $(this).prop('checked', true);
            obj.updateTotal();
        });
    },

    apply: function() {
        var checkedIds = this.getCheckedIds();
        if(checkedIds.length == 0) {
            alert(this.errorText);
            return;
        }
        this.form.append('<input name="'+this.keyId+'" type="hidden" value="'+checkedIds.join(',')+'" />');
        if(this.form.valid())
            if(this.checkActionConfirm())
                this.form.submit();
    }
}