<?php
include 'connect_postgresql.php';
$result = pg_query('select "PERSON", "STATE", "OFFICE_CD", "OFFICE_NAME", "QUALIFICATION", "OFFICE_SNAME", "PHONE", "ADDRESS"
                                        from public."M_OFFICE"');
while ($row = pg_fetch_row($result)) {
    echo "<tr>
									<td><input type=\"checkbox\"></td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[0]</td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[1]</td>
									<td style=\"text-align: left; word-wrap: break-word;\">$row[2]</td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[3]</td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[4]</td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[5]</td>
									<td style=\" text-align: left; word-wrap: break-word;\">$row[6]</td>
									<td style=\"text-align: left; word-wrap: break-word;\">$row[7]</td>
								</tr>";
}

?>
