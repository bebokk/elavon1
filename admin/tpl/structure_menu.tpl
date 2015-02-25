<div class="structure_menu">
	{foreach from=$menu_boczne_tab key=id1 item=nic}						
		{foreach from=$menu_boczne_tab.$id1 key=poziom item=nic}							
			{foreach from=$menu_boczne_tab.$id1.$poziom key=poprzedni_poziom item=nazwa_kat_tlu}	
				{if $poprzedni_poziom < $poziom} <ul> {/if}							
				{if $poprzedni_poziom > $poziom} </li></ul> {/if}								
				{if $nazwa_kat_tlu != 'powrot'}
					{if $id1_get == $id1}
						<li><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}" onfocus="blur()"><span>{$nazwa_kat_tlu}</span></a>	
					{else}
						<li><a href="index.php?page={$page}&subpage={$subpage}&id1={$id1}" onfocus="blur()"><span>{$nazwa_kat_tlu}</span></a>								
					{/if}
				{/if}
				{if $poprzedni_poziom <= $poziom} </li> {/if}	
			{/foreach}	
		{/foreach}	
	{/foreach}		
	</ul>
</div>