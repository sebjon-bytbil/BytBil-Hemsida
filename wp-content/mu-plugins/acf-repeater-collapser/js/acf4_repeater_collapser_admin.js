jQuery(document).ready(function ($) {

    /**
     * set up the buttons on the entire form
     */
    function acfRepeaterCollapserInit() {
        // HTML to put above each repeater instance
        $collapseAllButton = '<button type="button" role="button" class="button field-repeater-toggle field-repeater-toggle-all">Minimera alla rader</button>';
        $collapseSingleButtonTable = '<td class="repeater-button-cell"><button type="button" role="button" class="button field-repeater-toggle field-repeater-toggle-single"><span class="screen-reader-text">Minimera rad</span></button></td>';
        $collapseSingleButton = '<button type="button" role="button" class="button field-repeater-toggle field-repeater-toggle-single"><span class="screen-reader-text">Minimera rad</span></button>';

        // find each repeater & flexible instance, add the button if the field uses the row layout
        $('.field_type-repeater, .field_type-flexible_content').each(function () {
            $repeater = $(this);

            // only use this on row layout
            if ($('.acf-input-table', $repeater).hasClass('row_layout')) {
                $repeater.data('acf-rowset-collapsed', false).attr('aria-expanded', false);

                // first: nested, second: parent
                if ($repeater.is('tr')) {
                    $repeater.children('td:last-child')
                        .children('.inner')
                        .prepend($collapseAllButton)
                        .data('acf-rowset-collapsed', false)
                        .data('acf-repeater-nested', true);
                    $('.row,.row-clone', $repeater).data('acf-repeater-nested', true);
                } else {
                    $repeater.prepend($collapseAllButton)
                        .data('acf-rowset-collapsed', false);
                }
            }
        });

        // iterator for adding IDs/aria-controls attributes to repeater buttons
        i = 1;
        // append single repeater collapse to each row of repeater field
        $('.field_type-repeater .row_layout .row,.field_type-repeater .row_layout .row-clone').each(function () {
            id = 'acf-repeater-' + i;

            $(this).prepend($collapseSingleButtonTable)
                .data('acf-row-collapsed', false).attr('aria-expanded', true)
                .attr('id', 'acf-repeater-' + i)
                .attr('aria-live', 'off');
            $('.field-repeater-toggle-single', $(this)).first()
                .attr('aria-controls', id);

            i++;
        });

        // Tableheader-fix nested repeaters.
        $('.row_layout table.acf_input .repeater').each(function (index, element) {
            $(this).find('table thead tr').prepend('<th class="acf-collapse-header"></th>');
        });

        // append single repeater collapse to flex fields
        $('.field_type-flexible_content .layout').each(function () {
            if ($('.acf-input-table', $(this)).hasClass('row_layout')) {
                id = 'acf-repeater-' + i;
                i++;

                $(this).prepend($collapseSingleButton)
                    .data('acf-row-collapsed', false)
                    .attr('aria-expanded', true)
                    .attr('id', 'acf-repeater-' + i)
                    .attr('aria-live', 'off');

                $('.field-repeater-toggle-single', $(this)).first()
                    .attr('aria-controls', id);
            }
        });

        // Bind click events to the toggle functions
        // delegated to higher DOM element to handle dynamically added repeaters
        $('.field_type-repeater, .field_type-flexible_content').on(
            'click',
            '.field-repeater-toggle-all',
            acfRepeaterToggleAll
        );
        $('.field_type-repeater .row_layout,.field_type-flexible_content').on(
            'click',
            '.field-repeater-toggle-single',
            acfRepeaterToggleSingle
        );

        // prevent default flexible field collapsing for clarity
        $('.field_type-flexible_content').on(
            'click',
            '.acf-fc-layout-handle',
            false
        );
    }

    /**
     * Collapse a row or rows
     */
    function acfRepeaterCollapseRow($rows) {
        $rowButtonText = $('.screen-reader-text', $rows);
        $rows.addClass('collapsed-row')
            .data('acf-row-collapsed', true)
            .attr('aria-expanded', false);
        $rowButtonText.text('Expandera rad')
    }

    /**
     * Expand a row or rows
     */
    function acfRepeaterExpandRow($rows) {
        $rowButtonText = $('.screen-reader-text', $rows);
        $rows.removeClass('collapsed-row')
            .data('acf-row-collapsed', false)
            .attr('aria-expanded', true);
        $rowButtonText.text('Minimera rad');
    }

    /**
     * Indicate a collapsed rowset
     */
    function acfRepeaterExpandRowset($wrapper) {
        $button = $('.field-repeater-toggle-all', $wrapper).first();

        $wrapper.removeClass('collapsed-repeater')
            .data('acf-rowset-collapsed', false);
        $button.text('Minimera alla rader');
    }

    /**
     * Indicate an expanded rowset
     */
    function acfRepeaterCollapseRowset($wrapper) {
        $button = $('.field-repeater-toggle-all', $wrapper).first();

        $wrapper.addClass('collapsed-repeater')
            .data('acf-rowset-collapsed', true);
        $button.text('Expandera alla rader');
    }

    /**
     * toggles set of repeater rows or flexible fields
     */
    function acfRepeaterToggleAll() {
        $rowsetButton = $(this);
        $rowsetWrapper = $(this).parent();

        // select either nested or unnested repeater rows, not both
        if (true === $rowsetWrapper.data('acf-repeater-nested')) {
            $rows = $('.row:data(acf-repeater-nested),.layout', $rowsetWrapper);
        } else {
            $rows = $('.row,.layout', $rowsetWrapper).not(':data(acf-repeater-nested)');
        }

        // toggle repeater state and all rows
        if (true !== $rowsetWrapper.data('acf-rowset-collapsed')) {
            acfRepeaterCollapseRowset($rowsetWrapper);
            acfRepeaterCollapseRow($rows);
            var size = $row.find('.field_key-field_541c2f5ae6cb8 select option:selected').val();
            if (size == 12) {
                $row.width('99%');
            }
            else if (size == 9) {
                $row.width('73%');
            }
            else if (size == 6) {
                $row.width('48%');
            }
            else if (size == 4) {
                $row.width('31%');
            }
            else if (size == 3) {
                $row.width('23%');
            }
        } else {
            acfRepeaterExpandRowset($rowsetWrapper);
            acfRepeaterExpandRow($rows);
            $row.width('99%');
        }

        // prevent bubbling up to parent repeater rowset
        event.stopPropagation();
    }

    /**
     * toggles single repeater row or flexible field
     */
    function acfRepeaterToggleSingle() {
        $rowButton = $(this);
        $rowButtonText = $('.screen-reader-text', $rowButton);
        $row = $rowButton.closest('.row,.layout');

        // select either parent repeater field wrapper
        if (true === $row.data('acf-repeater-nested')) {
            $rowsetWrapper = $row.closest('.inner');
        } else {
            $rowsetWrapper = $row.closest('.field_type-repeater,.field_type-flexible_content');
        }

        // toggle the row state and button text
        if (true !== $row.data('acf-row-collapsed')) {
            acfRepeaterCollapseRow($row);
            var size = $row.find('.field_key-field_541c2f5ae6cb8 select option:selected').val();
            if (size == 12) {
                $row.width('99%');
            }
            else if (size == 9) {
                $row.width('73%');
            }
            else if (size == 6) {
                $row.width('48%');
            }
            else if (size == 4) {
                $row.width('31%');
            }
            else if (size == 3) {
                $row.width('23%');
            }

        } else {
            acfRepeaterExpandRow($row);
            $row.width('99%');
        }

        if (true === acfRepeaterAllCollapsed($rowsetWrapper)) {
            acfRepeaterCollapseRowset($rowsetWrapper);
        } else {
            acfRepeaterExpandRowset($rowsetWrapper);
        }

        // prevent bubbling up to parent row button
        event.stopPropagation();
    }

    /**
     * check to see if all rows in a rowset are collapsed
     * @param  obj $rowsetWrapper jquery object
     * @return bool                    true if all rows in rowset are collapsed
     */
    function acfRepeaterAllCollapsed($rowsetWrapper) {
        // select either nested or unnested repeater rows, not both
        if (true === $rowsetWrapper.data('acf-repeater-nested')) {
            $rows = $('.row:data(acf-repeater-nested),.layout:data(acf-repeater-nested)', $rowsetWrapper);
        } else {
            $rows = $('.row,.values .layout', $rowsetWrapper).not(':data(acf-repeater-nested)');
        }

        // store every row collapsed state in an array
        var rowStates = new Array();
        $rows.each(function () {
            rowStates.push($(this).data('acf-row-collapsed'));
        });

        // check if any rows are expanded
        allCollapsed = 0 > $.inArray(false, rowStates);

        return allCollapsed;
    }

    // Initiatilize the plugin
    acfRepeaterCollapserInit();

});