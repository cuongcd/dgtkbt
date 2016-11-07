var categories = function(url, categoryId){
    this.url = url;
    this.categoryId = categoryId;
    this.fireEvent = true;
    this.init();
}

categories.prototype = {
    init: function(){
        this.initElements();
        this.initTree();
        this.initTreeActions();
        this.initActions();
    },

    initElements: function(){
        this.treeId = '#categories';
        this.formId = '#category';
        this.tabsId = '#category-tabs';
        this.addNewCateogryClass = '.new-category';
        this.addRootClass = 'add-root';
    },

    initTree: function(){
        var obj = this;
        $(obj.treeId).jstree({
            'core' : {
                'multiple' : false,
                'check_callback' : true,
                'data' : {
                    url: obj.url,
                    dataType: 'json'
                }
            },
            'plugins' : [ 'types', 'dnd', 'search'],
            'types' : {
                'default' : {'icon' : 'fa fa-folder'}
            }
        });

        $(obj.treeId).bind('refresh.jstree', function(event, data) { //event after refresh
            obj.fireEvent = true;
        });

        $(obj.treeId).bind('loaded.jstree', function(event, data) { //event after loaded
            obj.fireEvent = false;
            $(obj.treeId).jstree(true).select_node(obj.categoryId);
            obj.fireEvent = true;
        });
    },

    initTreeActions: function(){
        this.onSelectCategory();
        this.onMoveCategory();
        this.onSearch();
    },

    initActions: function(){
        this.onAddNewCategory();
    },

    onSelectCategory: function(){
        var obj = this;
        $(this.treeId).on('select_node.jstree', function (e, data) {
            if (data.selected.length && obj.fireEvent) {
                var url = obj.url +'/'+data.node.id;
                $.ajax({
                    type: 'GET',
                    url: url,
                    beforeSend: function(){
                        toggleLoading();
                    },
                    success: function(response) {
                        toggleLoading();
                        $(obj.tabsId).html(response.html);
                        if(typeof(response.data.errors) != 'undefined'){
                            obj.showMessage('error', response.data.errors[0]);
                        }
                    }
                });
            }
            obj.fireEvent = true;
        });
    },

    onMoveCategory: function(){
        var obj = this;
        $(this.treeId).on('move_node.jstree', function (e, data) {
            if(obj.fireEvent){
                var parentId = data.parent;
                var url = parentId != '#'?obj.url+'/'+data.node.id+'/move/'+parentId:obj.url+'/'+data.node.id+'/move';
                $.ajax({
                    type: 'GET',
                    url: url,
                    beforeSend: function(){
                        toggleLoading();
                    },
                    success: function(response) {
                        toggleLoading();
                        $(obj.treeId).jstree(true).open_node(parentId);
                        $(obj.treeId).jstree(true).refresh();
                    }
                });
            }
        });
    },

    saveCategory: function(){
        var form = $(this.formId);
        var url = form.url;
        var obj = this;
        if(form.valid()){
            $.ajax({
                type: 'POST',
                url: $(obj.formId).attr('action'),
                data: form.serializeArray(),
                beforeSend: function(){
                    toggleLoading();
                },
                success: function(response) {
                    toggleLoading();
                    if(typeof(response.data.errors) != 'undefined'){
                        obj.showMessage('error', response.data.errors[0]);
                    }else{
                        $(obj.tabsId).html(response.html);
                        obj.fireEvent = false;
                        $(obj.treeId).jstree(true).refresh();
                        obj.showMessage('success', obj.messages.saved_success);
                    }
                }
            });
        }
    },

    deleteCategory: function(id){
        var conf = confirm(this.messages.confirm_message);
        if(conf){
            var obj = this;
            var url = this.url+'/'+id+'/delete';
            $.ajax({
                type: 'GET',
                url: url,
                beforeSend: function(){
                    toggleLoading();
                },
                success: function(response) {
                    toggleLoading();
                    if(typeof(response.data.errors) != 'undefined'){
                        obj.showMessage('error', response.data.errors[0]);
                    }else{
                        $(obj.tabsId).html(response.html);
                        obj.fireEvent = false;
                        $(obj.treeId).jstree(true).refresh();
                        obj.showMessage('success', obj.messages.deleted_success);
                    }
                }
            });
        }
    },

    onAddNewCategory: function(){
        var obj = this;
        $(this.addNewCateogryClass).click(function(){
            var url = '';
            if($(this).hasClass(obj.addRootClass))
                url = obj.url+'/new/0';
            else{
                var selectedNode = $(obj.treeId).jstree(true).get_selected()[0];
                url = obj.url+'/new/'+ selectedNode;
            }

            $.ajax({
                type: 'GET',
                url: url,
                beforeSend: function(){
                    toggleLoading();
                },
                success: function(data) {
                    toggleLoading();
                    $(obj.tabsId).html(data);
                    if($(this).hasClass(obj.addRootClass))
                        $(obj.treeId).jstree(true).deselect_all();
                }
            });
        });
    },

    onSearch: function(){
        var to = false;
        var obj = this;
        $(obj.treeId+'_search').keyup(function () {
            if(to) { clearTimeout(to); }
            var search = this;
            to = setTimeout(function () {
                var v = $(search).val();
                $(obj.treeId).jstree(true).search(v);
            }, 250);
        });
    },


    showMessage: function(type, message){
        if(type == 'success')
            var title = this.messages.success;
        else if (type == 'error')
            var title = this.messages.error;

        var html = '<div class="alert alert-'+type+' alert-block">'+
            '<button type="button" class="close" data-dismiss="alert">×</button><h4>'+title+'</h4>'+message+'</div>';

        $('.wrapper.wrapper-content').prepend(html);
    },

    setMessages:function(messages){
        this.messages = messages;
    }

}