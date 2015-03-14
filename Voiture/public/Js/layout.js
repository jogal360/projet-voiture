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
    /**
     * Event click in all buttons "Afficher" to open a popup
     */
    $('.afficher').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        var layout = $(this).attr('data');
        showProfilePopUp(id,layout);
    });
    /**
     * To show the profile details in popup
     * @param id The id of user to search
     * @param id Layout origin
     * @return PopUp with the info profile
     */
    function showProfilePopUp(id, layout)
    {
        var id      =   id;
        var layout  =   layout;
        var url     = '';
        var method  = '';

        if(layout == 1)
        {
            url = "users/detail";
            method = "POST"
        }
        else
        {
            url = "";
            method = "GET";
        }
        if(method == "POST")
        {
            $.ajax({
                type: method,
                url: url,
                data: {'id' : id},
                beforeSend: function(){
                    $('#detailUser').append('<div class="col-xs-12"><div class="col-sm-4 col-xs-12 cent"></div> <img class="wait" src="../../../Img/wait.gif" /></div>');
                },
                success: function (data) {
                    $('#detailUser').html(" <span class='button b-close'><span>X</span></span>"+data)
                }
            });
            $('#detailUser').bPopup({
                easing: 'easeOutBack', //uses jQuery easing plugin
                speed: 450,
                transition: 'slideDown'
            });
        }
        else
        {
            alert ('daahhhh');
        }
    }

    $('.editer').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        editProfileUser(id);
    });

   function editProfileUser(id)
   {
       var id = id;

   }
});