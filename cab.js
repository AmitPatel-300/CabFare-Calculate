var pick = "current";
var drop = "current";
var cab = "cab";
var lugg;

$(document).ready(function() {
    $('#pick').change(function() {
        pick = $(this).val();
    });

    $('#drop').change(function() {
        drop = $(this).val();
    });

    $('#cab').change(function() {
        cab = $(this).val();

        if (cab == 'CedMicro') {
            $("#lugg").prop("disabled", true);
        } else {
            $("#lugg").prop("disabled", false);
        }
    });

    $('#cal').click(function() {
        if (pick == "current") {
            alert('please choose pickup point');
            return false;
        }

        if (drop == "current") {
            alert('please choose drop point');
            return false;
        } else if (drop == pick) {
            alert('pickup and drop point are same');
            return false;
        } else if (cab == "cab") {
            alert('please choose cab');
            return false;
        }
        var lugg = $('#lugg').val();
        if (isNaN(lugg)) {
            alert("enter luggage value in numeric");
            $('#lugg').val('');
        } else {
            $.ajax({
                url: 'cab.php',
                type: 'POST',
                data: {
                    PICK: pick,
                    DROP: drop,
                    CAB: cab,
                    LUGG: lugg
                },
                success: function(data) {
                    $('#cal').val('Total Fare is : ' + data + ' Rs.').css("backgroundColor", "#DDFA26");
                }
            });
        }
    });
});