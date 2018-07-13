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
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<!-- 	<link rel="stylesheet" href="/assets/css/index.css"> -->	
	<link rel="stylesheet" href="format.css">
	 <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
				$("#ddlGroup").change(function() {
					$.ajax({
						method:'POST',
						url:"getuse.php",
						data:{
							"ddlGroup":$("#ddlGroup").val(),
						},
						success:function(response){
							$('#groupInforResults').html(response);
						}	
					});
			});
				$('body').on("click","#groupInforResults tr",function(){
					var $b = $(this).children('td').html();
					$(this).css("background","yellow");
					$.ajax({
						method:'POST',
						url:"getOffice.php",
						data:{
							"groupInforResults":$("#groupInforResults").val(),
						},
						success:function(response){
							$('#officeInGroupResults').html(response);
						}	
					});
				});
				$('body').on("click","#officeInGroupResults tr",function(){
					var $b = $(this).children('td').html();
					$(this).css("background","yellow");
		})
		})
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
	                                 $res1 = pg_query($db,'select distinct "GROUP_FLG" from public."M_GROUP_OFFICE" 
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
						<input type="hidden" name="hdnSelectGroupId" id="hdnSelectGroupId" value="4">
						<input type="hidden" name="hdnSelectGroupFlg" id="hdnSelectGroupFlg" value="2">
						<input type="hidden" name="hdnScrollTop" id="hdnScrollTop" value="0">
					</div>
				</div>
				
			</div>
		</div>
		</div>
	<footer id="footer">
			<div class="float-right">更新日時 ： 2018/06/29 10:22:52 &emsp; 更新者 ： 0003
				&emsp; TIEN-TT</div>
		</footer>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
	$( document ).ready(function() {
		if(get_param('groupflg'))
			$( "#ddlGroup option" ).each(function( index, element ) {
		   		
		   		if($(this).attr('value').trim() == get_param('groupflg')){
		   		$(this).attr('selected','selected');
		   		refeshInfoGroup(get_param('groupflg'));
		   		return false;
		   		}
		  });
		else{
			var value = $("#ddlGroup option:first").val();
			refeshInfoGroup(value);
		}
	
	});

	function onClickedUpdate(){
		window.location.href = 'form2.php?groupflg=' + $('#ddlGroup option:selected').val();
	}
// 	$('#infoTable').on('click', 'tbody tr', function(event) {
// 		  $(this).addClass('highlight').siblings().removeClass('highlight');
// 		});
// 	$('#infoOfficeTable').on('click', 'tbody tr', function(event) {
// 		  $(this).addClass('highlight').siblings().removeClass('highlight');
// 		});
	function close_window() {
		  if (confirm("閉じる?")) {
		    close();
		  }
// 		   close();
		}

	function selectChanged(value){
		refeshInfoGroup(value);
	}

	function refeshInfoGroup(value){
// 		$.get( "ajax/get_info_group.php?groupflg="+value, function( data ) {
// 			  $( "#groupInforResults" ).html( data );
// 			  $( "#officeInGroupResults" ).html("");
// 			});
	}
	function onSelectedItem(id){
// 		var url= "ajax/get_office_in_group.php?groupid="+id+"& groupflg="+ $("#ddlGroup option:selected").val();
// 		$.get( url, function( data ) {
// 			  $( "#officeInGroupResults" ).html( data );
// 			});
	}
	 function get_param(param) {
	        var vars = {};
	        window.location.href.replace(location.hash, '').replace(
	        /[?&]+([^=&]+)=?([^&]*)?/gi,
	        function (m, key, value) { 
	            vars[key] = value !== undefined ? value : '';
	        }
	    );
	        return vars[param];
	    }
	</script>
	<div id="lbdictex_find_popup" class="lbexpopup hidden" style="position: absolute; top: 0px; left: 0px;"><div class="lbexpopup_top"><h2 class="fl popup_title">&nbsp;</h2><ul><li><a class="close_main popup_close" href="#">&nbsp;</a></li></ul><div class="clr"></div></div><div class="popup_details"></div><div class="popup_powered">abc</div></div>	
	<div id="lbdictex_ask_mark" class="hidden" style="position: absolute; top: 0px; left: 0px;"><a class="lbdictex_ask_select" href="#">&nbsp;</a></div>	
</body>
</html>
