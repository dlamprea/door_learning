
	<!-- Form -->
	<form class="form-horizontal margin-none" id="crearUsuario" action="crear_usuario" method="post" enctype="multipart/form-data" >		
		<!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
		
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading">Ingrese los datos el usuario</h4>
			</div>
			<!-- // Widget heading END -->
			
			<div class="widget-body">
			
				<!-- Row -->
				<div class="row">
				
					<!-- Column -->
                                <div class="col-md-6">
                                
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="firstname">Nombres</label>
                                                <div class="col-md-8"><input class="form-control" id="firstname" name="firstname" type="text" /></div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="lastname">Apellidos</label>
                                                <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" type="text" /></div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="cedula">Cedula</label>
                                                <div class="col-md-8"><input class="form-control" id="idenficacion" name="idenficacion" type="text" /></div>
                                        </div><div class="form-group">
                                                <label class="col-md-4 control-label" for="birthday">Fecha Nacimiento</label>                                                	
												<div class="col-md-8"><input type="text" id="birthday" name="birthday" class="form-control col-md-8" placeholder="____-__-__" />
												<span class="help-inline">Año-Mes-Día</span>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="foto">Foto</label>
                                                <div class="col-md-8 fileupload fileupload-new" data-provides="fileupload">
												  	<span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span> <br><input type="file"  name="imagen"class="margin-none" /></span>
												  	<span class="fileupload-preview"></span>
												  	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
												</div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                </div>
                                <!-- // Column END -->
                                
                                <!-- Column -->
                                <div class="col-md-6">
                                
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="password">Password</label>
                                                <div class="col-md-8"><input class="form-control" id="password" name="password" type="password" /></div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="confirm_password">Confirm password</label>
                                                <div class="col-md-8"><input class="form-control" id="confirm_password" name="confirm_password" type="password" /></div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                        <!-- Group -->
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="email">E-mail</label>
                                                <div class="col-md-8"><input class="form-control" id="email" name="email" type="email" /></div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="phone">Teléfono</label>
                                                <div class="col-md-8"><input class="form-control" id="phone" name="phone" type="text" /></div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label" for="celphone">Celular</label>
                                                <div class="col-md-8"><input class="form-control" id="celphone" name="celphone" type="text" /></div>
                                        </div>
                                        <!-- // Group END -->
                                        
                                </div>
                                <!-- // Column END -->
				</div>
				<!-- // Row END -->
				
				<hr class="separator" />
				
				
				
				<!-- Form actions -->
				<div class="form-actions">
					<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
					<button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
				</div>
				<!-- // Form actions END -->
				
			</div>
		</div>
		<!-- // Widget END -->
		
	</form>
	<script src="<?php echo site_url('common/theme/scripts/plugins/forms/jquery-validation/dist/jquery.validate.min.js')?>"></script>
	<script src="<?php echo site_url('assets/js/user.js')?>"></script>
