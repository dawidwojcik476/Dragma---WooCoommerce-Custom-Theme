jQuery(document).ready(function($){
  $('.products-slider__products').slick({ //add CSS class of target
      dots: true,
      autoplay: false,
      speed: 900,
      prevArrow: $('.prev'),
nextArrow: $('.next'),
      autoplaySpeed: 2000,
      slidesToShow: 3,
      responsive: [
        {
          breakpoint: 1600,
          settings: {
  
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 1000,
          settings: {
        
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 1
          }
        }
      ]
    })
  });


  

  $(document).ready(function(){
    $('.readys__gallery ul').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      speed: 600,
      autoplay: true,
  autoplaySpeed: 2000,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  responsive: [
    {
      breakpoint: 1800,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 1220,
      settings: {
        slidesToShow: 2,
      }
    },  
     {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
      }
    },
  
    
  ]
    });
  }); 
  
  $(document).ready(function(){
    $('.single-product__gallery ul').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      speed: 600,
      autoplay: true,
  autoplaySpeed: 2000,
  prevArrow: $('.prev'),
  nextArrow: $('.next')
    });
  });