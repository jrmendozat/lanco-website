$(document).ready(function () {
             
    //AccordionMenu
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
    
        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    } 


    // Pinterest
    

    $('#products-sm').pinterest_grid({
        no_columns: 3,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 20,
        single_column_breakpoint: 400
    });

    $('#products-sl').pinterest_grid({
      no_columns: 1,
      padding_x: 10,
      padding_y: 10,
      margin_bottom: 20,
      single_column_breakpoint: 400
  });


    
   

    // Update category Filter 
    $(".btn-update-categoryfilter").on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var href = $(this).data('href');
        var posicion = href.lastIndexOf('/');
        var porcion = href.substring(0, posicion);
        window.location.href = porcion + "/" + id;

        //window.location.href = href;
        //window.location.href = porcion + "/" + shipment_quantity;
    });  
    
   

        // Filter product by category 
     $(".btn-collapse-category").on('click', function (e) {
        e.preventDefault();
        console.log(response);
        var id = $(this).data('id');
        var href = $(this).data('href');
        window.location.href = href + "/" + id;
        

        
        
        //window.location.href = href;
        //window.location.href = porcion + "/" + shipment_quantity;
    });  
  
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
            
});