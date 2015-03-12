/**
 * Created by Joaquin on 23/02/2015.
 */


$(document).ready(function() {

    $(".alert").addClass("in").fadeOut(10000);

    /* swap open/close side menu icons */
    $('[data-toggle=collapse]').click(function(){
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });
    /*
    $('#viewDetailsUsers').click(function(){
        $('#resultate').bPopup({
            scrollBar: 'true'
        });
    }); */

});