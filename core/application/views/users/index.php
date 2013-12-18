<div class="innerLR">
	
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray widget-employees">

		<div class="form-actions" style="margin: 0;">		
			<a class="btn btn-primary btn-small  btn-success" href="create">
				<i class="icon-user icon-fixed-width"></i>
				Agregar usuario
			</a>
		</div>	
			
		<!-- Widget Heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons user"><i></i>Manage Employees</h4>
		</div>
		
		<!-- // Widget Heading END -->
		
		<div class="widget-body padding-none">
			
			<div class="row">
				<div class="col-md-4 listWrapper">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="text" class="form-control" value="" placeholder="Find someone ..">
								</div>
							</div>
							<select style="width: 100%;">
				               <optgroup label="Department">
				                   <option value="design">Design</option>
				                   <option value="development">Development</option>
				               </optgroup>
							</select>
						</form>
					</div>
					<span class="results"><?php echo $numero ?> Usuarios <i class="icon-circle-arrow-down"></i></span>
					<ul class="list unstyled">
					 <?php foreach ($usuarios as $usuario) {					 	
            				echo '<li id="'.$usuario->user_id.'">';
            				echo '<div class="media innerAll">';
            				echo "<div class='media-object pull-left thumb hidden-phone img_usuario_ul'><img src='".site_url('upload/'.$usuario->image)."' alt='Image' /></div>";            				
            				echo '<div class="media-body">';
							echo '<span class="strong">'.$usuario->first_name.'</span>';
							echo '<span class="muted">contact@mosaicpro.biz</span>';
							echo '<i class="icon-envelope"></i>';
							echo '<i class="icon-phone"></i>';
							echo '<i class="icon-skype"></i>';
							echo '</div>';
							echo '</div>';
						    echo '</li>';
        			}?>	
        			</ul>
				</div>
				<div class="col-md-8 detailsWrapper">
					<div class="ajax-loading hide">
						<i class="icon-spinner icon-spin icon-4x"></i>
					</div>
					<div class="innerAll">
						<div class="title">
							<div class="row">
								<div class="col-md-8">
									<h3 class="text-primary first_name"><?php echo $usuarios[0]->first_name ?></h3>
									<span class="muted">Podria ir el cusro o cargo</span>
								</div>
								<div class="col-md-4 text-right">
									<p class="muted">Num de cursos<a href=""><i class="icon-circle-arrow-right"></i></a></p>
									<div class="margin-bottom-none progress">
										<div class="count">30%</div>
										<div class="progress-bar count-outside" style="width: 30%;"></div>
									</div>
								</div>
							</div>
						</div>
						<hr/>
						<div class="body">
							<div class="row">
								<div class="col-md-4 overflow-hidden padding-none">
									<!-- Profile Photo -->
									<div class="center"><a href="" class="thumb inline-block profile_image"><img src="<?php echo site_url('upload/'.$usuarios[0]->image) ?>" alt="Profile" /></a></div>
									<div class="separator bottom"></div>
									<!-- // Profile Photo END -->
									<ul class="icons-ul">
										<li><i class="icon-envelope icon-li icon-fixed-width "></i><span class="profile_email"><?php echo $usuarios[0]->email ?></span></li>
										<li><i class="icon-phone icon-li icon-fixed-width "></i><span class="profile_phone"> <?php echo $usuarios[0]->phone ?></span></li>
										<li><i class="icon-mobile-phone icon-li icon-fixed-width "></i> <span class="profile_mobile_phone"> <?php echo $usuarios[0]->mobile_phone ?></span></li>
									</ul>
								</div>
								<div class="col-md-8 padding-none">
									<h5 class="strong">About</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
									<div class="row">
										<div class="col-md-4 padding-none">
											<h5 class="strong">Reports</h5>
											<a href="" class="btn btn-primary btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> June</a>
											<a href="" class="btn btn-default btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> May</a>
											<a href="" class="btn btn-default btn-small btn-block"><i class="icon-download-alt icon-fixed-width"></i> April</a>
											<div class="separator bottom"></div>
										</div>
										<div class="col-md-7 .col-md-offset-1">
											<h5 class="strong">Skills</h5>
											<div class="progress progress-mini count-outside-primary add-outside">
												<div class="count">100%</div>
												<div class="progress-bar progress-bar-primary" style="width: 100%;"></div>
												<div class="add">HTML</div>
											</div>
											<div class="progress progress-mini count-outside-primary add-outside">
												<div class="count">90%</div>
												<div class="progress-bar progress-bar-primary" style="width: 90%;"></div>
												<div class="add">CSS</div>
											</div>
											<div class="progress progress-mini count-outside-primary add-outside">
												<div class="count">93%</div>
												<div class="progress-bar progress-bar-primary" style="width: 93%;"></div>
												<div class="add">jQuery</div>
											</div>
											<div class="progress progress-mini count-outside-primary add-outside">
												<div class="count">79%</div>
												<div class="progress-bar progress-bar-primary" style="width: 79%;"></div>
												<div class="add">PHP</div>
											</div>
											<div class="progress progress-mini count-outside add-outside">
												<div class="count">20%</div>
												<div class="progress-bar" style="width: 20%;"></div>
												<div class="add">WP</div>
											</div>
											<div class="separator bottom"></div>
										</div>
									</div>
									<h5 class="text-uppercase strong text-primary"><i class="icon-group text-regular icon-fixed-width"></i> MosaicPro <span class="text-lowercase strong padding-none">Team</span> <span class="text-lowercase padding-none">(2 people)</span></h5>
									<ul class="team">
										<li><span class="crt">1</span><span class="strong">Adrian Demian</span><span class="muted">Senior Designer</span></li>
										<li><span class="crt">2</span><span class="strong">Laza Bogdan</span><span class="muted">Senior Developer</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- // Widget END -->
	</div>
	
</div>	
 <script src="<?php echo site_url('common/theme/scripts/plugins/forms/jquery-validation/dist/jquery.validate.min.js')?>"></script>		
<script src="<?php echo site_url('assets/js/user.js')?>"></script>
