<div class="wrapper">
	<div class="loading0"><input type="hidden" name="loading0" id="loading0" value="" /></div>
	<div class="popup0"></div>
	<div class="popup00"></div>
	<div class="body0">
		{include file="popups/save_changes.tpl"}	
		<div class="layout">
			<div class="header01">
				<div class="header01_2"></div>
				<div class="header01_1" style="background:transparent url('{$admin_logo1}') no-repeat center center;"><a href="index.php?page=structure&subpage=structure"></a></div>
				<div class="header01_2"></div>
				<div class="header01_3"><a href="index.php?page=structure&subpage=structure">{$settings_tab.46} Admin</a></div>
				<!--
				<div class="header01_2"></div>
				<div class="header01_4"><a href="./"></a></div>
				-->
				<div class="header01_2"></div>
				<div class="header01_right">
					<a class="header01_right0_1">
						<div class="header01_right0_1_1">
							<div class="header01_right0_1_1_1">
								<div class="header01_right0_1_1_1_1" style="background:transparent url('{$user_picture}') no-repeat center center;">
								</div>	
							</div>	
						</div>	
						<div class="header01_right0_1_2">
							<span class="header01_right0_1_2_1">Hi,&nbsp;<span class="header01_right0_1_2_name">{$session.user.name}</span></span>
						</div>	
						<div class="clear"></div>	
					</a>		
				</div>			
				<!--
				<div class="header01_1">Hi {$session.user.name} :)</div>	
				-->
			</div>
			<div class="content0">
				<div class="content0_1">
					{include file="elements/top_menu.tpl"}	
				</div>
				<div class="content0_2">
					<div class="content0_2_1">
						{include file="elements/sub_menu.tpl"}
					</div>
					<div class="content0_2_2">
						<div class="content0_2_2_1">
							{if $subpage != ''}	
								{include file="$subpage.tpl"}	
							{elseif $page != ''}	
								{include file="$page.tpl"}	
							{/if}
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>