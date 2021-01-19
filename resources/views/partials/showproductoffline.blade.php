<div class="container text-center">
    <div class="page-large">
        <div class="page-header"><hr>
            <h1>
                @php
        		    $icon = $config_quoteandsell->Icon_typestore;
      		    @endphp
                <i class="{{$icon}}"></i> {{$config_quoteandsell->product_typestore}}
            </h1>
        </div>    
        <hr>
        <h2 class="text-danger"><i class="fas fa-exclamation-triangle"></i>Modulo de {{$config_quoteandsell->Title_modeFunction}} en linea </h2>
        <h2 class="text-danger"><i class="fas fa-wrench"></i>Servicio en Mantenimineto</h2>
        <hr>
        <h4>En estos momentos nos encontramos realizando actividades de mantenimiento,</h4>
        <h4>a nuestro servicio de {{$config_quoteandsell->Label_modeFunction}} online</h4>
        <h4>El servicio sera restablecido a la brevedad, disculpe los inconvenientes causados</h4>
        <hr>
        <h3 class="text-success">En {{$config_quoteandsell->company_name}} innovamos constantemente, para presterle un mejor servicio</h3>
        
    </div>
</div>    