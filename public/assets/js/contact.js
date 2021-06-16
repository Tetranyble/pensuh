
$(function () {

    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // init the validator
    $('#ajax-contact').validator();

    // when the form is submitted
    $('#ajax-contact').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "/contacts";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                beforeSend: function() {
                    toastr.info('Hang-on', 'Contact request is being processed')
                },
                success: function (r) {
                    toastr.success(r.status, r.message)
                    $('#ajax-contact')[0].reset();

                },
                error: function(jqXHR, testStatus, error) {
                    toastr.error('Error', error)
                },
                timeout: 8000
            });
            return false;
        }
    })
});
