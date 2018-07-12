<?php 
$db = pg_connect("host=localhost port=5432 dbname=training user=postgres password=have@tript0Singapore");
// if(!$db) {
//     echo "Error : Unable to open database\n";
// } else {
//     echo "Opened database successfully\n";
// }
?>
<html>
<head>
	<title>Assignment</title>
</head>
<body>
	<div id="main">
		<div id="body">
			<div>
				<table border="1">
					<tbody>
						<tr>
							<td>
								<span><b>グループ一覧</b></span>
							</td>
							<td>
								<div>
									<a id="btnUpdate" href="#">更新</a>
									
								</div>
								<div>
									<a id="btnClose" href="#" onclick="close_window();return false;">閉じる</a>
								</div>
							</td>							
						</tr>
					</tbody>
				</table>
				<br>
				<table border="1" style="width: 250px">
					<tbody>
						<tr>
							<td style="background-color: #bbddff">使用する</td>
						</tr>
						<tr style="background-color: white">
							<td>
								<select name="dllGroup" id="dllGroup" style="width: 230px" onchange = "selectChanged(this.value)">
									<?php 
	                                 $ret = pg_query($db,'select distinct "GROUP_FLG" from public."M_GROUP_OFFICE" 
                                                            order by "GROUP_FLG"');
	                                 while($row = pg_fetch_row($ret)){
	                                 echo "<option value =''>Use " .$row[0] ."</option>";
	                                 }
	                               ?>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<!-- Show -->
			
			<div>
				<div>
						<table border="1">
							<thead>
								<tr>
									<th style="width: 900px;">グループ名</th>
									<th style="width: 90px;">表示順</th>
									<th style="width: 90px;">削除</th>
									<th style="width: 100px;">所属件数</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$ret = pg_query($db, 'select "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG", count("M_GROUP_OFFICE"."OFFICE_CD") 
	                                                     from public."M_GROUP" inner join public."M_GROUP_OFFICE"
	                                                     on "M_GROUP"."GROUP_ID" = "M_GROUP_OFFICE"."GROUP_ID"
	                                                     group by "M_GROUP"."GROUP_NM", "M_GROUP"."GROUP_ORDER", "M_GROUP"."DEL_FLG"');
							while($row = pg_fetch_row($ret)){
								echo 
								"<tr>
									<td>$row[0]</td>
									<td>$row[1]</td> 
									<td>"; ?>
									<?php 
									if($row[2] == 1)
									       echo '<img src="https://www.zfshare.com/theme/Template-3/img/green_ticks.gif" width="20">';
									else
									    echo '';
									?>
							<?php 
								echo "</td>
								    <td>$row[3]</td>
								</tr>";
							}?>
							</tbody>
						</table>
					</div>
				<br>
			
					<div>
					<p>
						<span><b>◆選択したグループに属する営業所情報</b></span>
					</p>
					<div>
						<table border="1">
							<thead>
								<tr>
									<th style="width: 90px;">営業所<br>コード</th>
									<th style="width: 250px;">営業所名</th>
									<th style="width: 120px;">資格</th>
									<th style="width: 425px;">住所</th>
									<th style="width: 120px;">営業担当</th>
									<th style="width: 175px;">販売会議出席場所</th>
								</tr>
							</thead>
							<tbody id="officeInGroupResults">
								<?php 
								$res = pg_query($db, 'select "OFFICE_CD", "PERSON", "QUALIFICATION", "ADDRESS", "OFFICE_SNAME", "STATE"
	                                                   from public."M_OFFICE"');
								while($row = pg_fetch_row($res)) {
								    echo "<tr>
									<td>$row[0]</td>
									<td>$row[1]</td>
									<td>$row[2]</td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>$row[5]</td>
								</tr>";
								}
								?>
							</tbody>
						</table>
						<input type="hidden" value="4"> 
						<input type="hidden" value="2"> 
						<input type="hidden" value="0">
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<footer>
			<div>更新日時 : 2018/06/29 10:22:52 &emsp; 更新者 : 0003
				&emsp; TIEN-TT</div>
		</footer>
</body>
</html>
