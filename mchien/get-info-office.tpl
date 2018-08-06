{section name=content loop=$row}
<tr>
        <td><input type="checkbox" {if in_array($row[content][2],$array1)} checked{/if}></td>
		<td style=" text-align: left; word-wrap: break-word;">{$row[content][0]}</td>
 		<td style=" text-align: left; word-wrap: break-word;">{$row[content][1]}</td>
 		<td style="text-align: left; word-wrap: break-word;">{$row[content][2]}</td>
 		<td style=" text-align: left; word-wrap: break-word;">{$row[content][3]}</td>
 		<td style=" text-align: left; word-wrap: break-word;">{$row[content][4]}</td>
 		<td style=" text-align: left; word-wrap: break-word;">{$row[content][5]}</td>
 		<td style=" text-align: left; word-wrap: break-word;">{$row[content][6]}</td>
 		<td style="text-align: left; word-wrap: break-word;">{$row[content][7]}</td>
</tr>
{/section}
