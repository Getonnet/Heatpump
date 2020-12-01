$(function () {

    /**----------------
     * Datatable default settings
     * ---------------------
     */
    $.extend( true, $.fn.dataTable.defaults, {
        responsive: true,
        autoWidth: false,
        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        lengthMenu: [[10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"]],
        iDisplayLength: 15,
        order: []
    });

    /**----------------
     * Datatable default settings
     * ---------------------
     */

    /**-----------------
     *  Send Default delete request
     *  ----------------------
     */

        $('.delBtn').click(function (e) {
            e.preventDefault();
            let delForm = $(this).data('form');
            let delUrl = $(this).attr('href');
            let forms = $('#'+delForm);
            forms.attr('action', delUrl).submit();
        });
    /**-----------------
     *  /Send Default delete request
     *  ----------------------
     */

});
