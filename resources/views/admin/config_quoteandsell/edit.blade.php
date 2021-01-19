@extends('admin.template')

@section('content')

<div class="text-center">
	<div class="page-header">
		<h2><i tyle="margin-top:5px" class="fa fa-cogs"></i><i class="fa fa-shopping-cart"></i>
			AJUSTES / Configuraciones Generales <small>[Editar]</small>
		</h2>
	</div>
	@if (count($errors) > 0)
      @include('admin.partials.errors')
    @endif
  	<div class="page-inputform">
	    <form method="post" action="{{action('Admin\ConfigController@update', $config_quoteandsell)}}">
      		@csrf
      		<input name="_method" type="hidden" value="PUT">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#panel1">Generales</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel2">Funcionabilidades</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel3">Notificaciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel4">Clasificación Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel5">Botones de Pago</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel6">Bancos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#panel7">Campos Adicionales</a>
				</li>
			</ul>
			<div class="form-group">
				<div class="tab-content">
					<div id="panel1" class="tab-pane active"><br>
						<h4 class="text-left text-primary" class="text-primary"><i style="margin-right:5px" class="far fa-building"></i></i> Datos de la Empresa </h4>
						<div class="row">
							<div class="col-sm-6">
								<label class="text-primary" for="company_name">Nombre de la Empresa:</label> 
								<input id="disabledTextInput" name="company_name" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_name }}">
								<label class="text-primary" for="company_rif">Rif:</label> 
								<input id="disabledTextInput" name="company_rif" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_rif }}">
								<label class="text-primary" for="company_address">Dirección:</label> 
								<input id="disabledTextInput" name="company_address" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_address }}">
								<label class="text-primary" for="company_contact_phone">Telefóno Contacto:</label> 
								<input id="disabledTextInput" name="company_contact_phone" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_phone }}">
								<label class="text-primary" for="company_notification_email">Cuenta de Correo Para Notificaciones a Clientes:</label> 
								<input id="company_notification_email" name="company_notification_email" type="email" class="form-control" Value= "{{ $config_quoteandsell->company_notification_email }}">
							</div>
							<div class="col-sm-6">
								<label class="text-primary" for="company_contact_email">Cuenta de Correo Contacto (Pie de Pagina):</label> 
								<input id="company_contact_email" name="company_contact_email" type="email" class="form-control" Value= "{{ $config_quoteandsell->company_contact_email }}">
								<label class="text-primary" for="company_facebook">Cuenta Whatapps:</label> 
								<input id="disabledTextInput" name="company_whatsapp" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_whatsapp }}">
								<label class="text-primary"for="company_instagram">Cuenta Instagram:</label> 
								<input id="disabledTextInput" name="company_instagram" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_instagram }}">
								<label class="text-primary" for="company_twitter">Cuenta Twitter:</label> 
								<input id="disabledTextInput" name="company_twitter" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_twitter }}">
								<label class="text-primary" for="company_facebook">Cuenta FaceBook:</label> 
								<input id="disabledTextInput" name="company_facebook" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_facebook }}">
								
							</div>
						</div>
					</div><hr>
					<div id="panel2" class="tab-pane fade"><br>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary" ><i class="fas fa-cog"></i></i> Funcionabilidades Generales </h4>
								</table>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group"> 
											<label class="text-primary" for="Active_site">Sitio Web Activo:</label> 
											<input type="checkbox" name="Active_site" {{ $config_quoteandsell->Active_site == 1 ? "checked='checked'" : '' }}>
										</div>
										<div class="form-group"> 
											<label class="text-primary" for="Active_store">Funciones Ventas / Cotizar Activos:</label> 
											<input type="checkbox" name="Active_store" {{ $config_quoteandsell->Active_store == 1 ? "checked='checked'" : '' }}>
										</div>
										<div class="form-group">
											<label class="text-primary" for="view_type_products">Vista Producto:  </label>
											{!! Form::radio('type', 'List', $config_quoteandsell->view_type_products=='List' ? true : false) !!} Lista 
											{!! Form::radio('type', 'Mosaico', $config_quoteandsell->view_type_products=='Mosaico' ? true : false) !!} Mosaico
										</div>
										<div class="form-group">
											<label class="text-primary" for="view_type_scream">Vista Pantalla:  </label>
											{!! Form::radio('type', 'Full', $config_quoteandsell->view_type_products=='Full' ? true : false) !!} Pantalla Completa
											{!! Form::radio('type', 'ByCategory', $config_quoteandsell->view_type_products=='ByCategory' ? true : false) !!} Menu Categorias
										</div>
										<div class="form-group"> 
											<label class="text-primary" for="Show_price_user_logout">Mostrar Precio Productos a usuarios sin iniciar sesion :</label> 
											<input type="checkbox" name="Show_price_user_logout" {{ $config_quoteandsell->Show_price_user_logout == 1 ? "checked='checked'" : '' }}>
										</div>
										<div class="form-group"> 
											<label class="text-primary" for="DriveSell">Manejo de Vendedores :</label> 
											<input type="checkbox" name="DriveSell" {{ $config_quoteandsell->DriveSell == 1 ? "checked='checked'" : '' }}>
										</div>
										<div class="form-group"> 
											<label class="text-primary" for="DriveDealer">Manejo de Distribuidores/Mayoristas :</label> 
											<input type="checkbox" name="DriveDealer" {{ $config_quoteandsell->DriveDealer == 1 ? "checked='checked'" : '' }}>
										</div>
									</div>
									<div class="col-sm-6">
										<label class="text-primary" for="api_sms_key">Digaloya SMS api Key:</label> 
										<input id="disabledTextInput" name="api_sms_key" type="text" class="form-control" Value= "{{ $config_quoteandsell->api_sms_key }}">
										<label class="text-primary" for="text_notification_sms">Plantila de Notificacion via SMS:</label> 
										<input id="disabledTextInput" name="text_notification_sms" type="textarea" rows="3" class="form-control" Value= "{{ $config_quoteandsell->text_notification_sms }}">
										<label class="text-primary" for="text_notification_email">Plantilla de Notificacion via email:</label> 
										<input id="disabledTextInput" name="text_notification_email" type="textarea" rows="5" class="form-control" Value= "{{ $config_quoteandsell->text_notification_email }}">
										><hr>
										@if(Auth::check())
											@can('IsCreator')
												<div class="form-group">
													<label class="text-primary" for="TypeStore">Tipo Tienda:  </label>
													{!! Form::radio('TypeStore', 'autoparts', $config_quoteandsell->TypeStore=='autoparts' ? true : false) !!} Autopartes
													{!! Form::radio('TypeStore', 'fashionshop', $config_quoteandsell->TypeStore=='fashionshop' ? true : false) !!} Ropa/Modas
													{!! Form::radio('TypeStore', 'foodstore', $config_quoteandsell->TypeStore=='foodstore' ? true : false) !!} Alimentos
													{!! Form::radio('TypeStore', 'other', $config_quoteandsell->TypeStore=='other' ? true : false) !!} Otros 
												</div>
												<div class="form-group">
													<label class="text-primary" for="modeFunction">Modo Funcionamiento:  </label>
													{!! Form::radio('modeFunction', 'quote', $config_quoteandsell->modeFunction=='quote' ? true : false) !!} Solo Cotizador
													{!! Form::radio('modeFunction', 'sell', $config_quoteandsell->modeFunction=='sell' ? true : false) !!} Solo Ventas
													{!! Form::radio('modeFunction', 'quoteandsell', $config_quoteandsell->modeFunction=='quoteandsell' ? true : false) !!} Cotizar/Vender
												</div>
												<div class="form-group">
													<label class="text-primary" for="Confirmate_Sell_First_Pay">Requiere Confirmar y Procesar Pedido:  </label>
													{!! Form::radio('Confirmate_Sell_First_Pay', '1', $config_quoteandsell->Confirmate_Sell_First_Pay=='1' ? true : false) !!} Si
													{!! Form::radio('Confirmate_Sell_First_Pay', '0', $config_quoteandsell->Confirmate_Sell_First_Pay=='0' ? true : false) !!} No
												</div> 
											@endcan 
										@endif
									</div>
								</div>
								
							</div>       
						</div>
					</div>
					<div id="panel3" class="tab-pane fade"><br>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4  class="text-left text-primary" class="text-primary" ><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Registro Nuevo Cliente </h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_name_1" Value= "{{ $config_quoteandsell->company_contact_name_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_email_1" Value= "{{ $config_quoteandsell->company_contact_email_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movil_1" Value= "{{ $config_quoteandsell->company_contact_movil_1 }}">
											</td>
											<td>
												<input type="checkbox" name="company_contact_1_enable" {{ $config_quoteandsell->company_contact_1_enable == 1 ? "checked='checked'" : '' }}> 
											</td>
										</tr>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_name_2" Value= "{{ $config_quoteandsell->company_contact_name_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_email_2" Value= "{{ $config_quoteandsell->company_contact_email_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movil_2" Value= "{{ $config_quoteandsell->company_contact_movil_2 }}">
												
											</td>
											<td>
												<input type="checkbox" name="company_contact_2_enable" {{ $config_quoteandsell->company_contact_2_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary" ><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Registro Nueva Venta o Cotización </h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_name_1" Value= "{{ $config_quoteandsell->company_contact_qs_name_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_email_1" Value= "{{ $config_quoteandsell->company_contact_qs_email_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_movil_1" Value= "{{ $config_quoteandsell->company_contact_qs_movil_1 }}">
											</td>
											<td>
												<input type="checkbox" name="company_contact_qs_1_enable" {{ $config_quoteandsell->company_contact_qs_1_enable == 1 ? "checked='checked'" : '' }}> 
											</td>
										</tr>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_name_2" Value= "{{ $config_quoteandsell->company_contact_qs_name_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_email_2" Value= "{{ $config_quoteandsell->company_contact_qs_email_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_qs_movil_2" Value= "{{ $config_quoteandsell->company_contact_qs_movil_2 }}">
											</td>
											<td>
												<input type="checkbox" name="company_contact_qs_2_enable" {{ $config_quoteandsell->company_contact_qs_2_enable == 1 ? "checked='checked'" : '' }}> 
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary" ><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Pago Recibido</h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_name_1" Value= "{{ $config_quoteandsell->company_contact_pay_name_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_email_1" Value= "{{ $config_quoteandsell->company_contact_pay_email_1 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_movil_1" Value= "{{ $config_quoteandsell->company_contact_pay_movil_1 }}">
											</td>
											<td>
												<input type="checkbox" name="company_contact_pay_1_enable" {{ $config_quoteandsell->company_contact_pay_1_enable == 1 ? "checked='checked'" : '' }}> 
											</td>
										</tr>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_name_2" Value= "{{ $config_quoteandsell->company_contact_pay_name_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_email_2" Value= "{{ $config_quoteandsell->company_contact_pay_email_2 }}">
											</td>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_contact_pay_movil_2" Value= "{{ $config_quoteandsell->company_contact_pay_movil_2 }}">
											</td>
											<td>
												<input type="checkbox" name="company_contact_pay_2_enable" {{ $config_quoteandsell->company_contact_pay_2_enable == 1 ? "checked='checked'" : '' }}> 
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary" ><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Movimiento Autorizado</h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_name_1" Value= "{{ $config_quoteandsell->company_contact_movaut_name_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_email_1" Value= "{{ $config_quoteandsell->company_contact_movaut_email_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_movil_1" Value= "{{ $config_quoteandsell->company_contact_movaut_movil_1 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movaut_1_enable" {{ $config_quoteandsell->company_contact_movaut_1_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_name_2" Value= "{{ $config_quoteandsell->company_contact_movaut_name_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_email_2" Value= "{{ $config_quoteandsell->company_contact_movaut_email_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movaut_movil_2" Value= "{{ $config_quoteandsell->company_contact_movaut_movil_2 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movaut_2_enable" {{ $config_quoteandsell->company_contact_movaut_2_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary" ><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Movimiento Procesado</h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_name_1" Value= "{{ $config_quoteandsell->company_contact_movcpt_name_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_email_1" Value= "{{ $config_quoteandsell->company_contact_movcpt_email_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_movil_1" Value= "{{ $config_quoteandsell->company_contact_movcpt_movil_1 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movcpt_1_enable" {{ $config_quoteandsell->company_contact_movcpt_1_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_name_2" Value= "{{ $config_quoteandsell->company_contact_movcpt_name_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_email_2" Value= "{{ $config_quoteandsell->company_contact_movcpt_email_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movcpt_movil_2" Value= "{{ $config_quoteandsell->company_contact_movcpt_movil_2 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movcpt_2_enable" {{ $config_quoteandsell->company_contact_movcpt_2_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary"><i style="margin-right:5px" class="far fa-envelope"></i>-<i class="far fa-comment"></i> Notificar en caso de Orden o Pedido entregado al cliente</h4>
									<thead>
										<tr>
											<th>Contactar a:</th>
											<th>email</th>
											<th>Telefóno Movil</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_name_1" Value= "{{ $config_quoteandsell->company_contact_movshp_name_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_email_1" Value= "{{ $config_quoteandsell->company_contact_movshp_email_1 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_movil_1" Value= "{{ $config_quoteandsell->company_contact_movshp_movil_1 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movshp_1_enable" {{ $config_quoteandsell->company_contact_movshp_1_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_name_2" Value= "{{ $config_quoteandsell->company_contact_movshp_name_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_email_2" Value= "{{ $config_quoteandsell->company_contact_movshp_email_2 }}">
												
											</td>
											<td>
											
													<input id="disabledTextInput" type="text" class="form-control" name="company_contact_movshp_movil_2" Value= "{{ $config_quoteandsell->company_contact_movshp_movil_2 }}">
												
											</td>
											<td>
											
													<input type="checkbox" name="company_contact_movshp_2_enable" {{ $config_quoteandsell->company_contact_movshp_2_enable == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
																
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="panel4" class="tab-pane fade"><br>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary"><i style="margin-right:5px" class="fas fa-tasks"></i> Nombre de la Clasificacion Productos</h4>
									<thead>
										<tr>
											<th>Nr.</th>
											<th>Nombre</th>
											<th>Activo</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label for="disabledTextInput">Clasificacion #1:</label>
											</td>
											<td>
												
													<input id="disabledTextInput" type="text" class="form-control" name="name_category_1" Value= "{{ $config_quoteandsell->name_category_1 }}">
												
											</td>
											<td>
												
													<input type="checkbox" name="enable_category_1" {{ $config_quoteandsell->enable_category_1 == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
												<label for="disabledTextInput">Clasificacion #2:</label>
											</td>
											<td>
												
													<input id="disabledTextInput" type="text" class="form-control" name="name_category_2" Value= "{{ $config_quoteandsell->name_category_2 }}">
												
											</td>
											<td>
												
													<input type="checkbox" name="enable_category_2" {{ $config_quoteandsell->enable_category_2 == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
												<label for="disabledTextInput">Clasificacion #3:</label>
											</td>
											<td>
												
													<input id="disabledTextInput" type="text" class="form-control" name="name_category_3" Value= "{{ $config_quoteandsell->name_category_3 }}">
												
											</td>
											<td>
												
													<input type="checkbox" name="enable_category_3" {{ $config_quoteandsell->enable_category_3 == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
												<label for="disabledTextInput">Clasificacion #4:</label>
											</td>
											<td>
												
													<input id="disabledTextInput" type="text" class="form-control" name="name_category_4" Value= "{{ $config_quoteandsell->name_category_4 }}">
												
											</td>
											<td>
												
													<input type="checkbox" name="enable_category_4" {{ $config_quoteandsell->enable_category_4 == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
										<tr>
											<td>
												<label for="disabledTextInput">Clasificacion #5:</label>
											</td>
											<td>
												
													<input id="disabledTextInput" type="text" class="form-control" name="name_category_5" Value= "{{ $config_quoteandsell->name_category_5 }}">
												
											</td>
											<td>
												
													<input type="checkbox" name="enable_category_5" {{ $config_quoteandsell->enable_category_5 == 1 ? "checked='checked'" : '' }}> 
												
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="panel5" class="tab-pane fade"><br>
					</div>
					<div id="panel6" class="tab-pane fade"><br>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary"><i style="margin-right:5px" class="fas fa-money-check-alt"></i>Cuentas Bancarias para recibir pago de Clientes </h4>
									<thead>
										<tr>
											<th class="text-primary">Nombre del Banco y Nro Cuenta</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_1" Value= "{{ $config_quoteandsell->company_namecount_bank_1 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_2" Value= "{{ $config_quoteandsell->company_namecount_bank_2 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_3" Value= "{{ $config_quoteandsell->company_namecount_bank_3 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_4" Value= "{{ $config_quoteandsell->company_namecount_bank_4 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_5" Value= "{{ $config_quoteandsell->company_namecount_bank_5 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_6" Value= "{{ $config_quoteandsell->company_namecount_bank_6 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_7" Value= "{{ $config_quoteandsell->company_namecount_bank_7 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_8" Value= "{{ $config_quoteandsell->company_namecount_bank_8 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_9" Value= "{{ $config_quoteandsell->company_namecount_bank_9 }}">
												<input id="disabledTextInput" type="text" class="form-control" name="company_namecount_bank_10" Value= "{{ $config_quoteandsell->company_namecount_bank_10 }}">
												
											</td>	
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="panel7" class="tab-pane fade"><br>
						<div class="form-group">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<h4 class="text-left text-primary" class="text-primary"><i style="marging-right:5px" class="fas fa-plus"></i> Campos Adicionales</h4>
								<thead>
									<tr>
										<th>Nr. Campo</th>
										<th>Nombre</th>
										<th>Activo</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<label for="disabledTextInput">Campo #1:</label>
										</td>
										<td>
											
												<input id="disabledTextInput" type="text" class="form-control" name="name_field_1" Value= "{{ $config_quoteandsell->name_field_1 }}">
											
										</td>
										<td>
											
												<input type="checkbox" name="enable_field_1" {{ $config_quoteandsell->enable_field_1 == 1 ? "checked='checked'" : '' }}> 
											
										</td>
									</tr>	
									<tr>
										<td>
											<label for="disabledTextInput">Campo #2:</label>
										</td>
										<td>
											
												<input id="disabledTextInput" type="text" class="form-control" name="name_field_2" Value= "{{ $config_quoteandsell->name_field_2 }}">
											
										</td>
										<td>
											
												<input type="checkbox" name="enable_field_2" {{ $config_quoteandsell->enable_field_2 == 1 ? "checked='checked'" : '' }}> 
											
										</td>
									</tr>
									<tr>
										<td>
											<label for="disabledTextInput">Campo #3:</label>
										</td>
										<td>
											
												<input id="disabledTextInput" type="text" class="form-control" name="name_field_3" Value= "{{ $config_quoteandsell->name_field_3 }}">
											
										</td>
										<td>
											
												<input type="checkbox" name="enable_field_3" {{ $config_quoteandsell->enable_field_3 == 1 ? "checked='checked'" : '' }}> 
											
										</td>
									</tr>	
									<tr>	
										<td>
											<label for="disabledTextInput">Campo #4:</label>
										</td>
										<td>
											
												<input id="disabledTextInput" type="text" class="form-control" name="name_field_4" Value= "{{ $config_quoteandsell->name_field_4 }}">
											
										</td>
										<td>
											
												<input type="checkbox" name="enable_field_4" {{ $config_quoteandsell->enable_field_4 == 1 ? "checked='checked'" : '' }}> 
											
										</td>
									</tr>
									<tr>	
										<td>
											<label for="disabledTextInput">Campo #5</label>
										</td>
										<td>
											
												<input id="disabledTextInput" type="text" class="form-control" name="name_field_5" Value= "{{ $config_quoteandsell->name_field_5 }}">
											
										</td>
										<td>
											
												<input type="checkbox" name="enable_field_5" {{ $config_quoteandsell->enable_field_5 == 1 ? "checked='checked'" : '' }}> 
											
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>






				</div>
			</div>
			<div class="form-group">
                <button type="submit" name="Button" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('config_quoteandsell.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
    	</form> 
  	</div>
</div>  

@stop       
