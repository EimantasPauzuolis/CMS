
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
        $.ajax({
            type: 'POST',
            url: url,
            data: formData
        })
        .done(function(data){
            console.log(data);
               $('#commentForm .form-group textarea').val('');
                $('<div class="media small-card">'
                +                '<a class="pull-left" href="#">'
                +                    '<img class="media-object img-circle" src="'+ (data.user.photo ? data.user.photo.path : '../images/alternate.jpg') +'" alt="" height="50" width="50">'
                +                '</a>'
                +                '<div class="media-body">'
                +                    '<h4 class="media-heading"> ' + data.user.name
                +                        '<small> '+ getTime(data.created_at) +'</small>'
                +                    '</h4>'
                +                    data.content    
                +                '</div>'
                +            '</div>'
                ).prependTo('#commentsContainer').hide().fadeIn(); 

        });  
    });

    //Replies
    $('.replyForm').on('submit', function(event){
        event.preventDefault();
        var currentForm = $(this).closest('form');
        var textarea = currentForm.find('textarea');
        console.log(textarea);
        if(textarea.css('display') == 'block'){
            var formData = $(this).serialize();
            
            $.ajax({
            type: 'POST',
            url: '/comment/reply',
            data: formData
        })
        .done(function(data){
            console.log(data);
               textarea.val('');
               $('<div class="media">'
                +                '<a class="pull-left" href="#">'
                +                    '<img class="media-object img-circle" src="'+ (data.user.photo ? data.user.photo.path : '../images/alternate.jpg') +'" alt="" height="50" width="50">'
                +                '</a>'
                +                '<div class="media-body">'
                +                    '<h4 class="media-heading"> ' + data.user.name
                +                        '<small> '+ getTime(data.created_at) +'</small>'
                +                    '</h4>'
                +                    data.content    
                +                '</div>'
                +            '</div>'
                ).appendTo(currentForm.prev()).hide().fadeIn(); 
               textarea.css('display', 'none');
           
        });  
        }//End if
        else{
            textarea.css('display', 'block');

        }
        
    });

     function getTime(created_at){
                var time = moment(created_at);
                if(time.isDST()){
                    time.add(1, 'h');
                    return time.fromNow();
                }
                else{
                    return time.fromNow();
                }
            }

    (function () {
        $(window).scroll(function(){
            if(window.innerWidth > 1200){
                var top = $(window).scrollTop();
                if(top > 150){
                    $('#post-sidebar').css({top: top-80});
                }
                else{
                    $('#post-sidebar').css({top: '0px'});

                }
            }
        });
    
    })();

    $(document).ready(function(){
        $('#changePassword').siblings().hide();
    });

    $('#changePasswordToggle').on('click', function(){
        $('#changePassword').siblings().hide();
        $('#changePassword').fadeIn();
    });

    $('#changeEmailToggle').on('click', function(){
        $('#changeEmail').siblings().hide();
        $('#changeEmail').fadeIn();
    });

    $('#changeDetailsToggle').on('click', function(){
        $('#changeDetails').siblings().hide();
        $('#changeDetails').fadeIn();
    });

});