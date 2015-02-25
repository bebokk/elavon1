<div class="structure_basic0"> 
	<div class="header1">
		<span>{$view_name1}</span>
		<div class="popup2_right_top">
			{if $session.page_settings_tab.adding == 1}
				<a class="header1_add" onclick="element_add({$id});">	
					<div class="button2">
						<div class="button2_1">
							<div class="button2_2">
								<div class="button2_3">
									<div class="button1_3_fog"></div>
									<span>create message</span>
								</div>
							</div>
						</div>
					</div>
				</a>
			{/if}
		</div>
	</div>
	<div class="list1" id="communication_list">	
	</div>
</div>
<input type="hidden" name="elements_list1_name" id="elements_list1_name" value="{$elements_list1_name}" />
<input type="hidden" name="elements_list1_type" id="elements_list1_type" value="{$elements_list1_type}" />