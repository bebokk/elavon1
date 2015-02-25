{if $confirm != ''}
	<div class="ok_info1"><div class="ok_info11"><span>{$confirm}</span></div></div>
{/if}
<div class="stats_main"> 
	<div class="stats_main1"> 
		<div class="structure_basic0"> 
			<div class="header1">
				<span>Send email by newsletter</span>
			</div>
			<div class="list1">	
				<form action="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$details}" method="POST">
					<table class="list1_1" cellspacing="0">	
						<tbody class="structure_table1">
							<tr>
								<td>		
									<span>Send to</span>
									<select name="send_to">
										{foreach from=$products_tab key=id item=val}									
											<option value="{$id}">{$val}</option>
										{/foreach}
									</select>
									<br>
									<span>Next action</span>
									<select name="next_action">
										{foreach from=$tickets_states_tab key=id item=val}									
											<option value="{$id}">{$val}</option>
										{/foreach}
									</select>
									<br>
									<span>Next action date</span>
									<input type="text" name="next_action_date" value="" />
									<br>
									<span>Title</span>
									<input type="text" class="input_look1" name="title" value="{$title}" />				
									<br>
									<span>Content</span><br>
									<textarea class="input_look1 tinymce" name="content">{$content}</textarea>
									<input class="button_look1" type="submit" name="send_test_email" value="Send test email" />
									<input class="button_look1" type="submit" name="send_emails" value="send emails" />
								</td>
							</tr>
						</tbody>
					</table>	
				</form>	
			</div>
		</div>
	</div> 
</div> 