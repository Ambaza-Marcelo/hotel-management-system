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

function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
 $("#myBtn").click(function(){
    $("#myModal").modal();
  });