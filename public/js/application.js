window.addEventListener('load', function () {
    loader_fade_out()
    data_table_div()
    all_images()
    datepicker_format()
})

function loader_fade_out() {
    $('.loader').fadeOut();
}

function data_table_div() {
    var myTable = $('.table-data-div').DataTable({ paging: false });
}

function all_images() {
    var allimages = document.getElementsByTagName('img');
    for (var i = 0; i < allimages.length; i++) {
        if (allimages[i].getAttribute('data-src')) {
            allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
        }
    }
}

function datepicker_format() {
    $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
}

$( function() {
    $( "#employees" ).draggable();
    $( "#users" ).draggable();
    $( "#capital" ).draggable();
    $( "#income" ).draggable();
    $( "#expense" ).draggable();
  } );
$( function() {
    $( "#accordion" ).accordion();
  });

//image upload
$(function(){
    $(".btn-primary").click(function(){
            var lsthml = $(".clone").html();
            $(".increment").after(lsthtml);
        });
            $('body').on("click",".btn-danger",function(){
                $($this).parents(".hdmartial control-group lst").remove();    
        });
});


//search file
$(function(){
    var path = "{{ route('autocomplete')}}";
    $('input.typeahead').typeahead({
        source: function(query, process){
            return $.get(path,{query:query},
                function(data){
                    return process (data);
                });
        }
    });
});

//slider welcome blade
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}


//gallery image slider on welcome

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}








