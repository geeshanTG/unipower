

// Owlcarousel
$(document).ready(function(){
  $("#land_projects").owlCarousel({
      loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsive:{
        320: {
            items: 1
        },
        360: {
            items: 1
        },
        375: {
            items: 1
        },
        480: {
            items: 2
        },
        768: {
            items: 4
        },
        991: {
            items: 4
        },
        1024: {
            items: 4
        },
        1200: {
            items: 5
        }
    }
  });
});


// Owlcarousel
$(document).ready(function(){
  $("#testi").owlCarousel({
      loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsive:{
        320: {
            items: 1
        },
        360: {
            items: 1
        },
        375: {
            items: 1
        },
        480: {
            items: 3
        },
        768: {
            items: 3
        },
        991: {
            items: 3
        },
        1024: {
            items: 3
        },
        1200: {
            items: 3
        }
    }
  });
});


// Owlcarousel
$(document).ready(function(){
  $("#project_logo").owlCarousel({
      loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsive:{
        320: {
            items: 1
        },
        360: {
            items: 1
        },
        375: {
            items: 1
        },
        480: {
            items: 3
        },
        768: {
            items: 5
        },
        991: {
            items: 5
        },
        1024: {
            items: 7
        },
        1200: {
            items: 7
        }
    }
  });
});
