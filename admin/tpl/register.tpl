<form action="index.php?page={$page}&subpage={$subpage}" method="post" id="register1">
	<div class="register">
		<div class="strona_opisowa box001 landlord1_height">	
			<div class="register1">	
				<div class="register1_1">
					{if $confirm != ''}
						<div class="confirm">	
							<span>{$confirm}</span>
						</div>	
					{/if}
					<table cellspacing="0" cellpadding="0">	
						<tr><td><span class="register1_1_text">Name</span><span class="register1_1_star">*</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="text" name="name" value="" /></td></tr>
						<tr><td><span class="register1_1_text">Register as</span><span class="register1_1_star">*</span></td></tr>
						<tr><td>
							<select class="register1_1_inputtext" name="type" />
								<option value=""></option>
								{foreach from=$user_types_tab key=id item=val}						
									{if $id != 1 AND $id != 6}
										<option value="{$id}">{$val}</option>
									{/if}
								{/foreach}
							</select>
						</td></tr>
						<tr><td><span class="register1_1_text">E-mail</span><span class="register1_1_star">*</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="text" name="email" value="" /></td></tr>		
						<tr><td><span class="register1_1_text">E-mail confirmation</span><span class="register1_1_star">*</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="text" name="email1" value="" /></td></tr>			
						<tr><td><span class="register1_1_text">Password</span><span class="register1_1_star">*</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="password" name="pass" value="" /></td></tr>			
						<tr><td><span class="register1_1_text">Password confirmation</span><span class="register1_1_star">*</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="password" name="pass1" value="" /></td></tr>		
						<tr><td><span class="register1_1_text">Business name</span></td></tr>
						<tr><td><input class="register1_1_inputtext" type="text" name="business_name" value="" /></td></tr>			
						<tr>
							<td>
								<input onclick="register1();" class="register1_1_inputsubmit" type="button" name="register_submit" value="REGISTER" />
								<input id="register_yes" type="hidden" name="register_yes" value="1" />
							</td>
						</tr>			
					</table>
				</div>
			</div>	
			<div class="register2">	
				<div class="so_1">	
					<h1>{$descriptive_tab.name}</h1>
				</div>
				<div class="so_2">
					<div class="so_2_1">
						<span>						
							{$descriptive_tab.description}
						</span>				
					</div>
				</div>
			</div>
		</div>	
	</div>	
</form>	

