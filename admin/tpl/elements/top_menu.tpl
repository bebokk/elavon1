<div class="menu1">
	<ul>
		<!--
		<li><a href="index.php?page=home"><span>Home</span></a></li>
		<li><a href="index.php?page=structure"><span>Structure</span></a></li>
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=newsletter"><span>Newsletter</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
		{foreach from=$main_menu key=id item=val}			
			{if $page == $id}
				<li class="menu1_1 menu1_ul_li_hover menu10_{$id}">
			{else}
				<li class="menu1_1 menu10_{$id}">			
			{/if}
				<a href="index.php?page={$id}&subpage={$main_menu1.$id}">
					<div class="ico_menu" style="background:transparent url('{$main_menu2.$id}') no-repeat center center;"></div>
					<span>{$val}</span>
				</a>
			</li>
		{/foreach}
		<li class="menu1_1">
			<a href="index.php?page=logout">
				<div class="ico_menu" style="background:transparent url('css/menu/logout.png') no-repeat center center;"></div>
				<span>Logout</span>
			</a>
		</li>
	</ul>
</div>