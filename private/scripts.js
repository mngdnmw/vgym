$(document).ready(function () {

    $("#successful-alert").hide();
    $("#failed-alert").hide();
    $("#new-day-form").hide();
    $("#form-excerise").hide();

    $(document).on('click', '#btn-create-exercise', function () {
        $("#form-excerise").show();


    });


    $(document).on('click', '#add-new-day', function () {
        // window.console && console.log('foo');
        $("#new-day-form").show();


    });

    $(document).on('click', '#create-day-submit', function () {

        event.preventDefault();
        submitCreateDayForm();

    });


    function submitCreateDayForm() {

    }

    $(document).on('click', '#create-plan-submit', function () {
        event.preventDefault();
        submitCreatePlanForm();
    });


    function submitCreatePlanForm() {
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
                    'createWorkout': 1,
                    'wname': wname,
                    'wdesc': wdesc,
                    'wdiff': wdiff,
                    'dname': dname,
                    'ename': ename,
                    'edur': edur,
                },
                success: function () {
                    $('#wname').val('');
                    $('#wdesc').val('');
                    $('#wdiff').val('');
                    $('#dname').val('');
                    $('#ename').val('');
                    $('#edur').val('');
                    $("#create-submit").hide();
                    $("#successful-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#successful-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                    setTimeout(function(){location.reload();},100);
                },
                error: function (response) {
                    window.console && console.log(response);
                    $("#create-submit").hide();
                    $("#failed-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#failed-alert").slideUp('close');
                        $("#create-submit").show();
                    });
                }
            });
        }

    }

    $('#pageModal').on('show.bs.modal', function (event) {
        var btnDelete = $(event.relatedTarget);
        var planId = btnDelete.data('id');
        var modal = $(this);
        modal.find('.modal-body').text("Are you sure you want to delete this plan?");
        modal.find('#btn-confirm').click(function () {
            modal.hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $.ajax({
                url: '../private/ajax.php',
                type: 'POST',
                data: {
                    'deleteWorkout': 1,
                    'id': planId,
                },
                success: function () {

                   location.reload();

                    $(window).load(function() {
                        $(".alert-message").text("Plan successfully deleted!");
                        $("#successful-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                            $("#successful-alert").slideUp('close');
                            $("#create-submit").show();
                        });
                    });

                },
                error: function (response) {
                    window.console && console.log(response);
                    $(".alert-message").text("Ooops...something went wrong, please try again!");
                    $("#failed-alert").fadeTo(2000, 1000).slideUp(1000, function () {
                        $("#failed-alert").slideUp('close');
                    });
                }
            });
        });

    });
});
