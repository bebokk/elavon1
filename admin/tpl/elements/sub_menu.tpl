<div class="menu2">
	<ul>	
		{foreach from=$sub_menu.$page key=id item=val}				
			{if $id == $subpage}
				<li class="menu1_1 menu10_{$id} menu2_ul_li_selected"><a href="index.php?page={$page}&subpage={$id}"><span>{$val}</span></a></li>
			{else}
				<li class="menu1_1 menu10_{$id}"><a href="index.php?page={$page}&subpage={$id}"><span>{$val}</span></a></li>
			{/if}
		{/foreach}
		<!--
		<li><a href="index.php?page=home"><span>Home</span></a></li>
		<li><a href="index.php?page=structure"><span>Structure</span></a></li>
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=newsletter"><span>Newsletter</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
		<!--
		<li class="menu2_ul_li_selected"><a href="index.php?page=structure"><span>{$page_name}</span></a></li>
		-->
		<!--
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=emails_templates"><span>Emails templates</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
	</ul>
</div>