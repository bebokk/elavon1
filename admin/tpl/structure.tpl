{if $details != ''}
	{include file="structure_details.tpl"}	
{else}
	<div class="structure0">
		<div class="structure0_1">
			<div class="header1"><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}"><span>{$trans_tab.1.1}</span></a></div>
			{include file="structure_menu.tpl"}	
		</div>
		<div class="structure0_2">
			<div class="structure0_2_1">
				<div class="header1"><span>{$trans_tab.1.2}</span></div>
				<div class="details1 structure_table1">			
					<form action="index.php?page={$page}&subpage={$subpage}&id1={$id1}" method="POST">
						<span class="text10_1">&nbsp;{$trans_tab.1.3}</span>
						<input class="input10_1" type="text" name="name" value="" />
						<input class="submit10_1" type="submit" name="add_element1" value="{$trans_tab.1.4}" />
					</form>
				</div> 
			</div>
			<div class="structure0_2_2">
				<div class="header1"><span>{$trans_tab.1.14}</span></div>
				<div class="list1">
					<table class="list1_1" cellspacing="0">
						<thead>
							<tr class="list1_1_sort">
								<td style="width:30px;" class="tcenter"><a href=""><span>&nbsp;</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>{$trans_tab.1.5}</span></a></td>
								<td class="tcenter"><a href=""><span>{$trans_tab.1.6}</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>{$trans_tab.1.7}</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span>{$trans_tab.1.8}</span></a></td>
							</tr>
						</thead>						
						<input type="hidden" id="parent_id" name="parent_id" value="{$id1}" />
						<tbody id="sortable" class="structure_table1">
							{php} $i=0; {/php}
							{foreach from=$pages_tab key=id item=val}		
								{php} $i++; {/php}
								<tr class="elemstr" id="elemstr_{$id}" class="ui-state-default">
									<td class="tright list1_1_1 list1_1_10"><a href="index.php?page={$page}&id1={$id1}&details={$id}">{php} echo $i; {/php}.</a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&id1={$id1}&details={$id}"><img src="images/ico/arrow-move.png" /></a></td>
									<td class="tleft list1_1_1"><a href="index.php?page={$page}&id1={$id1}&details={$id}"><span>{$pages_tab.$id.name}</span></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&id1={$id1}&details={$id}"><img src="images/ico/pencil.png" /></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page={$page}&id1={$id1}&delete={$id}"><img src="images/ico/cross.png" /></a></td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
{/if}