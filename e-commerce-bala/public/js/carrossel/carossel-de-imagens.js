function carrosselImagens(classe)
{
  $(classe).slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
  });
}