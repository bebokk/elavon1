{if $ok_info1 != ''}
	<div class="ok_info1"><div class="ok_info11"><span>{$ok_info1}</span></div></div>
{/if}
<div class="back">
	<a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}">
		<input type="button" class="button_look1" value="go back" />
	</a>
</div>
<div class="structure1">
	<form action="index.php?page={$page}&id1={$id1}&details={$details}" method="POST">
		<div class="header1"><span>Edit details for {$page_tab.name}</span></div>
		<div class="details1">
			<table class="list1_1" cellspacing="0">
				<tbody>
					{foreach from=$fields_in_use_tab1 key=id item=val}		
						{if $val == 'text'} 
							<tr>
								<td>
									<div class="details1_header">{$fields_in_use_tab2.$id}</div>
									<input class="input_look1" type="text" name="{$id}" value="{$page_tab.$id}" />
								</td>
							</tr>
						{elseif $val == 'textarea'} 
							<tr>
								<td>
									<div class="details1_header">{$fields_in_use_tab2.$id}</div>
									<textarea class="input_look1 tinymce" name="{$id}">{$page_tab.$id}</textarea>
								</td>
							</tr>
						{/if}
					{/foreach}
				</tbody>  
			</table>
		</div>
		<div class="save">
			<input class="button_look1" type="submit" name="save_details" value="save" />
		</div>
	</form>
	{include file="elements/pictures.tpl"}	
</div>
 