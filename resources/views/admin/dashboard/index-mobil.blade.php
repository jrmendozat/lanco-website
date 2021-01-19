@extends('admin.template')

@section('content')


<div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> {{$config_quoteandsell->company_name}} - Panel de Administración</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} al Panel de administración de tu tienda en línea.</h2><hr>

        <div class="row">
            
            <div class="col-md-3">
                <div class="panel">
                    
                      <i class="fa fa-list-alt icon-home"></i>
                     
                    
                    <div class="conteiner">
                        <div class="row">
                          <div class="col-md-3">
                              @if($config_quoteandsell->enable_category_1 == "1")
                                <a href="{{ route('category.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_1}}" class="btn btn-warning btn-home-admin-cat">#1</a>
                              @else
                                <fieldset disabled>
                                   <a href="#" class="btn btn-warning btn-home-admin-cat">#1</a>
                                </fieldset> 
                              @endif   
                          </div>  
                          <div class="col-md-3">
                            @if($config_quoteandsell->enable_category_2 == "1")
                              <a href="{{ route('categorytwo.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_2}}" class="btn btn-warning btn-home-admin-cat">#2</a>
                            @else
                                <fieldset disabled>
                                   <a href="#" class="btn btn-warning btn-home-admin-cat">#2</a>
                                </fieldset> 
                            @endif    
                          </div>
                          <div class="col-md-3">
                             @if($config_quoteandsell->enable_category_3 == "1")
                               <a href="{{ route('categorythree.index') }}" data-toggle="tooltip" title= "{{$config_quoteandsell->name_category_3}}" class="btn btn-warning  btn-home-admin-cat">#3</a>
                            @else
                                <fieldset disabled>
                                   <a href="#" class="btn btn-warning btn-home-admin-cat">#3</a>
                                </fieldset> 
                            @endif  
                          </div>
                         
                          <div class="col-md-3">
                             @if($config_quoteandsell->enable_category_4 == "1")
                              <a href="{{ route('categoryfour.index') }}" data-toggle="tooltip" title="{{$config_quoteandsell->name_category_4}}" class="btn btn-warning btn-home-admin-cat">#4</a>
                            @else
                                <fieldset disabled>
                                   <a href="#" class="btn btn-warning btn-home-admin-cat">#4</a>
                                </fieldset> 
                            @endif  
                           
                          </div>
                          
                        </div> 
                    </div>
                </div>    
            </div>
            
            
                    
             

            @if(Auth::check())
                @can('IsCreator')
                   
                @elsecan('IsSuperAdmin')
                   
                @elsecan('IsAdmin-A')
                    
                @elsecan('IsAdmin-B')
                   
                @elsecan('IsAdmin-C')
                   
                @elsecan('IsAdmin-D')
                   
                @elsecan('IsUser')
                    
                @elsecan('IsSell')
                    
                @Endcan
            @Endif

            @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>   
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                    
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                   
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                   
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                              <fieldset disabled>
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                              </fieldset>  
                            @break
                            @case("fashionshop")
                               <fieldset disabled>
                                 <i class="fas fa-shopping-basket  icon-home"></i>
                                 <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                               </fieldset>    
                            @break
                            @case("foodstore")
                               <fieldset disabled>
                                  <i class="fa fa-shopping-cart  icon-home"></i>
                                  <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                               </fieldset>    
                            @break
                            @default
                               <fieldset disabled>
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                               </fieldset>    
                            @endswitch
                       </div>
                    </div>
                   
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                    
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            @switch($config_quoteandsell->TypeStore)
                            @case("autoparts")
                                <i class="fas fa-dolly-flatbed  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">REPUESTOS</a>
                            @break
                            @case("fashionshop")
                                <i class="fas fa-shopping-basket  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">ARTICULOS</a>
                            @break
                            @case("foodstore")
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @break
                            @default
                                <i class="fa fa-shopping-cart  icon-home"></i>
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                            @endswitch
                       </div>
                    </div>
                    
                @Endcan
            @Endif

            @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                   
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                   
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                    
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                   
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                   
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                   
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                    
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-clipboard-list icon-home"></i>
                            @switch($config_quoteandsell->modeFunction)
                            @case("quote")
                                <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">COTIZACIONES</a>
                            @break
                            @case("sell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @break
                            @case("quoteandsell")
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">VENTAS/COTIZACIONES</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS/COTIZACIONES</a>
                                @endif
                            @break
                            @default
                                @if($config_quoteandsell->Confirmate_Sell_First_Pay)
                                    <a href="{{ route('updatecart-listorder')}}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                                @else
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTAS</a>
                                @endif
                            @endswitch
                        </div>
                    </div>
                    
                @Endcan
            @Endif

            @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                        </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-cubes icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('dataBusiness_List.index') }}" class="btn btn-warning btn-block btn-home-admin">DATA TIENDA</a>
                            </fieldset>
                        </div>
                    </div>
                @Endcan
                               
           @Endif
            
             
        </div><hr>

        <div class="row">
            
        @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                        </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                            <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-cogs icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES GENERALES</a>
                            </fieldset>
                        </div>
                    </div>
                @Endcan
                               
           @Endif

           @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                        </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                           <i class="fas fa-film icon-home"></i>
                           <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-film icon-home"></i>
                            <fieldset disabled>
                               <a href="{{ route('config_view_quoteandsell.index') }}" class="btn btn-warning btn-block btn-home-admin">CONTENIDO DINAMICO</a>
                            </fieldset>
                        </div>
                    </div>
                @Endcan
                               
           @Endif

            @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                           <i class="fas fa-calculator icon-home"></i>
                           <a href= "{{ route('financialadjustment.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                        </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                           <i class="fas fa-calculator icon-home"></i>
                           <a href= "{{ route('financialadjustment.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fas fa-calculator icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">AJUSTES DE PRECIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @Endcan
                               
           @Endif
            
         
            @if(Auth::check())
                @can('IsCreator')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                        </div>
                    </div>
                @elsecan('IsSuperAdmin')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                        </div>
                    </div>
                @elsecan('IsAdmin-A')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-B')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-C')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsAdmin-D')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsUser')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @elsecan('IsSell')
                    <div class="col-md-3">
                        <div class="panel">
                            <i class="fa fa-users  icon-home"></i>
                            <fieldset disabled>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                            </fieldset>
                        </div>
                    </div>
                @Endcan
                               
           @Endif
              
                    
        </div>
        
       
        
    </div>
    <hr>
    @if(Auth::check())
       @can('IsCreator')
            <div class="row text-center">
                <div class="col-md-3">
                </div>
                <div class="col-md-3 text-center">
                    <div class="panel">
                        <i class="fas fa-hand-holding-usd icon-home"></i>
                        <a href="{{ route('fastupdateproduct.index') }}" class="btn btn-warning btn-block btn-home-admin">Ajustes Express</a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="panel">
                        <i class="fas fa-folder-open icon-home"></i>
                        <a href="{{ route('filemanager.index') }}" class="btn btn-warning btn-block btn-home-admin">Manejo de Archivos</a>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div><hr>
        @Endcan  
        @can('superadmin')
            <div class="row text-center">
                <div class="col-md-3">
                </div>
                <div class="col-md-3 text-center">
                    <div class="panel">
                        <i class="fas fa-hand-holding-usd icon-home"></i>
                        <a href="{{ route('fastupdateproduct.index') }}" class="btn btn-warning btn-block btn-home-admin">Ajustes Express</a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="panel">
                        <i class="fas fa-folder-open icon-home"></i>
                        <a href="{{ route('filemanager.index') }}" class="btn btn-warning btn-block btn-home-admin">Manejo de Archivos</a>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div><hr>
        @Endcan  
       
    @Endif         
@stop
