@extends('admin.template')

@section('content')


	<div class="response text-center">
		<div class="page-header">
			<h2 style="margin-top:10px" class="text-warning">
				<i style="marging-right:10px" class="fa fa-cogs"></i>
				AJUSTES / Configuraciones Generales <a href="{{action('Admin\ConfigController@edit', $config_quoteandsell['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
			</h2>
		</div>
		<div class="page-inputform">
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
        	<div class="tab-content">
				<div id="panel1" class="tab-pane active"><br>
					<div class="form-group">
			  			<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<h4 class="text-left text-primary" class="text-primary"><i style="margin-right:5px" class="far fa-building"></i></i> Datos de la Empresa </h4>
							</table>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<fieldset disabled>
									<label class="text-primary" for="company_name">Nombre de la Empresa:</label> 
									<input id="disabledTextInput" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_name }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_rif">Rif:</label> 
									<input id="disabledTextInput" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_rif }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_address">Dirección:</label> 
									<input id="disabledTextInput" type="textarea" class="form-control" Value= "{{ $config_quoteandsell->company_address }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_contact_phone">Telefóno Contacto:</label> 
									<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_phone }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_notification_email">Cuenta de Correo Para Notificaciones a Clientes:</label> 
									<input id="company_notification_email" type="email" class="form-control" Value= "{{ $config_quoteandsell->company_notification_email }}">
								</fieldset>
							</div>
							<div class="col-sm-6">
								<fieldset disabled>
									<label class="text-primary" for="company_contact_email">Cuenta de Correo Contacto (Pie de Pagina):</label> 
									<input id="company_contact_email" type="email" class="form-control" Value= "{{ $config_quoteandsell->company_contact_email }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_whatsapp">Cuenta Whatapps:</label> 
									<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_whatsapp }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary"for="company_instagram'">Cuenta Instagram:</label> 
									<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_instagram }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_twitter">Cuenta Twitter:</label> 
									<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_twitter }}">
								</fieldset>
								<fieldset disabled>
									<label class="text-primary" for="company_facebook">Cuenta FaceBook:</label> 
									<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_facebook }}">
								</fieldset>

							</div>
						</div>
					</div>       
 				</div>
				<div id="panel2" class="tab-pane fade"><br>
					<div class="form-group">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<h4 class="text-left text-primary" class="text-primary" ><i class="fas fa-cog"></i></i> Funcionabilidades Generales </h4>
							</table>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group"> 
										<fieldset disabled>
										<label class="text-primary" for="Active_site">Sitio Web Activo:</label> 
										<input type="checkbox" name="Active_site" {{ $config_quoteandsell->Active_site == 1 ? "checked='checked'" : '' }}>
										</fieldset>  
									</div>
									<div class="form-group"> 
										<fieldset disabled>
										<label class="text-primary" for="Active_store">Funciones Ventas / Cotizar Activos:</label> 
										<input type="checkbox" name="Active_store" {{ $config_quoteandsell->Active_store == 1 ? "checked='checked'" : '' }}>
										</fieldset>  
									</div>
									<div class="form-group">
										<fieldset disabled>
											<label class="text-primary" for="view_type_products">Vista Producto:  </label>
											{!! Form::radio('type', 'List', $config_quoteandsell->view_type_products=='List' ? true : false) !!} Lista 
											{!! Form::radio('type', 'Mosaico', $config_quoteandsell->view_type_products=='Mosaico' ? true : false) !!} Mosaico
										</fieldset>
									</div>
									<div class="form-group">
										<fieldset disabled>
											<label class="text-primary" for="view_type_scream">Vista Pantalla:  </label>
											{!! Form::radio('type', 'Full', $config_quoteandsell->view_type_products=='Full' ? true : false) !!} Pantalla Completa
											{!! Form::radio('type', 'ByCategory', $config_quoteandsell->view_type_products=='ByCategory' ? true : false) !!} Menu Categorias
										</fieldset>
									</div>
									<div class="form-group"> 
										<fieldset disabled>
											<label class="text-primary" for="Show_price_user_logout">Mostrar Precio Productos a usuarios sin iniciar sesion :</label> 
											<input type="checkbox" name="visible" {{ $config_quoteandsell->Show_price_user_logout == 1 ? "checked='checked'" : '' }}>
										</fieldset>  
									</div>
									<div class="form-group"> 
										<fieldset disabled>
											<label class="text-primary" for="DriveSell">Manejo de Vendedores :</label> 
											<input type="checkbox" name="DriveSell" {{ $config_quoteandsell->DriveSell == 1 ? "checked='checked'" : '' }}>
										</fieldset>  
									</div>
									<div class="form-group"> 
										<fieldset disabled>
											<label class="text-primary" for="DriveDealer">Manejo de Distribuidores/Mayoristas :</label> 
											<input type="checkbox" name="DriveDealer" {{ $config_quoteandsell->DriveDealer == 1 ? "checked='checked'" : '' }}>
										</fieldset>  
									</div>
									
								</div>
								<div class="col-sm-6">
									<fieldset disabled>
										<label class="text-primary" for="api_sms_key">Digaloya SMS api Key:</label> 
										<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->api_sms_key }}">
									</fieldset>
									<fieldset disabled>
										<label class="text-primary" for="text_notification_sms">Plantila de Notificacion via SMS:</label> 
										<input id="disabledTextInput" type="textarea" rows="3" class="form-control" Value= "{{ $config_quoteandsell->text_notification_sms }}">
									</fieldset>
									<fieldset disabled>
										<label class="text-primary" for="text_notification_email">Plantilla de Notificacion via email:</label> 
										<input id="disabledTextInput" type="textarea" rows="5" class="form-control" Value= "{{ $config_quoteandsell->text_notification_email }}">
									</fieldset><hr>
									@if(Auth::check())
										@can('IsCreator')
											<div class="form-group">
												<fieldset disabled>
													<label class="text-primary" for="TypeStore">Tipo Tienda:  </label>
													{!! Form::radio('TypeStore', 'autoparts', $config_quoteandsell->TypeStore=='autoparts' ? true : false) !!} Autopartes
													{!! Form::radio('TypeStore', 'fashionshop', $config_quoteandsell->TypeStore=='fashionshop' ? true : false) !!} Ropa/Modas
													{!! Form::radio('TypeStore', 'foodstore', $config_quoteandsell->TypeStore=='foodstore' ? true : false) !!} Alimentos
													{!! Form::radio('TypeStore', 'other', $config_quoteandsell->TypeStore=='other' ? true : false) !!} Otros 
												</fieldset>
											</div>
											<div class="form-group">
												<fieldset disabled>
													<label class="text-primary" for="modeFunction">Modo Funcionamiento:  </label>
													{!! Form::radio('modeFunction', 'quote', $config_quoteandsell->modeFunction=='quote' ? true : false) !!} Solo Cotizador
													{!! Form::radio('modeFunction', 'sell', $config_quoteandsell->modeFunction=='sell' ? true : false) !!} Solo Ventas
													{!! Form::radio('modeFunction', 'quoteandsell', $config_quoteandsell->modeFunction=='quoteandsell' ? true : false) !!} Cotizar/Vender
												</fieldset>
											</div>
											<div class="form-group">
												<fieldset disabled>
													<label class="text-primary" for="Confirmate_Sell_First_Pay">Requiere Confirmar y Procesar Pedido:  </label>
													{!! Form::radio('Confirmate_Sell_First_Pay', '1', $config_quoteandsell->Confirmate_Sell_First_Pay=='1' ? true : false) !!} Si
													{!! Form::radio('Confirmate_Sell_First_Pay', '0', $config_quoteandsell->Confirmate_Sell_First_Pay=='0' ? true : false) !!} No
												</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_qs_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_qs_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_qs_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_pay_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_pay_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_pay_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movaut_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movaut_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movaut_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movcpt_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movcpt_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movcpt_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_name_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_email_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_movil_1 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movshp_1_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_name_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_email_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_contact_movshp_movil_2 }}">
											</fieldset>
										</td>
										<td>
										<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->company_contact_movshp_2_enable == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
											<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_category_1 }}">
											</fieldset>
										</td>
										<td>
											<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_category_1 == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<label for="disabledTextInput">Clasificacion #2:</label>
										</td>
										<td>
											<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_category_2 }}">
											</fieldset>
										</td>
										<td>
											<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_category_2 == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<label for="disabledTextInput">Clasificacion #3:</label>
										</td>
										<td>
											<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_category_3 }}">
											</fieldset>
										</td>
										<td>
											<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_category_3 == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<label for="disabledTextInput">Clasificacion #4:</label>
										</td>
										<td>
											<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_category_4 }}">
											</fieldset>
										</td>
										<td>
											<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_category_4 == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
										</td>
									</tr>
									<tr>
										<td>
											<label for="disabledTextInput">Clasificacion #5:</label>
										</td>
										<td>
											<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_category_5 }}">
											</fieldset>
										</td>
										<td>
											<fieldset disabled>
												<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_category_5 == 1 ? "checked='checked'" : '' }}> 
											</fieldset>
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
										<fieldset disabled>
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_1 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_2 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_3 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_4 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_5 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_6 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_7 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_8 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_9 }}">
												<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->company_namecount_bank_10 }}">
											</fieldset>
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
										<fieldset disabled>
											<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_field_1 }}">
										</fieldset>
									</td>
									<td>
										<fieldset disabled>
											<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_field_1 == 1 ? "checked='checked'" : '' }}> 
										</fieldset>
									</td>
								</tr>	
								<tr>
									<td>
										<label for="disabledTextInput">Campo #2:</label>
									</td>
									<td>
										<fieldset disabled>
											<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_field_2 }}">
										</fieldset>
									</td>
									<td>
										<fieldset disabled>
											<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_field_2 == 1 ? "checked='checked'" : '' }}> 
										</fieldset>
									</td>
								</tr>
								<tr>
									<td>
										<label for="disabledTextInput">Campo #3:</label>
									</td>
									<td>
										<fieldset disabled>
											<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_field_3 }}">
										</fieldset>
									</td>
									<td>
										<fieldset disabled>
											<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_field_3 == 1 ? "checked='checked'" : '' }}> 
										</fieldset>
									</td>
								</tr>	
								<tr>	
									<td>
										<label for="disabledTextInput">Campo #4:</label>
									</td>
									<td>
										<fieldset disabled>
											<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_field_4 }}">
										</fieldset>
									</td>
									<td>
										<fieldset disabled>
											<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_field_4 == 1 ? "checked='checked'" : '' }}> 
										</fieldset>
									</td>
								</tr>
								<tr>	
									<td>
										<label for="disabledTextInput">Campo #5</label>
									</td>
									<td>
										<fieldset disabled>
											<input id="disabledTextInput" type="text" class="form-control" Value= "{{ $config_quoteandsell->name_field_5 }}">
										</fieldset>
									</td>
									<td>
										<fieldset disabled>
											<input type="checkbox" name="Activo" {{ $config_quoteandsell->enable_field_5 == 1 ? "checked='checked'" : '' }}> 
										</fieldset>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> 
			
		</div>
		 

	</div>
	<div class="text-center">  
        <p><a class="btn btn-warning" href="{{ route('dashboard.index') }}">
            <i class="fa fa-chevron-circle-left"></i> Regresar</a></p>
    </div> 
	
@stop



<!--
	

        <div class="page">
		  
		</div>
		
		<div class="page">
		  
        </div>
	-->
