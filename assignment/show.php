<?php include 'connect_postgresql.php';?>
<!DOCTYPE html>
<html lang="ja-jp">
<head>
	<title>グループ一覧</title>
	<meta http-equiv="Content-Language" content="ja">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery.session.js"></script>
</head>
<body>
	<div id="main">
		<div id="body">
			<div>
				<table class="title titleGroupOffice">
					<tbody>
						<tr style="background-color: transparent">
							<td class="formTitle b-none " style="width: 1020px;"><span id="lblTitle"><b>グループ一覧</b></span></td>
							<td class="btnGoto_Orange b-none">
								<form class="d-inline" method="post">
                                    <input type="button" id="btnUpdate" name="update" onclick="onClickedUpdate()" tabindex="1" style="width: 70px;height: 24px;border: none;" value="更新">
                                    <input type="button" name="close" id="btnClose" onclick="opener.closeWin()" tabindex="2" style="width: 80px;height: 24px;border: none;" value="閉じる">
                                </form>
								
							</td>
						</tr>
					</tbody>
				</table>
				<div class="btn-right">
					<input type="button" class="btn btn-xs" style="color: blue;" value="先頭"> <input type="button" class="btn btn-xs" style="color: blue;" value="前頁"> <input type="button" class="btn btn-xs" style="color: black; background-color: transparent; border-color: transparent;" value="1/1 頁"> <input type="button" class="btn btn-xs" style="color: blue;" value="次頁"> <input type="button" class="btn btn-xs" style="color: blue;" value="最終">

				</div>
			</div>
			<br> <br>
			<!-- 	Show -->
			<div id="GroupOffice">
				<div id="GroupOfficeList">
					<div id="UpdPlGroupOfficeList">
						<table id="infoTable">
							<thead>
								<tr>
									<th style="width: 20px;"></th>
									<th style="width: 150px;">担当者</th>
									<th style="width: 90px;">都道府県</th>
									<th style="width: 90px;">営業所<br>コード
									</th>
									<th style="width: 150px;">営業所名</th>
									<th style="width: 80px;">資格</th>
									<th style="width: 100px;">営業所カナ名</th>
									<th style="width: 90px;">電話番号</th>
									<th style="width: 400px;">住所</th>
								</tr>

							</thead>
							<tbody id="groupInforResults">
							
							</tbody>
						</table>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>

	<!-- 	<form name="form1" method="post" action="#" id="form1"></form> -->
	<!-- --jquery, bootstrap-- -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>

	$( document ).ready(function() {
	    var url ="get-info-office.php?groupid="+get_param('groupid');
	    $.get( url, function( data ) {
			$("#groupInforResults").html( data );
		});
	});
	
	$('#infoTable').on('click', 'tbody tr', function(event) {
		  $(this).addClass('highlight').siblings().removeClass('highlight');
		});
	
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
		
	 function onClickedUpdate() {
		var arrOffices =[];
		$( "#groupInforResults input:checkbox:checked" ).each(function() {
			   var row = $(this).parent().parent().children()[3];
			   var value = $(row).html();
			   arrOffices.push($.trim(value));
			    
		});

	       var sendInfo = {
	           GroupId: get_param('groupid'),
	           GroupFLG: get_param('groupflg'),
	           OfficeCds: arrOffices
	       };
	       opener.onResults(sendInfo);
	 };

	</script>
</body>
</html>
