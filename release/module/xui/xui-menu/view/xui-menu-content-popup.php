<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>
<div class="xui menu_content">
	<div class="xui menu_item">
		<div class="xui menu_item_content">
			<div class="xui button -size-32x40 -circle -effect-ripple">
				<i class="material-icons">supervisor_account</i>
			</div>
		</div>
	</div>
	<div class="xui menu_item -submenu">
		<div class="xui menu_item_content">
			<div class="xui button -size-32x40 -circle -effect-ripple">
				<i class="material-icons">person</i>
			</div>
		</div>
		<div class="xui menu_submenu">
			<div class="xui menu_submenu_content">
				<div class="xui menu_item">
					<div class="xui menu_item_content">
						<a class="xui action -effect-ripple" href="#" onclick="return false;">
							<div class="xui action_content">
								<div class="xui action_left"></div>
								<div class="xui action_icon-left">
									<i class="material-icons">dashboard</i>
								</div>
								<div class="xui action_text">Action 1</div>
								<div class="xui action_right"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="xui menu_item -separator">
					<div class="xui menu_item_content">
					</div>
				</div>
				<div class="xui menu_item">
					<div class="xui menu_item_content">
						<a class="xui action -effect-ripple -toggle" href="#" data-xui-toggle="parent-2" onclick="return false;">
							<div class="xui action_content">
								<div class="xui action_left"></div>
								<div class="xui action_icon-left">
									<i class="material-icons">dashboard</i>
								</div>
								<div class="xui action_text">Action 2</div>
								<div class="xui action_right"></div>
								<div class="xui action_icon-right">
									<i class="material-icons">chevron_right</i>
								</div>
							</div>
						</a>
					</div>
					<div class="xui menu_submenu">
						<div class="xui menu_submenu_content">																		
							<div class="xui menu_item">
								<div class="xui menu_item_content">
									<a class="xui action -effect-ripple" href="#" onclick="return false;">
										<div class="xui action_content">
												<div class="xui action_left"></div>
												<div class="xui action_icon-left">
													<i class="material-icons">dashboard</i>
												</div>
												<div class="xui action_text">Level 1</div>
												<div class="xui action_right"></div>
										</div>
									</a>			
								</div>
							</div>
							<div class="xui menu_item">
								<div class="xui menu_item_content">
									<a class="xui action -effect-ripple -toggle" href="#" data-xui-toggle="parent-2" onclick="return false;">
										<div class="xui action_content">
											<div class="xui action_left"></div>
											<div class="xui action_icon-left">
												<i class="material-icons">dashboard</i>
											</div>
											<div class="xui action_text">Level 2</div>
											<div class="xui action_right"></div>
											<div class="xui action_icon-right">
												<i class="material-icons">chevron_right</i>
											</div>
										</div>
									</a>
								</div>															
								<div class="xui menu_submenu">
									<div class="xui menu_submenu_content">
										<div class="xui menu_item">
											<div class="xui menu_item_content">
												<a class="xui action -effect-ripple" href="#" onclick="return false;">
													<div class="xui action_content">
														<div class="xui action_left"></div>
														<div class="xui action_icon-left">
															<i class="material-icons">dashboard</i>
														</div>
														<div class="xui action_text">Destination 1</div>
														<div class="xui action_right"></div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>												
						</div>										
					</div>
				</div>
				<div class="xui menu_item -separator">
					<div class="xui menu_item_content">
					</div>
				</div>
				<div class="xui menu_item">
					<div class="xui menu_item_content">
						<a class="xui action -effect-ripple" href="#" onclick="return false;">
							<div class="xui action_content">
								<div class="xui action_left"></div>
								<div class="xui action_icon-left">
									<i class="material-icons">dashboard</i>
								</div>
								<div class="xui action_text">Action 3</div>
								<div class="xui action_right"></div>
							</div>
						</a>	
					</div>
				</div>
			</div>
		</div>				
	</div>
	<div class="xui menu_item">
		<div class="xui menu_item_content">
			<div class="xui button -size-32x40 -circle -effect-ripple">
				<i class="material-icons">work</i>
			</div>
		</div>
	</div>
</div>