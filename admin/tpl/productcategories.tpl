{if $details != ''}
	{include file="structure_details.tpl"}	
{else}
	<div class="structure0">
		<div class="structure0_1">
			<div class="header1"><a href="index.php?page={$page}&subpage={$subpage}"><span>Site structure</span></a></div>
			{include file="structure_menu.tpl"}	
		</div>
		<div class="structure0_2">
			<div class="structure0_2_1">
				<div class="header1"><span>Add new site</span></div>
				<div class="details1 structure_table1">			
					<form action="index.php?page={$page}&subpage={$subpage}&id1={$id1}" method="POST">
						<span>&nbsp;Site name</span>
						<input type="text" name="name" value="" />
						<input type="submit" name="add_element1" value="add site" />
					</form>
				</div>
			</div>
			<div class="structure0_2_2">
				<div class="header1"><span>List of sites for site</span></div>
				<div class="list1">
					<table class="list1_1" cellspacing="0">
						<thead>
							<tr class="list1_1_sort">
								<td style="width:30px;" class="tcenter"><a href=""><span>&nbsp;</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>move</span></a></td>
								<td class="tcenter"><a href=""><span>name</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>edit</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>delete</span></a></td>
							</tr>
						</thead>						
						<input type="hidden" id="parent_id" name="parent_id" value="{$id1}" />
						<tbody id="sortable" class="structure_table1">
							{php} $i=0; {/php}
							{foreach from=$pages_tab key=id item=val}		
								{php} $i++; {/php}
								<tr class="elemstr" id="elemstr_{$id}" class="ui-state-default">
									<td class="tright list1_1_1 list1_1_10"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$id}">{php} echo $i; {/php}.</a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$id}"><img src="images/ico/arrow-move.png" /></a></td>
									<td class="tleft list1_1_1"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$id}"><span>{$pages_tab.$id.name}</span></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$id}"><img src="images/ico/pencil.png" /></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}&delete={$id}"><img src="images/ico/cross.png" /></a></td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
{/if}