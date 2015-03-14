/**
 * Created by Joaquin on 23/02/2015.
 */


$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $(".alert").addClass("in").fadeOut(5000);

    /* swap open/close side menu icons */
    $('[data-toggle=collapse]').click(function(){
        // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });
    /**
     * Event click in all buttons "Afficher" to open a popup
     */
    $('.afficher').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('value');
        var layout = $(this).attr('data');
        showProfilePopUp(id,layout,url);
    });
    /**
     * To show the profile details in popup
     * @param id The id of user to search
     * @param id Layout origin
     * @return PopUp with the info profile
     */
    function showProfilePopUp(id, layout,url)
    {
        var id      =   id;
        var layout  =   layout;
        var url     = url;
        var method  = '';

        if(layout == 1)
        {
            method = "POST"
        }
        else
        {
            method = "GET";
        }
        if(method == "POST")
        {
            $.ajax({
                type: method,
                url: url,
                data: {'id' : id},
                beforeSend: function(){
                    $('#detailUser').append('<span class=\'button b-close\'><span>X</span></span>' +
                    '<div class="col-xs-12 cent"><div class="col-sm-12 col-xs-12"></div>' +
                    '<img class="wait" src= "'+pathImgWait+'" /></div>');
                    //return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
                },
                success: function (data) {
                    $('#detailUser').html(" <span class='button b-close'><span>X</span></span>"+data);
                }
            });
            $('#detailUser').bPopup({
                easing: 'easeOutBack', //uses jQuery easing plugin
                speed: 450,
                transition: 'slideDown'
            });
        }
    }



   function editProfileUser(id)
   {
       var id = id;
       if (id)
       {
           var url = 'users/edit/'+id;
           //alert (url);
           var method  = 'GET';
           $.ajax({
               type: method,
               url: url,
               success: function (data) {
                   $("#cont").html(data);
               }
           });
       }
   }
});