/**
 * Product Class
 */
var Product = function (formId, dupUrl, delUrl, delMsg) {
    this.form = $(formId);
    this.dupUrl = dupUrl;
    this.delUrl = delUrl;
    this.delMsg = delMsg;
    this.init();
};

Product.prototype = {
    init: function () {
    },
    saveProduct: function (stay) {
        if (stay) {
            var url = this.form.attr('action');
            this.form.attr('action', url + '?stay=1');
            this.form.submit();
            this.form.attr('action', url);
        } else {
            this.form.submit();
        }
    },
    duplicateProduct: function () {
        window.location.href = this.dupUrl;
    },
    deleteProduct: function () {
        var result = confirm(this.delMsg);
        if (result) {
            window.location.href = this.delUrl;
        }
    }
};

/**
 * Product Attribute Class
 */
var ProductAttribute = function (attributes, attributeEl, existedEl, customEl, template, currency) {
    this.attributes = attributes;
    this.attribute = $(attributeEl);
    this.existed = $(existedEl);
    this.custom = $(customEl);
    this.template = $(template);
    this.currency = currency;
    this.init();
};

ProductAttribute.prototype = {
    init: function () {
    },
    addById: function (attId) {
        var template = this.template.clone();
        // Add existed attribute
        var attribute = this.attributes[attId];
        template.find('input.project-actions').parent().remove();
        var key = template.find('input[type="hidden"]');
        key.attr('name', 'attributes[' + attId + '][key]');
        key.val(attId);
        template.find('label.control-label').html(attribute['name']);
        // Input depend on attribute type
        this.existed.append(template);
        switch (attribute['type']) {
            case 'price':
                var currency = $('<span class="input-group-addon">' + this.currency + '</span>');
                template.find('.input-group').prepend(currency);
                var input = template.find('.input-group input');
                input.attr('name', 'attributes[' + attId + '][value]');
                input.attr('placeholder', '0.00');
                break;
            case 'text':
                var input = template.find('.input-group input');
                input.attr('name', 'attributes[' + attId + '][value]');
                input.attr('placeholder', attribute['name']);
                break;
            case 'textarea':
                template.find('.input-group input').remove();
                var input = $('<textarea class="form-control"></textarea>');
                input.attr('name', 'attributes[' + attId + '][value]');
                input.attr('placeholder', attribute['name']);
                template.find('.input-group').prepend(input);
                break;
            case 'date':
                var input = template.find('.input-group input');
                input.attr('name', 'attributes[' + attId + '][value]');
                input.attr('placeholder', attribute['name']);
                input.attr('data-mask', '99/99/9999');
                input.datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
                break;
            case 'boolean':
                template.find('.input-group input').remove();
                var input = $('<input type="checkbox" value="1">');
                input.attr('name', 'attributes[' + attId + '][value]');
                template.find('.input-group').prepend(input);
                new Switchery(input[0], {color: '#1AB394'});
                break;
            case 'select':
                var input = $('<select class="form-control"></select>');
                input.attr('name', 'attributes[' + attId + '][value]');
            case 'multiselect':
                template.find('.input-group input').remove();
                if (typeof input == 'undefined') {
                    var input = $('<select class="form-control" multiple></select>');
                    input.attr('name', 'attributes[' + attId + '][value][]');
                }
                if (typeof attribute['values'] != 'undefined') {
                    var i, len, value;
                    for (i = 0, len = attribute['values'].length; i < len; i++) {
                        value = attribute['values'][i];
                        input.append($('<option value="' + value + '">' + value + '</option>'));
                    }
                }
                template.find('.input-group').prepend(input);
                input.chosen({disable_search_threshold: 10, width: "100%"});
                break;
        }
    },
    add: function () {
        var attId = this.attribute.val();
        if (attId && attId != '') {
            this.addById(attId);
            this.attribute.find('option[value="' + attId + '"]').attr('disabled', true);
            this.attribute.val('');
            this.attribute.trigger('chosen:updated');
        } else {
            var template = this.template.clone();
            // Add new attribute
            attId = Date.now();
            template.find('input.project-actions').attr('name', 'attributes[' + attId + '][key]');
            template.find('input[type="hidden"]').remove();
            template.find('label.control-label').remove();
            template.find('.input-group input').attr('name', 'attributes[' + attId + '][value]');
            this.custom.append(template);
        }
    },
    remove: function (el) {
        var group = $(el).parents('.form-group');
        // Update for attribute list
        var attId = group.find('input[type="hidden"]').val();
        if (attId) {
            this.attribute.find('option[value="' + attId + '"]').attr('disabled', false);
            this.attribute.trigger('chosen:updated');
        }
        // Remove group
        group.remove();
    }
};

/**
 * Category Class
 */
var ProductCategory = function (data, title) {
    this.data = data;
    this.title = title;
};

ProductCategory.prototype = {
    showTree: function () {
        $.pgwModal({title: this.title, maxWidth: 700, content: '<div id="jstree"></div>'});
        var catJson = this.data;
        var i, len, json;
        for (i = 0, len = catJson.length; i < len; i++) {
            json = catJson[i];
            if ($('#product-categories li.search-choice input[value="' + json.id + '"]').length) {
                json.state = {selected: true};
            }
        }
        $('#jstree').jstree({
            'core': {
                'check_callback': true,
                'data': catJson
            },
            'checkbox': {'keep_selected_style': false, 'three_state': false},
            'plugins': ['checkbox', 'types'],
            'types': {'default': {'icon': 'fa fa-folder'}}
        }).on('select_node.jstree', function (e, data) {
            var template = $('#category-template li.search-choice').clone();
            template.find('input').attr('name', 'category_ids[]');
            template.find('input').val(data.node.id);
            template.find('span').text(data.node.text);
            template.insertBefore($('#product-categories li.select-category'));
        }).on('deselect_node.jstree', function (e, data) {
            $('#product-categories li.search-choice input[value="' + data.node.id + '"]')
                .parents('li.search-choice').remove();
        });
    },
    remove: function (el) {
        $(el).parents('li.search-choice').remove();
    }
};

/**
 * Product Image
 */
var ProductImage = function (url, deleteUrl, deleteMsg) {
    Dropzone.autoDiscover = false;
    var imgDropzone = new Dropzone("div#product-images", {
        url: url,
        maxFilesize: 2,
        acceptedFiles: "image/*",
        thumbnailWidth: 300,
        thumbnailHeight: null,
        resize: function (file) {
            var height = file.height * this.options.thumbnailWidth / file.width;
            return {
                srcX: 0,
                srcY: 0,
                srcWidth: file.width,
                srcHeight: file.height,
                trgWidth: this.options.thumbnailWidth,
                trgHeight: height
            };
        },
        clickable: [$('button.product-images').get(0), $('#product-images .dz-message').get(0)],
        previewTemplate: document.getElementById('preview-template').innerHTML
    });
    imgDropzone.on("addedfile", function (file) {
        if ($('#product-images .dz-preview').length > 1) {
            $(file.previewElement).addClass('thumb-image');
        } else {
            $(file.previewElement).addClass('base-image');
        }
    });
    imgDropzone.without = function (list, rejectedItem) {
        var item, _i, _len, _results;
        _results = [];
        for (_i = 0, _len = list.length; _i < _len; _i++) {
            item = list[_i];
            if (item !== rejectedItem) {
                _results.push(item);
            }
        }
        return _results;
    };
    imgDropzone.removeFile = function (file) {
        var result = confirm(deleteMsg);
        if (result != true || file.status === Dropzone.UPLOADING) {
            return;
        }
        var imgId = $(file.previewElement).find('.img_ids').val();
        if (!imgId) {
            return;
        }
        var url = deleteUrl + imgId.split('==')[0];
        //alert(imgId.split('==')[0]);
        $.ajax({
            url: url
        }).done(function (html) {
            this.files = this.without(this.files, file);
            this.emit("removedfile", file);
            if (this.files.length === 0) {
                return this.emit("reset");
            }
            // Make the first image is base
            $($('#product-images .dz-preview')[0]).removeClass('thumb-image').addClass('base-image');
        }.bind(this)).fail(function (xhr, textStatus) {
            alert(xhr.responseText);
        });
    };
    imgDropzone.on("sending", function (file, xhr, formData) {
        var position = $('#product-images .dz-preview').length;
        if (position === 1) {
            formData.append('type', 1);
        }
        formData.append('position', position);
        formData.append('_token', $('[name="_token"]').val());
    });
    imgDropzone.on("success", function (file, responseText, e) {
        $(file.previewElement).find('.img_ids').val(responseText);
    });
    imgDropzone.on("error", function (file, message, xhr) {
        alert(message);
        imgDropzone.files = imgDropzone.without(imgDropzone.files, file);
        imgDropzone.emit("removedfile", file);
        if (imgDropzone.files.length === 0) {
            imgDropzone.emit("reset");
        }
    });
    document.getElementById('preview-template').innerHTML = "";
    imgDropzone.addExistedFile = function (file) {
        var node, removeFileEvent, _i, _len, _ref;
        this.files.push(file);
        file.status = Dropzone.SUCCESS;
        if (this.element === this.previewsContainer) {
            this.element.classList.add("dz-started");
        }
        file.previewElement = Dropzone.createElement(this.options.previewTemplate.trim());
        file.previewTemplate = file.previewElement;
        this.previewsContainer.appendChild(file.previewElement);
        _ref = file.previewElement.querySelectorAll("[data-dz-name]");
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            node.textContent = file.name;
        }
        removeFileEvent = (function (_this) {
            return function (e) {
                e.preventDefault();
                e.stopPropagation();
                return _this.removeFile(file);
            };
        })(this);
        _ref = file.previewElement.querySelectorAll("[data-dz-remove]");
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            node.addEventListener("click", removeFileEvent);
        }
        file.previewElement.classList.remove("dz-file-preview");
        file.previewElement.classList.add("dz-image-preview");
        _ref = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
//         node.alt = file.name;
            node.src = file.url;
        }
        _ref = file.previewElement.querySelectorAll('input.img_ids');
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            //console.log(file);
            node.value = file.imgid + '==' + file.url;
            //node.value =;
        }
        if ($('#product-images .dz-preview').length > 1) {
            file.previewElement.classList.add("thumb-image");
        } else {
            file.previewElement.classList.add("base-image");
        }
    };
    return imgDropzone;
}

/**
 * Product Inventory Stock
 */
var Stock = function (data, simple) {
    this.data = data;
    this.simple = simple;
};

Stock.prototype = {
    selectWarehouse: function (wId) {
        if (this.simple) {
            this.simpleSelectWH(wId);
        } else {
            this.variantSelectWH(wId);
        }
    },
    simpleSelectWH: function (wId) {
        if (this.data[wId]) {
            $.each(this.data[wId], function (index, value) {
                $('.total_qty input').val(value['total_qty']);
                $('.available_qty input').val(value['available_qty']);
            });
        } else {
            $('.total_qty input').val('0');
            $('.available_qty input').val('0');
        }
    },
    variantSelectWH: function (wId) {
        $('td.total_qty input').val(0);
        $('td.available_qty input').val(0);
        if (this.data[wId]) {
            $.each(this.data[wId], function (index, value) {
                var input = $('#variants input[type="hidden"][value="' + value['variant_id'] + '"]');
                if (input.length) {
                    input.parents('tr').find('td.total_qty input').val(value['total_qty']);
                    input.parents('tr').find('td.available_qty input').val(value['available_qty']);
                }
            });
        }
    }
};

/**
 * Product Variant Class
 */
var Variant = function (attributes, saveOptionUrl, deleteUrl, deleteMsg, optionTitle, variantUrl, variantMsg, variations) {
    this.attributes = attributes;
    this.saveOptionUrl = saveOptionUrl;

    this.deleteUrl = deleteUrl;
    this.deleteMsg = deleteMsg;
    this.optionTitle = optionTitle;

    this.variantUrl = variantUrl;
    this.variantMsg = variantMsg;
    this.variations = variations;
};

Variant.prototype = {
    saveVariationOptions: function (el) {
        var variationIds = [];
        $('#pgwModal .variation-options input[type="hidden"][value]').each(function (index, element) {
            variationIds.push($(element).val());
        });
        var url = this.saveOptionUrl + variationIds.join(',');
        var mask = $('<div class="loading-mask" style="display: block;"></div>');
        mask.append($('#ajax-loading').clone());
        $('#pgwModal .pm-content').append(mask);
        $.ajax({
            url: url
        }).done(function (html) {
            $('#pgwModal .variation-options select').each(function (index, element) {
                var attId = $(element).parents('.form-group').find('input[type="hidden"][value]').val();
                if (!attId || !this.attributes[attId]) {
                    return;
                }
                // Update Columns
                var lastId = this.variations[this.variations.length - 1];
                var template = $('<td class="' + attId + '"><select class="form-control"></select></td>');
                if (typeof this.attributes[attId]['values'] != 'undefined') {
                    $.each(this.attributes[attId]['values'], function (i, val) {
                        template.find('select').append($('<option value="' + val + '">' + val + '</option>'));
                    });
                }
                template.insertAfter($('#variants-row-template td.' + lastId));
                // Body
                $('#variants-container tbody tr').each(function (i, val) {
                    var tmp = template.clone();
                    var pre = $(val).find('td.' + lastId);
                    var preName = pre.find('select').attr('name');
                    tmp.find('select').attr('name', preName.substring(0, preName.lastIndexOf('[') + 1) + attId + ']');
                    tmp.find('select').val($(element).val());
                    tmp.insertAfter(pre);
                });
                // Header
                template = $('<th class="' + attId + '"> ' + this.attributes[attId]['name'] + ' </th>');
                template.insertAfter('#variants-container thead th.' + lastId);
                // Update this.variations
                this.variations.push(attId);
            }.bind(this));
            // Close popup
            $.pgwModal('close');
        }.bind(this)).fail(function (xhr, textStatus) {
            alert(xhr.responseText);
        }).always(function () {
            $('#pgwModal .loading-mask').remove();
        });
    },
    removeVariationValue: function (el) {
        var attId = $(el).parents('.form-group').find('input[type="hidden"]').val();
        var attVal = $(el).parents('li.search-choice').find('span').text();
        // Find all variant
        var selects = $('#variants-container td.' + attId + ' select').filter(function (index, element) {
            return $(element).val() == attVal;
        });
        var result = confirm(this.deleteMsg);
        if (result) {
            if ($(el).parents('ul.chosen-choices').find('li.search-choice').length < 2) {
                var variationIds = this.variations.slice();
                variationIds.pop(attId);
                this.element = $(el).parents('.form-group');
                var url = this.saveOptionUrl + variationIds.join(',');
                var mask = $('<div class="loading-mask" style="display: block;"></div>');
                mask.append($('#ajax-loading').clone());
                $('#pgwModal .pm-content').append(mask);
                $.ajax({
                    url: url
                }).done(function (html) {
                    this.variations.pop(attId);
                    if (this.variations.length < 1) {
                        $.pgwModal('close');
                        location.reload();
                        return;
                    }
                    this.element.remove();
                    // Update Selector
                    var sel = $('#pgwModal .variant-attribute');
                    sel.find('option[value="' + attId + '"]').attr('disabled', false);
                    if (!sel.val()) {
                        sel.val(attId);
                    }
                    sel.trigger('chosen:updated');
                    this.checkAddOptionBtn();
                    // Delete Column
                    $('#variants-row-template .' + attId).remove();
                    $('#variants-container .' + attId).remove();
                }.bind(this)).fail(function (xhr, textStatus) {
                    alert(xhr.responseText);
                }).always(function () {
                    $('#pgwModal .loading-mask').remove();
                });
                return;
            }
            var existedIds = [];
            selects.each(function (index, element) {
                var value = $(element).parents('tr').find('td.action input[type="hidden"]').val();
                if (value) {
                    existedIds.push(value);
                }
            });
            if (existedIds.length) {
                // Delete from server
                var url = this.deleteUrl + existedIds.join(',');
                this.element = $(el).parents('li.search-choice');
                this.selects = selects;
                var mask = $('<div class="loading-mask" style="display: block;"></div>');
                mask.append($('#ajax-loading').clone());
                $('#pgwModal .pm-content').append(mask);
                $.ajax({
                    url: url
                }).done(function (html) {
                    this.selects.each(function (index, element) {
                        $(element).parents('tr').remove();
                    });
                    this.element.remove();
                }.bind(this)).fail(function (xhr, textStatus) {
                    alert(xhr.responseText);
                }).always(function () {
                    $('#pgwModal .loading-mask').remove();
                });
            } else {
                // Delete all local by JS
                selects.each(function (index, element) {
                    $(element).parents('tr').remove();
                });
                $(el).parents('li.search-choice').remove();
            }
        }
    },
    removeAddedVariation: function (el) {
        var group = $(el).parents('.form-group');
        var attId = group.find('input[type="hidden"]').val();
        if (attId) {
            var sel = $('#pgwModal .variant-attribute');
            sel.find('option[value="' + attId + '"]').attr('disabled', false);
            if (!sel.val()) {
                sel.val(attId);
            }
            sel.trigger('chosen:updated');
        }
        group.remove();
        this.checkAddOptionBtn();
    },
    addAnotherOption: function (el) {
        var sel = $(el).parents('.form-group').find('select');
        var attId = sel.val();
        if (attId) {
            var attribute = this.attributes[attId];
            var template = $('#new-option-template .form-group').clone();
            $('#pgwModal .variation-options').append(template);
            template.find('input').val(attId);
            template.find('label').html(attribute['name']);
            template = template.find('select');
            if (typeof attribute['values'] != 'undefined') {
                $.each(attribute['values'], function (index, value) {
                    var opt = $('<option value="' + value + '">' + value + '</option>');
                    this.append(opt);
                }.bind(template));
            }
            template.chosen({disable_search_threshold: 10, width: "100%", allow_single_deselect: true});
            sel.find('option[value="' + attId + '"]').attr('disabled', true);
            if (sel.find('option:enabled[value]').length) {
                sel.val(sel.find('option:enabled[value]').val());
            } else {
                sel.val('');
            }
            sel.trigger('chosen:updated');
            this.checkAddOptionBtn();
        }
    },
    checkAddOptionBtn: function () {
        if ($('#pgwModal .variant-attribute').val()) {
            $('#pgwModal button.add-option').attr('disabled', false);
        } else {
            $('#pgwModal button.add-option').attr('disabled', true);
        }
        if ($('#pgwModal .variation-options select').length) {
            $('#pgwModal button.save-options').attr('disabled', false);
        } else {
            $('#pgwModal button.save-options').attr('disabled', true);
        }
    },
    editVariationOptions: function () {
        $.pgwModal({target: '#variation-options', title: this.optionTitle, maxWidth: 700});
        var i, len, variation, template, chosen;
        var sel = $('#pgwModal .variant-attribute');
        for (i = 0, len = this.variations.length; i < len; i++) {
            variation = this.variations[i];
            template = $('#existed-option-template .form-group').clone();
            $('#pgwModal .variation-options').append(template);
            template.find('input').val(variation);
            if (this.attributes[variation]) {
                template.find('label').html(this.attributes[variation]['name']);
            } else {
                template.find('label').html(variation);
            }
            chosen = [];
            $('#variants-container td.' + variation).each(function (index, value) {
                var variantVal = $(value).find('select').val();
                if (variantVal) {
                    if (this.indexOf(variantVal) == -1) {
                        this.push(variantVal);
                    }
                }
            }.bind(chosen));
            template = template.find('ul.chosen-choices');
            $.each(chosen, function (index, value) {
                var template = $('<li class="search-choice"><span></span><a class="search-choice-close" onclick="variant.removeVariationValue(this);"></a></li>');
                template.find('span').text(value);
                this.append(template);
            }.bind(template));
            sel.find('option[value="' + variation + '"]').attr('disabled', true);
        }
        if (sel.find('option:enabled[value]').length) {
            sel.val(sel.find('option:enabled[value]').val());
        } else {
            sel.val('');
        }
        $('#pgwModal .variant-attribute').chosen({
            disable_search_threshold: 10,
            width: "100%",
            allow_single_deselect: true
        }).change(this.checkAddOptionBtn);
        this.checkAddOptionBtn();
    },
    removeProductVariant: function (el) {
        var input = $(el).prev('input');
        if (input.val()) {
            var result = confirm(this.variantMsg);
            if (result) {
                var url = this.variantUrl + input.val();
                $.ajax({
                    url: url
                }).done(function (html) {
                    var body = $(this).parents('tbody');
                    $(this).parents('tr').remove();
                    if (!body.find('.action input[name]').length) {
                        location.reload();
                    }
                }.bind(el)).fail(function (xhr, textStatus) {
                    alert(xhr.responseText);
                });
            }
        } else {
            $(el).parents('tr').remove();
        }
    },
    showProductVariant: function (config) {
        var template = $('#variants-row-template tr').clone();
        var i, len, variation, sel, variantId;
        if (config['_id']) {
            variantId = config['_id'];
        } else {
            variantId = Date.now();
        }
        for (i = 0, len = this.variations.length; i < len; i++) {
            variation = this.variations[i];
            sel = template.find('.' + variation + ' select');
            sel.val(config[variation]);
            sel.attr('name', 'variants[' + variantId + '][' + variation + ']');
        }
        sel = template.find('td.sku input');
        sel.val(config['sku']);
        sel.attr('name', 'variants[' + variantId + '][sku]');
        sel = template.find('td.price input');
        if (config['price']) {
            sel.val(config['price']);
        }
        sel.attr('name', 'variants[' + variantId + '][price]');

        sel = template.find('td.sale_price input');
        if (config['sale_price']) {
            sel.val(config['sale_price']);
        }
        sel.attr('name', 'variants[' + variantId + '][sale_price]');

        //sel = template.find('td.total_qty input');
        //if (config['total_qty']) {
        //    sel.val(config['total_qty']);
        //}
        sel = template.find('td.total_qty input');
        sel.attr('name', 'variants[' + variantId + '][total_qty]');
        //
        //sel = template.find('td.available_qty input');
        //if (config['available_qty']) {
        //    sel.val(config['available_qty']);
        //}
        sel = template.find('td.available_qty input');
        sel.attr('name', 'variants[' + variantId + '][available_qty]');

        if (config['_id']) {
            sel = template.find('td.action input');
            sel.val(config['_id']);
            sel.attr('name', 'variants[' + variantId + '][_id]');
        }
        $('#variants-container table tbody').append(template);
    }
};

/**
 * Product Variation Class
 */
var Variation = function (attributes, cancelLbl, addVariantLbl, newLbl, newUrl) {
    this.attributes = attributes;

    this.cancelLbl = cancelLbl;
    this.addVariantLbl = addVariantLbl;
    this.newLbl = newLbl;
    this.newUrl = newUrl;
};

Variation.prototype = {
    getMatrixVariants: function (el) {
        if (el.next().length) {
            var sub = this.getMatrixVariants(el.next());
            if (el.find('select').val()) {
                var result = [];
                var pri = el.find('select').val();
                var i, len, row, j, len1, k;
                for (k = 0, i = 0, len = pri.length; i < len; i++) {
                    if (sub.length) {
                        for (j = 0, len1 = sub.length; j < len1; j++) {
                            row = sub[j].slice();
                            row.unshift(pri[i]);
                            result[k++] = row;
                        }
                    } else {
                        result[k++] = [pri[i]];
                    }
                }
                return result;
            } else {
                return sub;
            }
        } else if (el.find('select').val()) {
            var result = [];
            var pri = el.find('select').val();
            var i, len;
            for (i = 0, len = pri.length; i < len; i++) {
                result[i] = [pri[i]];
            }
            return result;
        } else {
            return [];
        }
    },
    reloadVariationTable: function () {
        var variantBody = $('#variant-container table tbody');
        var startEl = $('#variant-custom .form-group').first();
        variantBody.empty();
        var allOptions = this.getMatrixVariants(startEl);
        if (allOptions.length) {
            $('#variant-container').show();
            var i, len, variants, template, el, j, len1, variantHtml, keys, input;
            i = 0;
            keys = [];
            while (startEl.length) {
                if (startEl.find('select').val()) {
                    keys[i++] = startEl.find('input[type="hidden"][name]').val();
                }
                startEl = startEl.next();
            }
            for (i = 0, len = allOptions.length; i < len;) {
                variants = allOptions[i++];
                template = $('#variant-row-template tr').clone();
                el = template.find('td').first();
                el.find('input').attr('name', 'variants[' + i + '][enabled]');
                el = el.next();
                variantHtml = [];
                for (j = 0, len1 = variants.length; j < len1; j++) {
                    variantHtml[j] = '<span class="option-' + j + '">' + variants[j] + '</span>';
                    input = $('<input type="hidden">');
                    input.val(variants[j]);
                    input.attr('name', 'variants[' + i + '][' + keys[j] + ']');
                    el.append(input);
                }
                el.find('span').html(variantHtml.join(' • '));
                el = el.next();
                el.find('input').attr('name', 'variants[' + i + '][sku]');
                el.find('input').val($('#sku').val() + '-' + i);
                el = el.next();
                el.find('input').attr('name', 'variants[' + i + '][price]');

                el = el.next();
                el.find('input').attr('name', 'variants[' + i + '][sale_price]');

                el = el.next();
                el.find('input').attr('name', 'variants[' + i + '][total_qty]');
                variantBody.append(template);
            }
            $('#variant-container .i-checks').iCheck({checkboxClass: 'icheckbox_square-green'});
        } else {
            $('#variant-container').hide();
        }
    },
    toggleVariationOption: function (btn) {
        if ($('#variant-options').css('display') == 'none') {
            $('#variant-options').show();
            $('#variant-options input[name]').attr('disabled', false);
            $(btn).removeClass('btn-primary').addClass('btn-white');
            $(btn).find('i').removeClass('fa-plus');
            $(btn).find('span').text(this.cancelLbl);
        } else {
            $('#variant-options').hide();
            $('#variant-options input[name]').attr('disabled', true);
            $(btn).removeClass('btn-white').addClass('btn-primary');
            $(btn).find('i').addClass('fa-plus');
            $(btn).find('span').text(this.addVariantLbl);
        }
    },
    addVariationOptionById: function (attId) {
        var template = $('#variant-option-element-template .form-group').clone();
        var attribute = this.attributes[attId];
        var key = template.find('input[type="hidden"]');
        key.attr('name', 'variations[]');
        // key.attr('name', 'variations[' + attId + '][key]');
        key.val(attId);
        template.find('label.control-label').html(attribute['name']);
        $('#variant-custom').append(template);
        var input = template.find('select');
        // input.attr('name', 'variations[' + attId + '][value][]');
        var i, len, value;
        if (typeof attribute['values'] != 'undefined') {
            for (i = 0, len = attribute['values'].length; i < len; i++) {
                value = attribute['values'][i];
                input.append($('<option value="' + value + '">' + value + '</option>'));
            }
        }
        input.chosen({disable_search_threshold: 10, width: "100%"}).change(this.reloadVariationTable.bind(this));
    },
    addVariationOption: function (el) {
        var attId = $('#variant-attribute').val();
        if (attId && attId != '') {
            this.addVariationOptionById(attId);
            $('#variant-attribute option[value="' + attId + '"]').attr('disabled', true);
            if ($('#variant-attribute option:enabled[value]').length) {
                $('#variant-attribute').val($('#variant-attribute option:enabled[value]').first().val());
            } else {
                $('#variant-attribute').val('');
            }
            $('#variant-attribute').trigger('chosen:updated');
        } else {
            var result = confirm(this.newLbl);
            if (result) {
                window.open(this.newUrl, '_blank');
            }
        }
    },
    removeVariationOption: function (el) {
        var group = $(el).parents('.form-group');
        var attId = group.find('input[type="hidden"]').val();
        if (attId) {
            $('#variant-attribute option[value="' + attId + '"]').attr('disabled', false);
            if (!$('#variant-attribute').val()) {
                $('#variant-attribute').val(attId);
            }
            $('#variant-attribute').trigger('chosen:updated');
        }
        // Remove group
        group.remove();
        this.reloadVariationTable();
    }
};
