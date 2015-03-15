/**
 * Created by Joaquin on 23/02/2015.
 */


$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
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

    $('.editer').click( function(){
        cleanCheckboxes();
    });

    $('.checkbox-all').click(function(){
        if(this.checked) { // check select status
            $('.checkbox-supp').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"
            });
        }else{
            $('.checkbox-supp').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"
            });
        }
    });
    /**
     * To check all checkboxes suppr
     */

    $('#dropSelection').click(function (e){
        e.preventDefault();
        var checked = getUsersCheckedToDrop();
        var url = $('#drop').attr('href');
        var token = $(this).data('token');
        var statusCheckAll = '';
        if($('.checkbox-all').is(':checked'))
        {
            statusCheckAll = 'all';
        }
        else {
            statusCheckAll = 'one';
        }
        if (jQuery.isEmptyObject(checked))
        {
            swal("Pas d'utilisateurs sélectionnés");
            return;
        }
        else
        {
            swal({
                    title: "Êtes-vous sûr?",
                    text: "Vous ne serez pas en mesure de récupérer cet utilisateur!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Oui, supprimez-le!',
                    cancelButtonText: "Non, annuler",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm)  {
                    if (isConfirm) {
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: {'id' : checked, _token : token, 'numberUsers' : statusCheckAll },
                            success : function(data){
                                if(data.success == false)
                                {
                                    swal("Non autorisé", "Désolé, vous avez pas la permission de faire cette opération. \n " +
                                    "S'il vous plaît contactez votre administrateur", "error");
                                }
                                else
                                {
                                    swal({
                                        title: "Deleted!",
                                        text: data.data,
                                        type: "success"},function(){
                                        // reload page after swal-dialog closes
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }
                    else
                    {
                        swal("Annulé", "Utilisateur n'a pas été supprimée", "error");
                    }
                });
        }
    });
    function getUsersCheckedToDrop()
    {
        var checked = [];
        $('.checkbox-supp').each(function() { //loop through each checkbox
            if(this.checked){
                checked.push($(this).attr('value'));
            }  //select all checkboxes with class "checkbox1"
        });
        return checked;
    }
    function cleanCheckboxes()
    {
        $("input:checked").each(function(){
            this.checked = false; //deselect all checkboxes with class "checkbox1"
        });
    }
    $('.search').click(function(){
        $('#inputSearch').prop("readonly", false);
        $('#inputSearch').val('');
        $('#goSearch').removeClass('disabled');
    });


    $('#inputSearch').on('input', function () {
        var value ='#inputSearch';
        var divName = "#resultatesS";
        var fieldSearch = $('input:radio[name=search]:checked').val();
        if ($(this).val() == "") {
            $(value).attr({'value': ''})
        }
        var name = $(this).val();
        $.ajax({
            type: "POST",
            url: searchRoute,
            data: {'method': fieldSearch, 'data' : name },
            success: function (data) {
                //Escribimos las sugerencias que nos manda la consulta
                $(divName).fadeIn(800).html(data);

                //Al hacer click en algua de las sugerencias
                $('.list-group-item').on('click', function () {
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');

                    //Editamos el valor del input con data de la sugerencia pulsada
                    $(value).val($(this).attr('data'));

                    $(value).attr({'value': id})
                    //Hacemos desaparecer el resto de sugerencias
                    $(divName).fadeOut(800);
                });
                setTimeout(function(){
                    $(divName).fadeOut("slow");
                },3000);
            }
        });
    });
    $('#goSearch').click(function(){
        if( $('#inputSearch').val()=='')
        {
            swal("Champ recherche vide");
        }
        else
        {
            var dataInput = $('#inputSearch').val();
            var fieldSearch = $('input:radio[name=search]:checked').val();
            var token = $(this).data('token');
            $.ajax({
                type: 'POST',
                url: searchRoute,
                data: {'method' : fieldSearch, _token : token, 'data':dataInput, 'all':'all' },
                success : function(data){
                    if(data.success == false)
                    {
                        swal("Non autorisé", "administrateur", "error");
                    }
                    else
                    {
                        $('#cont').html(data.result)
                    }
                }
            });
        }

    });

});



