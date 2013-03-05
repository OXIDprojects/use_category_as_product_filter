[{$smarty.block.parent}]
	<tr>
	  <td class="edittext" width="120">
		  Ist Filter-Hauptkategorie
	  </td>
	  <td class="edittext" valign="top">
	      <input type="radio"[{if $edit->oxcategories__is_filter_parent_category->rawValue=='1'}] checked="checked"[{/if}] class="edittext" name="editval[oxcategories__is_filter_parent_category]" value="1" [{ $readonly }] /> Ja&nbsp;&nbsp;&nbsp;
	      <input type="radio"[{if $edit->oxcategories__is_filter_parent_category->rawValue=='0'}] checked="checked"[{/if}] class="edittext" name="editval[oxcategories__is_filter_parent_category]" value="0" [{ $readonly }] /> Nein
	  </td>
	</tr>