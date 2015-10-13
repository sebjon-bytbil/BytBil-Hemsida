/* globals wpcf7forms */
(function($) {
    "use strict";
    function UMForm(id) {
        // Set default variables
        this._facilityForm = false;
        this._footerForm = false;
        this._facilityLock = false;
        this._brands = null;
        this._brandsChanged = false;
        this._brandsConstants = null;
        this._brandsPreset = false;
        this._brandsUpdatedFromDepartment = false;
        this._models = null;
        this._modelsConstants = null;
        this._modelsPreset = false;
        this._facilities = null;
        this._facilitiesChanged = false;
        this._facilitiesConstants = null;
        this._facilitiesPreset = false;
        this._departments = null;
        this._departmentsConstants = null;
        this._departmentsChanged = false;

        // Initialize
        this.init(id);
    }

    UMForm.prototype.init = function(id) {
        var brand,
            $this;
        this._id = id;
        this._form = $('#' + id);
        this._formId = '#' + id;
        // If the form doesn't have the class "um-form", do no more
        if (this._form.find('.um-form').length < 1){
            return false;
        }

        if (this._form.find('#facility-form').length > 0) {
            this._facilityForm = true;
        }

        if (this._form.find('#footer-form').length > 0){
            this._footerForm = true;
        }

        if (this._facilityForm === true) {
            this.initAjaxForm(true);
        } else if (this._footerForm === true) {
            this.initAjaxForm(false);
        } else {

            this.saveBrands();
            this.saveModels();
            this.saveFacilities();
            // Eventuellt spara avdelningar också?
            // Om de vill ha samma koppling mellan anläggning och avdelning
            // som märke och anläggning
            // Jag förbereder iaf ^^
            this.saveDepartments();
            this.bindFlip();

            if (this._brandsConstants !== null){
                this.handleBrandsConstants();
            }

            if (this._facilitiesConstants !== null){
                this.handleFacilitiesConstants();
            }

            if (this._departmentsConstants !== null){
                this.handleDepartmentsConstants();
            }

            if (this._modelsConstants !== null){
                this.handleModelsConstants();
            }

            if ($(this._formId + ' .um-form-brand > option').length > 1) {
                this.brandOnChange();
                this.facilityOnChange();
                if (this._brandsPreset === true) {
                    this.populateModels();

                    if ($(this._formId + ' .um-form-brand > option:enabled').length === 1) {
                        brand = $(this._formId + ' .um-form-brand > option:selected').attr('value');

                        $(this._formId + ' .um-form-facility > option').each(function() {
                            $this = $(this);
                            if ($this.data('brand').indexOf(brand) === -1) {
                                $this.attr('disabled', 'disabled');
                            }
                        });
                    }

                    this.refreshSelectpicker(this._formId);
                } else if (this._facilitiesPreset === true) {
                    brand = $(this._formId + ' .um-form-facility > option:selected').data('brand');

                    $(this._formId + ' .um-form-brand > option').each(function() {
                        $this = $(this);
                        if ($this.val().indexOf(brand) === -1){
                            $this.attr('disabled', 'disabled');
                        }
                    });

                    this.refreshSelectpicker(this._formId);
                } else {
                    if (this._modelsConstants !== null) {
                        that.resetModels();
                        var allModels = [];
                        var chosenModels = [];
                        $(that._formId + ' .um-form-model > option').each(function() {
                            $this = $(this);
                            if (that._modelsConstants !== null) {
                                var mcHit = false;
                                var bHit = false;

                                if (that._modelsConstants.indexOf($this.val()) >= 0){
                                    mcHit = true;
                                }

                                if ($this.data('brand') === brand){
                                    bHit = true;
                                }

                                var option = {
                                    'el': this,
                                    'mcHit': mcHit,
                                    'bHit': bHit
                                };

                                if (mcHit === true && bHit === true) {
                                    chosenModels.push(option);
                                }

                                allModels.push(option);
                            } else {
                                if ($this.data('brand') !== brand){
                                    $this.prop('disabled', 'disabled');
                                }
                            }
                        });

                        $(that._formId + ' select.um-form-model').find('option').prop('disabled', 'disabled');
                        if (chosenModels.length > 0) {
                            chosenModels.forEach(function(e) {
                                $(that._formId + ' select.um-form-model').append($(e.el));
                            });
                        } else if (allModels.length > 0) {
                            allModels.forEach(function(e) {
                                if (e.bHit === true){
                                    $(that._formId + ' select.um-form-model').append($(e.el));
                                }
                            });
                        }
                    } else {
                        this.clearModels();
                    }
                }
            } else {
                brand = $(this._formId + ' .um-form-brand > option').attr('value');
                var that = this;

                $(this._formId + ' .um-form-model > option').each(function() {
                    $this = $(this);
                    if ($this.data('brand') !== brand){
                        $this.prop('disabled', 'disabled');
                    }

                    $(that._formId + ' .um-form-facility > option').each(function() {
                        $this = $(this);
                        if ($this.data('brand').indexOf(brand) === -1){
                            $this.attr('disabled', 'disabled');
                        }
                    });
                });

                this.refreshSelectpicker(this._formId);
            }
        }
    };

    UMForm.prototype.initAjaxForm = function(locked) {
        var self = this;

        this._form.on('change', '.um-form-department', function() {
            var $this = $(this);
            var value = $this.find('option:selected').attr('value');
            var facility = self._form.find('.um-form-facility option:selected').attr('value');
            var brand = self._form.find('.um-form-brand option:selected').attr('value');

            self.ajaxGet('get_footer_options', 'department', value, facility, brand);
        });

        if (locked === false) {
            this._form.on('change', '.um-form-facility', function() {
                var $this = $(this);
                var value = $this.find('option:selected').attr('value');
                var department = self._form.find('.um-form-department option:selected').attr('value');
                var brand = self._form.find('.um-form-department option:selected').attr('value');

                self.ajaxGet('get_footer_options', 'facility', department, value, brand);
            });
        } else {
            this.saveModels();
            this.lockFacility();
            this.bindBrand();
            this.disableAllModels();
            this.disableDepartments();
        }
    };

    UMForm.prototype.lockFacility = function() {
        var self = this, facilities;

        if (typeof wpcf7forms[this._id]['facilities'] !== 'undefined') {
            facilities = wpcf7forms[this._id]['facilities'];
            if (facilities.length > 1) {
                return;
            }

            $(this._formId + ' .um-form-facility > option').each(function() {
                if ($(this).val().indexOf(facilities) >= 0) {
                    $(this).prop('selected', 'selected');
                    self._facilityLock = true;
                } else {
                    $(this).prop('disabled', 'disabled');
                }
            });
        }
    };

    UMForm.prototype.disableDepartments = function() {
        var facility = $(this._formId + ' select.um-form-facility > option:selected').val();

        $(this._formId + ' select.um-form-department > option').each(function() {
            var value = $(this).val();

            if (value === '0') {
                return;
            }

            if ($(this).data('facilities').indexOf(facility) === -1) {
                $(this).prop('disabled', 'disabled');
            }
        });
    };

    UMForm.prototype.bindBrand = function() {
        var self = this;

        this._form.on('change', '.um-form-brand', function() {
            var brand = $(this).find('option:selected').attr('value').toString();

            self.resetModels();
            self.handleAjaxModels(brand);
            self.refreshSelectpicker(self._formId);

        });
    };

    UMForm.prototype.handleAjaxModels = function(brand) {
        var self = this;
        if (brand === 0) {
            this.disableAllModels();
        } else {
            $(self._formId + ' select.um-form-model > option').each(function() {
                var $this = $(this);
                var modelBrand = $this.data('brand').toString();
                if (modelBrand !== brand) {
                    $this.prop('disabled', 'disabled');
                } else {
                    $this.removeAttr('disabled');
                }
            });
        }
    };

    UMForm.prototype.disableAllModels = function() {
        $(this._formId + ' select.um-form-model > option').each(function() {
            if ($(this).val() === '0') {
                $(this).removeAttr('disabled');
                $(this).prop('selected', 'selected');
                return;
            }
            $(this).prop('disabled', 'disabled');
        });
    };

    UMForm.prototype.ajaxGet = function(action, select, department, facility, brand) {
        if (this._facilityForm === true) {
            this.toggleSpinner(true, '-brand');
        } else {
            this.toggleSpinner(true, '');
        }
        var self = this;

        $.get(
            '/wp-admin/admin-ajax.php',
            {
                action: action,
                brand: brand,
                department: department,
                facility: facility,
                select: select
            }, function(response) {
                var json = $.parseJSON(response);
                switch (select) {
                    case 'department':
                        if (self._facilityLock === false) {
                            self.updateFooterOptions('facility', json.facilities);
                        } else {
                            if (json.brands === '[]') {
                                brand = '0';
                            }
                            brand = 0;
                            self.handleAjaxModels(brand);
                        }
                        self.updateFooterOptions('brand', json.brands);
                        break;
                    case 'facility':
                        self.updateFooterOptions('department', json.departments);
                        self.updateFooterOptions('brand', json.brands);
                        break;
                }
            }
        );
    };

    UMForm.prototype.updateFooterOptions = function(select, options) {
        var selected = $(this._formId + ' .um-form-' + select + ' > option:selected');
        if (options.indexOf(selected.val()) === -1){
            selected.removeAttr('selected');
        }

        $(this._formId + ' .um-form-' + select + ' > option').each(function() {
            var value = $(this).val();

            if (value === '0'){
                $(this).removeAttr('disabled');
                return;
            }

            if (options.indexOf(value) === -1){
                $(this).attr('disabled', 'disabled');
            }
            else{
                $(this).removeAttr('disabled', 'disabled');
            }
        });

        this.refreshSelectpicker(this._formId);
        if (this._facilityForm === true) {
            this.toggleSpinner(false, '-brand');
        } else {
            this.toggleSpinner(false, '');
        }
    };

    UMForm.prototype.toggleSpinner = function(bool, extra) {
        var spinner = $(this._formId + ' .loading-spinner' + extra);
        if (bool) {
            if (!spinner.hasClass('spinning')){
                spinner.addClass('spinning');
            }
        } else {
            if (spinner.hasClass('spinning')){
                spinner.removeClass('spinning');
            }
        }
    };

    // Save brands
    UMForm.prototype.saveBrands = function() {
        var that = this;
        if (typeof wpcf7forms[this._id]['brands'] !== 'undefined'){
            this._brandsConstants = wpcf7forms[this._id]['brands'];
        }

        var brands = [];
        $(this._formId + ' .um-form-brand > option').each(function() {
            if (that._brandsConstants !== null && that._brandsPreset === false) {
                if ($(this).val() === 0) {
                    $(this).prop('selected', 'selected');
                    that._brandsPreset = true;
                }
                if (that._brandsConstants.indexOf($(this).val()) > -1) {
                    $(this).prop('selected', 'selected');
                    that._brandsPreset = true;
                }
            }
            brands.push(this);
        });
        this._brands = brands;
    };

    // Save models
    UMForm.prototype.saveModels = function() {
        var that = this;
        if (typeof wpcf7forms[this._id]['models'] !== 'undefined'){
            this._modelsConstants = wpcf7forms[this._id]['models'];
        }

        var models = [];
        $(this._formId + ' .um-form-model > option').each(function() {
            if (that._modelsConstants !== null) {
                if (that._modelsConstants.indexOf($(this).val()) > -1) {
                    $(this).attr('data-constant', 'true');
                    that._modelsPreset = true;
                }
            }
            models.push(this);
        });
        this._models = models;
    };

    // Save facilities
    UMForm.prototype.saveFacilities = function() {
        var that = this;
        if (typeof wpcf7forms[this._id]['facilities'] !== 'undefined'){
            this._facilitiesConstants = wpcf7forms[this._id]['facilities'];
        }

        var facilities = [];
        $(this._formId + ' .um-form-facility > option').each(function() {
            if (that._facilitiesConstants !== null && that._facilitiesPreset === false) {
                if ($(this).val().indexOf(that._facilitiesConstants) === 0) {
                    $(this).prop('selected', 'selected');
                    that._facilitiesPreset = true;
                }
            }
            facilities.push(this);
        });

        this._facilities = facilities;
    };

    // Save departments
    UMForm.prototype.saveDepartments = function() {
        var that = this;
        if (typeof wpcf7forms[this._id]['departments'] !== 'undefined'){
            this._departmentsConstants = wpcf7forms[this._id]['departments'];
        }

        var departments = [];
        var selected = false;
        $(this._formId + ' .um-form-department > option').each(function() {
            if (that._departmentsConstants !== null && selected === false) {
                if ($(this).val().indexOf(that._departmentsConstants) === 0) {
                    $(this).prop('selected', 'selected');
                    selected = true;
                }
            }
            departments.push(this);
        });
        this._departments = departments;
    };

    UMForm.prototype.populateModels = function() {
        var that = this;
        var brand = $(this._formId + ' .um-form-brand').val();
        this._models.forEach(function(el) {
            if ($(el).val() === '0'){
                return;
            }

            if (that._modelsConstants !== null) {
                if (that._modelsConstants.indexOf($(el).val()) === -1) {
                    $(el).prop('disabled', 'disabled');
                } else if ($(el).attr('data-brand') !== brand) {
                    $(el).prop('disabled', 'disabled');
                }
            } else {
                if ($(el).data('brand') !== brand) {
                    $(el).prop('disabled', 'disabled');
                }
            }
        });

        if ($(this._formId + ' .um-form-model > option:enabled').length === 2) {
            $(this._formId + ' .um-form-model > option:enabled').each(function(i, e) {
                if (i > 0){
                    $(e).prop('selected', 'selected');
                }
                else{
                    $(e).prop('disabled', 'disabled');
                }
            });
        }
    };

    UMForm.prototype.handleBrandsConstants = function() {
        var that = this;
        var i = 0;
        $(this._formId + ' .um-form-brand > option').each(function() {
            var innerHTML = this.innerHTML;
            var $element = $(this);
            ++i;

            if ($element.val() === 0){
                return;
            }

            if (that._brandsConstants.indexOf(innerHTML) === -1){
                $element.prop('disabled', 'disabled');
            }

            $element.attr('data-constant', 'true');
        });

        if ($(this._formId + ' .um-form-brand > option:enabled').length === 2) {
            $(this._formId + ' .um-form-brand > option:enabled').each(function(i, e) {
                if (i > 0){
                    $(e).prop('selected', 'selected');
                }
                else{
                    $(e).prop('disabled', 'disabled');
                }
            });
        }
    };

    UMForm.prototype.handleFacilitiesConstants = function() {
        var that = this;
        var i = 0;
        $(this._formId + ' .um-form-facility > option').each(function() {
            var innerHTML = this.innerHTML;
            var $element = $(this);
            ++i;

            if ($element.val() === 0){
                return;
            }

            if (that._facilitiesConstants.indexOf(innerHTML) === -1){
                $element.prop('disabled', 'disabled');
            }

            $element.attr('data-constant', 'true');
        });

        if ($(this._formId + ' .um-form-facility > option:enabled').length === 2) {
            $(this._formId + ' .um-form-facility > option:enabled').each(function(i, e) {
                if (i > 0){
                    $(e).prop('selected', 'selected');
                }
                else{
                    $(e).prop('disabled', 'disabled');
                }
            });
        }
    };

    UMForm.prototype.handleDepartmentsConstants = function() {
        var that = this;
        $(this._formId + ' .um-form-department > option').each(function() {
            var innerHTML = this.innerHTML;
            var $element = $(this);

            if (that._departmentsConstants.indexOf(innerHTML) === -1){
                $element.prop('disabled', 'disabled');
            }

            $element.attr('data-constant', 'true');
        });
    };

    UMForm.prototype.handleModelsConstants = function() {
        var that = this;
        var i = 0;
        $(this._formId + ' .um-form-model > option').each(function() {
            var innerHTML = this.innerHTML;
            var $element = $(this);
            ++i;

            if ($element.val() === 0){
                return;
            }

            if (that._modelsConstants.indexOf(innerHTML) === -1){
                $element.prop('disabled', 'disabled');
            }

            $element.attr('data-constant', 'true');
        });

        if ($(this._formId + ' .um-form-model > option:enabled').length === 2) {
            $(this._formId + ' .um-form-model > option:enabled').each(function(i, e) {
                if (i > 0){
                    $(e).prop('selected', 'selected');
                }else{
                    $(e).prop('disabled', 'disabled');
                }
            });
        }
    };

    // On brand change
    UMForm.prototype.brandOnChange = function() {
        var that = this,
            $this;
        this._form.on('change', '.um-form-brand', function() {
            // Chosen brand
            var brand = $(this).find('option:selected').attr('value');
            if (that._facilitiesChanged === false && that._departmentsChanged === false){
                that._brandsChanged = true;
            }


            // Reset models
            that.resetModels();
            var allModels = [];
            var chosenModels = [];
            $(that._formId + ' .um-form-model > option').each(function() {
                var $this = $(this);
                if (that._modelsConstants !== null) {
                    var mcHit = false;
                    var bHit = false;

                    if (that._modelsConstants.indexOf($this.val()) >= 0){
                        mcHit = true;
                    }

                    if ($this.data('brand') === brand){
                        bHit = true;
                    }

                    var option = {
                        'el': this,
                        'mcHit': mcHit,
                        'bHit': bHit
                    };

                    if (mcHit === true && bHit === true) {
                        chosenModels.push(option);
                    }

                    allModels.push(option);
                } else {
                    if ($this.data('brand') !== brand){
                        $this.prop('disabled', 'disabled');
                    }
                }
            });

            if (that._modelsConstants !== null) {
                $(that._formId + ' select.um-form-model').find('option').prop('disabled', 'disabled');
                if (chosenModels.length > 0) {
                    chosenModels.forEach(function(e) {
                        $(that._formId + ' select.um-form-model').find('option').each(function() {
                            if ($(this).val() === $(e.el).val()){
                                $(this).prop('disabled', false);
                            }
                        });
                    });
                } else if (allModels.length > 0) {
                    allModels.forEach(function(e) {
                        if (e.bHit === true) {
                            $(that._formId + ' select.um-form-model').find('option').each(function() {
                                if ($(this).val() === $(e.el).val()){
                                    $(this).prop('disabled', false);
                                }
                            });
                        }
                    });
                }
            }

            // If brand first
            if (that._brandsChanged === true) {
                if (that._facilitiesConstants === null) {
                    that.resetFacilities();

                    // Disables facilities without the brand
                    $(that._formId + ' .um-form-facility > option').each(function() {
                        var $this = $(this);

                        if ($this.data('brand').indexOf(brand) === -1){
                            $this.attr('disabled', 'disabled');
                        }
                    });

                    $(that._formId + ' .um-form-facility > option:first-of-type').prop('selected', 'selected');
                } else {
                    $(that._formId + ' .um-form-model > option').each(function() {
                        $this = $(this);

                        if ($this.val() === 0){
                            return;
                        }

                        if ($this.data('brand').indexOf(brand) === -1){
                            $this.attr('disabled', 'disabled');
                        }
                        else{
                            $this.removeAttr('disabled');
                        }
                    });
                }
            }

            that.refreshSelectpicker(that._formId);
        });
    };

    // On facility change
    UMForm.prototype.facilityOnChange = function() {
        var that = this;

        this._form.on('change', '.um-form-facility', function() {
            // Facility first
            if (that._brandsChanged === false){
                that._facilitiesChanged = true;
            }

            // If facility first
            if (that._facilitiesChanged === true) {
                if (that._brandsConstants === null) {
                    that.resetBrands();
                    that.clearModels();

                    var changed = $(this).find('option:selected');
                    var brand = changed.data('brand');
                    $(that._formId + ' .um-form-brand > option').each(function() {
                        var $this = $(this);

                        if ($this.val() === '0') {
                            return;
                        }

                        if (brand.indexOf($this.attr('value')) === -1){
                            $this.attr('disabled', 'disabled');
                        }
                    });

                    $(that._formId + ' .um-form-brand > option:first-of-type').prop('selected', 'selected');
                }
            }

            that.refreshSelectpicker(that._formId);
        });
    };

    // Reset brand select
    UMForm.prototype.resetBrands = function() {
        var html = '';
        $.each(this._brands, function(i, e) {
            html += $(e)[0].outerHTML;
        });
        $(this._formId + ' .um-form-brand').first().html(html);
    };

    // Reset model select
    UMForm.prototype.resetModels = function() {
        var html = '';
        $.each(this._models, function(i, e) {
            html += $(e)[0].outerHTML;
        });
        $(this._formId + ' .um-form-model').first().html(html);
    };

    // Reset facility select
    UMForm.prototype.resetFacilities = function() {
        var html = '';
        $.each(this._facilities, function(i, e) {
            html += $(e)[0].outerHTML;
        });
        $(this._formId + ' .um-form-facility').first().html(html);
    };

    // Reset department select
    UMForm.prototype.resetDepartments = function() {
        var html = '';
        $.each(this._departments, function(i, e) {
            html += $(e)[0].outerHTML;
        });
        $(this._formId + ' .um-form-department').first().html(html);
    };

    // Clear models
    UMForm.prototype.clearModels = function() {
        if (this._modelsConstants === null){
            $(this._formId + ' .um-form-model').first().html('<option data-brand="" value="0" disabled="disabled" selected="selected">Välj en modell</option>');
        }
    };

    // Flip functionality
    UMForm.prototype.bindFlip = function() {
        var that = this;
        var checkbox = $(this._formId + ' .exchange').find('input[type="checkbox"]');
        $(this._formId + ' .exchange').find('label').on('dblclick', function(e) {
            e.preventDefault();
        });

        checkbox.on('change', function() {
            if ($(this).prop('checked')){
                $(that._formId + ' .form-card.panel').addClass('flip');
            }
        });

        $(this._formId + ' .exchange-confirm').on('click', function() {
            $(that._formId + ' .form-card.panel').removeClass('flip');
        });

        $(this._formId + ' .exchange-cancel').on('click', function() {
            $(that._formId + ' .form-card.panel').removeClass('flip');
            checkbox.prop('checked', false);
        });
    };

    UMForm.prototype.refreshSelectpicker = function(formId) {
        $(formId + ' .selectpicker').selectpicker('refresh');
        $(formId + ' .selectpicker').selectpicker('deselectAll');
        $(formId + ' .selectpicker').selectpicker('refresh');
    };

    if (typeof wpcf7forms !== 'undefined') {
        for (var id in wpcf7forms) {
            if (wpcf7forms.hasOwnProperty(id)) {
                new UMForm(id);
            }
        }
    }

})(jQuery);

