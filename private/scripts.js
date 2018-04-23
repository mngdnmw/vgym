$(document).ready(function () {
    $( function() {
        $( "#datepicker" ).datepicker();
    } );


    $(document).on('click', '#add-new-day', function () {
        window.console && console.log('foo');
    });

    $(document).on('click', '#create-submit', function () {
        event.preventDefault();
        submitForm();

    });

    $( "#popup" ).dialog({
        modal: true,
        autoOpen: false,
        height: 255,
        width: 300,
        buttons: {
            "Retrieve": function() {
                document.forms["forgotform"].submit();
            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        },
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
            $( function() {
                $( "#dialog" ).dialog();
            } );


            // $.ajax({
            //     url: '../ajax.php',
            //     type: 'POST',
            //     data: {
            //         'create': 1,
            //         'wname': wname,
            //         'wdesc': wdesc,
            //         'wdiff': wdiff,
            //         'dname': dname,
            //         'ename': ename,
            //         'edur': edur,
            //     },
            //     success: function (response) {
            //         $('#wname').val('');
            //         $('#wdesc').val('');
            //         $('#wdiff').val('');
            //         $('#dname').val('');
            //         $('#ename').val('');
            //         $('#edur').val('');
            //         $("#popup").dialog("open");
            //         //window.location='thank-you.html'
            //     }
            // });
        }

    }

    function formSuccess() {
        $("#msgSubmit").removeClass("hidden");
    }
});
