{section name=content loop=$row}
<tr value="{trim($row[content][4])}">
    <td style="height: 47px;"><input onClick="clearText(this); return false;" style="width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;" type="button" value="クリア"></td>
    <td><input name="groupnm" style="width: 865px; text-align: left;" type="text" value="{trim($row[content][0])}"></td>
    <td><input name="grouporder" style="width: 100px; text-align: right;" type="number" value="{trim($row[content][1])}"></td>  
	<td><div style="width: 50px; text-align: center;" >{$row[content][3]}件</div></td>
    <td><button onClick="onEditItem(this);return false;" style="width: 100px; text-align: center;" type="text">営業所選択</button></td>
</tr>
{/section}
    
