<?php
$db = pg_connect("host=172.16.3.82 port=5432 dbname=Training user=postgres password=have@tript0Singapore");
// if(!$db) {
//     echo "Error : Unable to open database\n";
// } else {
//     echo "Opened database successfully\n";
// }
?>
<!DOCTYPE html>
<html lang="ja-jp">
<head>
	<meta charset="utf-8">
	<title>グループ一覧</title>
	<meta http-equiv="Content-Language" content="ja">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
				$("#ddlGroup").change(function() {
					$.ajax({
						method:'POST',
						url:"getUse.php",
						data:{
							"ddlGroup":$("#ddlGroup").val(),
						},
						success:function(response){
							$('#groupInforResults').html(response);
						}	
					});
			});
			 	$('#infoTable').on('click', 'tbody tr', function(event) {
		 		  $(this).css("background","#ffe7a0").siblings().css("background","");
// 				$('body').on("click","#groupInforResults tr",function(){
// // 					var $b = $(this).children('td').html();
// 						var table = document.getElementById("groupInforResults");
// 						var rows = table.getElementsByTagName("tr");
// 						for(i = 0; i < rows.length; i += 2){
// 							rows[i].style.background = 'white';
// 						}
// 							$(this).css("background","#ffe7a0");
							$.ajax({
							method:'POST',
							url:"getOffice.php",
							data:{
// 								"groupInforResults":$("#groupInforResults").val(),
								"groupInforResults":parseInt($(this).attr("id-get-office")),
							},
							success:function(response){
								console.log(response);
								$('#officeInGroupResults').html(response);
							}	
						});
					});
// 				$('body').on("click","#officeInGroupResults tr",function(){
// // 					var $b = $(this).children('td').html();
// 					var table = document.getElementById("officeInGroupResults");
// 				    var rows = table.getElementsByTagName("tr");
// 				    for (i = 0; i < rows.length; i++) {
// 				        rows[i].style.background = 'white';
// 				    }
// 					$(this).css("background","#ffe7a0");
					
// 		})
					$('#infoOfficeTable').on('click', 'tbody tr', function(event) {
                		 $(this).css("background","#ffe7a0").siblings().css("background","");
                		})
		})
		function onClickedUpdate(){
			window.location.href = 'update.php?groupflg=' + $('#ddlGroup option:selected').val();
		}
		function close_window() {
			  if (confirm("閉じる?")) {
			    close();
			  }
//	 		   close();
			}
		</script>
</head>
<body>
	<div id="main">
		<div id="body">
			<div>
				<table class="title titleGroupOffice">
					<tbody>
						<tr style="background-color: transparent">
							<td class="formTitle b-none " style="width: 1030px;">
								<span id="lblTitle"><b>グループ一覧</b></span>
							</td>
							<td class="btnGoto_Orange b-none">

								<div id="UpdPlBtnUpdate" class="d-inline">
									<a id="btnUpdate" href="#" onclick="onClickedUpdate();return false;" tabindex="1">更新</a>
								</div>
								<div id="UpdPlBtnClose" class="d-inline">
									<a id="btnClose" tabindex="2" href="#" onclick="close_window();return false;">閉じる</a>
								</div>
							</td>					
						</tr>
					</tbody>
				</table>
				<br>
				<table class="table table-bordered" style="width: 250px">
					<tbody>
						<tr>
							<td style="background-color: #bbddff">用途</td>
						</tr>
						<tr style="background-color: white">
							<td>
								<select name="ddlGroup" id="ddlGroup" style="width: 230px">
									<?php 
	                                 $res1 = pg_query($db,'select distinct "GROUP_FLG" from public."M_GROUP" 
                                                            order by "GROUP_FLG"');
	                                 while($row = pg_fetch_row($res1)){
	                                 echo "<option value ='$row[0]'>Use " .$row[0] ."</option>";
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
			
			<div id="GroupOffice">
				<div id="GroupOfficeList">
					<div id="UpdPlGroupOfficeList">
						<table id="infoTable">
							<thead>
								<tr>
									<th style="width: 900px;">グループ名</th>
									<th style="width: 90px;">表示順</th>
									<th style="width: 90px;">削除</th>
									<th style="width: 100px;">所属件数</th>
								</tr>
							</thead>
							<tbody id="groupInforResults">
							</tbody>
						</table>
						</div>
					</div>
				<br>
			
					<div id="GroupOfficeDetail">
					<p>
						<span id="lblInfoDetailGroup"><b>◆選択したグループに属する営業所情報</b></span>
					</p>
					<div id="UpdPlGroupOfficeDetail">
						<table id="infoOfficeTable">
							<thead>
								<tr>
									<th style="width: 90px;">営業所<br> コード
									</th>
									<th style="width: 250px;">営業所名</th>
									<th style="width: 120px;">資格</th>
									<th style="width: 425px;">住所</th>
									<th style="width: 120px;">営業担当</th>
									<th style="width: 175px;">販売会議出席場所</th>
								</tr>
							</thead>
							<tbody id="officeInGroupResults">
							
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		</div>
	<footer id="footer">
			<div class="float-right">更新日時 ： 2018/06/29 10:22:52 &emsp; 更新者 ： 0003
				&emsp; TIEN-TT</div>
		</footer>
</body>
</html>
