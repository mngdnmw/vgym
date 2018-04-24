$(document).ready(function () {

    $("#successful-alert").hide();
    $("#failed-alert").hide();

    $(document).on('click', '#add-new-day', function () {
        window.console && console.log('foo');
    });

    $(document).on('click', '#create-submit', function () {
        event.preventDefault();
        submitForm();
    });

    function submitForm() {
        // Initiate Variables With Form Content
        var wname = $("#wname").val();
        var wdesc = $("#wdesc").val();
        var wdiff = $("#wdiff").val();
        var dname = $("#dname").val();
        var ename = $("#ename").val();
        var edur = $("#edur").val();

        if (wname == '' || wdesc == '' || wdiff == '' || ename == '' || edur == '' || dname == '') {
            $(".alert-message").text("Input is required for each field!");
            $("#create-submit").hide();
            $("#failed-alert").fadeTo(3000, 1000).slideUp(1000, function () {
                $("#failed-alert").slideUp('close');
                $("#create-submit").show();
            });

        } else {
            $.ajax({
                url: '../private/ajax.php',
                type: 'POST',
                data: {
                    'create': 1,
                    'wname': wname,
                    'wdesc': wdesc,
                    'wdiff': wdiff,
                    'dname': dname,
                    'ename': ename,
                    'edur': edur,
                },
                success: function (response) {
                    $('#wname').val('');
                    $('#wdesc').val('');
                    $('#wdiff').val('');
                    $('#dname').val('');
                    $('#ename').val('');
                    $('#edur').val('');
                    $("#create-submit").hide();
                    $("#successfully-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#successfully-created-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                },
                error: function (response) {
                    $("#create-submit").hide();
                    $("#failed-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#failed-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                }
            });
        }

    }
});
