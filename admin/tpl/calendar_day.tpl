<form action="index.php" name="calendar_day" method="GET">
	<input type="hidden" name="page" value="{$page}">
	<input type="hidden" name="subpage" value="{$subpage}">
	<div class="callendar_filetrs">
		<div class="callendar_filetrs_1">	
			<div class="list1_1_search1"><span>Filter: &nbsp;</span></div>
			<div class="list1_1_search2">
				<span>Show starting from</span>
				<input id="filetr_date" type="text" name="filetr_date" value="{$filetr_date}" class="list1_1_search2_111" />
			</div>		
			<div class="list1_1_search2">
				<a onclick="calendar_day.submit();" class="list1_1_search2_filter">	
					<div class="button3">
						<div class="button3_1">
							<div class="button3_2">
								<div class="button3_3">
									<div class="button1_3_fog"></div>
									<span>filter</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</a>			
			</div>	
		</div>
	</div>
</form>
<div class="callendar_day">
</div>
