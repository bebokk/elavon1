<div class="project_manager0">
	<div class="project_manager01">
		<a onclick="save_positions();">save changes</a>
	</div>
</div>
<div class="project_manager">
	<div class="project_manager1">
		<div class="project_manager111">
			<div class="project_manager10">
				<div class="project_manager1_1">
					<div class="project_manager1_1_1">
						DISABLED
					</div> 
				</div> 
			</div>
			<div class="project_manager11">
				<div class="project_manager19">
					<div class="project_manager110_1">
						<div class="project_manager11_1">
							<div class="project_manager11_1_100">
								Not in use
							</div> 
						</div> 
					</div> 		
					<div class="project_manager110_2">
						<ul id="sortable1" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
							{foreach from=$elements0_tab.0 key=id item=val}
								<li id="{$elements0_tab.0.$id.elementtable}_{$id}" class="project_manager11_1_1">{$elements0_tab.0.$id.name}</li>	
							{/foreach}	
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</div>		
			<div class="clear"></div>
		</div>
	</div>
	<div class="project_manager2">
		<div class="project_manager222">
			<div class="project_manager10">
				<div class="project_manager1_1">
					<div class="project_manager1_1_1">
						ENABLED
					</div> 
				</div> 
			</div>
			<div class="project_manager100">
				<div class="project_manager11">
					<div class="project_manager19">
						<div class="project_manager110_1">
							<div class="project_manager11_1">
								<div class="project_manager11_1_100">
									Left
								</div> 
							</div> 
						</div> 
						<div class="project_manager110_2">
							<ul id="sortable2" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
								{foreach from=$elements0_tab.1 key=id item=val}
									<li id="{$elements0_tab.1.$id.elementtable}_{$id}" class="project_manager11_1_1">{$elements0_tab.1.$id.name}</li>	
								{/foreach}	
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="project_manager11">
					<div class="project_manager19">
						<div class="project_manager110_1">
							<div class="project_manager11_1">
								<div class="project_manager11_1_100">
									Right
								</div> 
							</div> 
						</div> 
						<div class="project_manager110_2">
							<ul id="sortable3" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
								{foreach from=$elements0_tab.2 key=id item=val}
									<li id="{$elements0_tab.2.$id.elementtable}_{$id}" class="project_manager11_1_1">{$elements0_tab.2.$id.name}</li>
								{/foreach}	
							</ul>
						</div> 
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>