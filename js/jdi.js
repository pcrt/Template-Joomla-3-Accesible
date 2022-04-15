/* User Logged Sticky */
$(document).ready(function() {
    $('#btn-searchjdi').click(function(){
        $('.mod-search').toggleClass('show');
        var $this = $(this);
        $this.toggleClass('show');
        if($this.hasClass('show')){
            $this.html('<svg class="icon icon-sm icon-white"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-close-big"></use></svg>');
        } else {
            $this.html('<svg class="icon icon-sm icon-white"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-search"></use></svg>');
        }
    });

//Carosello prossime iniziative
    $('#iniziativecarosello').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            568:{
                items:2
            }
        }
    })

//Carosello Slide banner
    $('#slideheader').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        items:1,
        autoplayTimeout:3000,/*,
        animateOut: 'fadeOut'*/
        responsive:{
            0:{
                nav:false
            },
            991:{
                nav:true
            }
        }
    })

    //Carosello link utili
    $('#linkutili').owlCarousel({
        loop:true,
        dots:false,
        nav:false,
        autoplayTimeout:3000,/*,
        animateOut: 'fadeOut'*/
        responsive:{
            0:{
                margin:10,
                items:4
            },
            768:{
                margin:80,
                items:6
            }
        }

    })


  });