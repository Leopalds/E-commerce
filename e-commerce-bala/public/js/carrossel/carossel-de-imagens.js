function carrosselImagens(classe)
{
  $(classe).slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: false
  });
}