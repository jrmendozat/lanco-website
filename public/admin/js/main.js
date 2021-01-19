$(document).ready(function(){

	$(".btn-detalle-pedido").on('click', function (e) {
        e.preventDefault();

        var id_pedido = $(this).data('id');
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body-detail");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-detalle-pedido tbody");
        var data = { '_token': token, 'order_id': id_pedido };

        modal_title.html('Detalle del Pedido: ' + id_pedido);
        table.html(loading);

        $.post(
            path,
            data,
            function (data) {
                //console.log(response);
                table.html("");

                for (var i = 0; i < data.length; i++) {

                    var fila = "<tr>";
                    fila += "<td style=width:10px> <img src='" + data[i].product.image + "'></td>";
                    fila += "<td style=width:400px>" + data[i].product.name + "</td>";
                    
                    switch(data[i].product_presentation) {
                      case "0":
                          if((data[i].unitPrice == "1")) {
                              fila += "<td style=width:300px>" + 'Por Unidad -> Aprox' + data[i].estimated_weight+ 'Kg'+ "</td>";
                          } else {
                              fila += "<td style=width:300px>"+'Por Unidad'+"</td>";
                          }
                      break;
                      case "1":
                          if((data[i].unitPrice == "1")) {
                              fila += "<td style=width:300px>" + 'Por Paquete -> Aprox' + data[i].estimated_weight+ 'Kg'+ "</td>";
                          } else {
                              fila += "<td style=width:300px>"+'Por Paquete'+"</td>";
                          }
                      break;
                      case "2":
                          fila += "<td style=width:300px>"+'Detallado'+"</td>";
                      break;
                      default:
                         fila += "<td style=width:300px>"+'Presentación'+"</td>";
                    }
                    if((data[i].product_presentation == "2")) {
                        fila += "<td class=text-right style=width:30px>" + parseFloat(data[i].quantity) + "</td>";
                    } else {
                        fila += "<td class=text-right style=width:30px>" + parseInt(data[i].quantity) + "</td>";
                    } 
            
                    //if((data[i].unitPrice == "1")) {
                    //    fila += "<td style=width:100px>" + 'Por Kg' + "</td>";
                    //} else {
                    //    fila += "<td style=width:100px>" + 'Por Unidada' + "</td>";
                    //} 

                  
                    fila += "<td class=text-right style=width:120px> " + parseFloat(data[i].price).toFixed(2) + "</td>";
                    //fila += "<td class=text-right style=width:120px> " + parseFloat(data[i].tax).toFixed(2) + "</td>";
                    
                    var tax = 0;
                    if((data[i].unitPrice == "1")) {
                        tax = (((((parseFloat(data[i].quantity) * data[i].estimated_weight) * parseFloat(data[i].price)).toFixed(2)) * parseFloat(data[i].tax)) / 100);
                    } else {
                        tax = ((((parseFloat(data[i].quantity) * parseFloat(data[i].price)).toFixed(2) ) * parseFloat(data[i].tax)) / 100);
                    }

                    //fila += "<td class=text-right style=width:120px> " + tax + "</td>";
                    
                    var subtotalitem = 0;
                    if((data[i].unitPrice == "1")) {
                        subtotalitem = (((parseFloat(data[i].quantity) * data[i].estimated_weight) * parseFloat(data[i].price)).toFixed(2));
                    } else {
                        subtotalitem= ((parseFloat(data[i].quantity) * parseFloat(data[i].price)).toFixed(2));  
                    } 
                    
                    var totalitem = 0;
                    totalitem = parseFloat(subtotalitem) + parseFloat(tax);
                    fila += "<td class=text-right style=width:120px> " + parseFloat(totalitem).toFixed(2) + "</td>";
                  

                    fila += "</tr>";
                    table.append(fila);
                }
            },
            'json'
        );

    });


    $(".btn-detalle-pedido-d").on('click', function (e) {
        e.preventDefault();

        
        var id_pedido = $(this).data('id');
        //console.log(id_pedido );
        var path = $(this).data('path');
        var token = $(this).data('token');
        var modal_title = $(".modal-title");
        var modal_body = $(".modal-body-detail");
        var loading = '<p><i class="fa fa-circle-o-notch fa-spin"></i> Cargando datos</p>';
        var table = $("#table-detalle-pedido tbody");
        var data = { '_token': token, 'order_id': id_pedido };

        modal_title.html('Detalle del Pedido: ' + id_pedido);
        table.html(loading);

        $.post(
            path,
            data,
            function (data) {
                //console.log(response);
                table.html("");

                for (var i = 0; i < data.length; i++) {

                    var fila = "<tr>";
                    fila += "<td style=width:10px> <img src='" + data[i].product.image + "'></td>";
                    fila += "<td style=width:400px>" + data[i].product.name + "</td>";
                    fila += "<td class=text-right style=width:30px>" + parseInt(data[i].quantity) + "</td>";
                    switch(data[i].product_presentation) {
                      case "0":
                          if((data[i].unitPrice == "1")) {
                              fila += "<td style=width:300px>" + 'Por Unidad -> Aprox' + data[i].estimated_weight+ 'Kg'+ "</td>";
                          } else {
                              fila += "<td style=width:300px>"+'Por Unidad'+"</td>";
                          }
                      break;
                      case "1":
                          if((data[i].unitPrice == "1")) {
                              fila += "<td style=width:300px>" + 'Por Paquete -> Aprox' + data[i].estimated_weight+ 'Kg'+ "</td>";
                          } else {
                              fila += "<td style=width:300px>"+'Por Paquete'+"</td>";
                          }
                      break;
                      case "2":
                          fila += "<td style=width:300px>"+'Detallado'+"</td>";
                      break;
                      default:
                         fila += "<td style=width:300px>"+'Presentación'+"</td>";
                    }
            
                    if((data[i].unitPrice == "1")) {
                        fila += "<td style=width:100px>" + 'Por Kg' + "</td>";
                    } else {
                        fila += "<td style=width:100px>" + 'Por Unidada' + "</td>";
                    } 

                                      
                    
                    fila += "</tr>";

                    table.append(fila);
                }
            },
            'json'
        );

    });
    
    // Update order item 
    $(".btn-update-orderstatus").on('click', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var href = $(this).data('href');
        var orderstatus = $("#order_" + id).val();
        var posicion = href.lastIndexOf('/');
        var porcion = href.substring(0, posicion);
        window.location.href = porcion + "/" + orderstatus;

        //window.location.href = href;
        //window.location.href = porcion + "/" + shipment_quantity;
    });  

    
    
   
});