{if $cesh_pages1_name != ''}	
	<div class="stats_main1"> 
		<span>Selected page: <a target="_blank" href="../{$cesh_pages1_name}">{$cesh_pages1_name}</a></span>
	</div>
{/if}
<div class="stats_main"> 
	<div class="stats_main1"> 
		<div class="structure_basic0"> 
			<div class="header1">
				<span>Traffic on webstie from {$date1} to {$date2}</span>
			</div>
			<div class="list1">	
				<table class="list1_1" cellspacing="0">	
					<thead>	
						<tr>
							<td>
								<form name="stats_main_form" action="index.php?page=stats_main&subpage=stats_pages_main" method="POST"> 
									<div class="list1_1_search2">
										<span>Date from</span><input type="text" id="date1" class="list1_1_search2_1" name="date1" value="{$date1}" />
										<span>Date to</span><input type="text" id="date2" class="list1_1_search2_1" name="date2" value="{$date2}" />
										<span>Page</span>				
										<select name="pageid2" class="list1_1_search2_1" style="width:600px;">
											<option value=""></option>
											{foreach from=$cesh_pages_tab key=id item=val}	
												{if $id == $pageid2}
													<option selected value="{$id}">{$val}</option>
												{else}
													<option value="{$id}">{$val}</option>
												{/if}
											{/foreach}		
										</select>										
									</div>
									<div class="list1_1_search2">
										<a onclick="stats_main_form.submit();" class="list1_1_search2_filter">	
											<div class="button3">
												<div class="button3_1">
													<div class="button3_2">
														<div class="button3_3">
															<div class="button1_3_fog"></div>
															<span>search</span>
														</div>
													</div>
												</div>
											</div>
											<div class="clear"></div>
										</a>
									</div>
								</form>
							</td>
						</tr>
					</thead> 
					<tbody class="structure_table1">
						<tr>
							<td>						
								<div id="container" style="min-width: 310px; height: 550px; margin: 0 auto"></div>
							</td>
						</tr>
					</tbody>
				</table>	
			</div>
		</div>
	</div> 
</div> 