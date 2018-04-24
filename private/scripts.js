$(document).ready(function () {

    $("#successfully-created-alert").hide();
    $("#failed-create-alert").hide();

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
            alert("Please fill all fields!");
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
                    $("#successfully-created-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#successfully-created-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                },
                error: function (response) {
                    $("#create-submit").hide();
                    $("#failed-create-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#failed-create-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                }
            });
        }

    }
});
