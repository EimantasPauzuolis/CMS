
$(document).ready(function(){

    $('#selectAllBoxes').click(function(event){

        if(this.checked) {

            $('.checkBoxes').each(function(){

                this.checked = true;

            });

        } else {


            $('.checkBoxes').each(function(){

                this.checked = false;

            });


        }

    });


    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    //Button icon hover animations
    $('.form-button').on({
        mouseover: function(){
        var icon = this.children;
        icon[0].style.color = 'white';
    },  mouseleave: function(){
        var icon = this.children;
        icon[0].style.color = 'black';
    }});

        $('.dropdown-toggle').on({
        mouseover: function(){
        var icon = this.children;
        icon[0].style.color = 'white';
    },  mouseleave: function(){
        var icon = this.children;
        icon[0].style.color = 'black';
    }});


    //Comments
    $('#commentForm').on('submit', function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData
        })
        .done(function(data){
            console.log(data);
               $('#commentForm .form-group textarea').val('');
               $('<div class="media">'
                +                '<a class="pull-left" href="#">'
                +                    '<img class="media-object" src="'+ (data.user.photo ? data.user.photo.path : '../images/alternate.jpg') +'" alt="" height="50">'
                +                '</a>'
                +                '<div class="media-body">'
                +                    '<h4 class="media-heading"> ' + data.user.name
                +                        '<small> '+ moment(data.created_at).fromNow() +'</small>'
                +                    '</h4>'
                +                    data.content    
                +                '</div>'
                +            '</div>'

                ).prependTo('#commentsContainer').hide().slideDown();

               

        });
        
    });


});