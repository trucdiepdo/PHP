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
	<title>グループ一覧</title>
	<meta http-equiv="Content-Language" content="ja">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
	<div id="main">
		<div id="body">
			<div>
				<table class="title titleGroupOffice">
					<tbody>
						<tr style="background-color: transparent">
							<td class="formTitle b-none " style="width: 1030px;"><span id="lblTitle"><b>グループ一覧</b></span></td>
							<td class="btnGoto_Orange b-none" width="170px">

								<div id="UpdPlBtnUpdate" class="d-inline">
									<a id="btnUpdate" href="#" onclick="submitData()" tabindex="1">更新</a>
								</div>
								<div id="UpdPlBtnClose" class="d-inline">
									<a id="btnClose" onclick="onBack()" tabindex="2" href="#">閉じる</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br> <br>
			<button onclick="setMark()" type="button" class="btn btn-outline-secondary btn-sm">再付番</button>
			<button onclick="addRow()" type="button" class="btn btn-outline-secondary btn-sm">行追加</button>
			<button onclick="insertRow()" type="button" class="btn btn-outline-secondary btn-sm">行挿入</button>
			<button onclick="deleteRow()" type="button" class="btn btn-outline-secondary btn-sm">行削除</button>
			<!-- 	Show -->
			<div id="GroupOffice">
				<div id="GroupOfficeList">
					<div id="UpdPlGroupOfficeList">
						<form id="formInfo" action="#">
							<table id="infoTable">
								<thead>
									<tr>
										<th style="width: 50px;"></th>
										<th style="width: 865px;">グループ名</th>
										<th style="width: 100px;">表示順</th>
										<th style="width: 150px;" colspan="2">所属営業所</th>
									</tr>
								</thead>
								<tbody id="groupInforResults">
								<?php 
								
	                               ?>
								<tr value="getNewId();" class="d-none">
									<td><input onclick="clearText(this); return false;" style="width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;" type="button" value="クリア"></td>
									<td><input name="groupnm" style="width: 865px; text-align: left;" type="text" value=""></td>
									<td><input name="groupoder" style="width: 100px; text-align: right;" type="number" value=""></td>
									<td><div style="width: 50px; text-align: center;">1篁�</div></td>
									<td><button onclick="onEditItem(this);return false;" style="width: 100px; text-align: center;  word-wrap: break-word;" type="text">営業所選択</button></td>
								</tr>
								</tbody>
								</table>
						</form>
					</div>
				</div>
				<br>
			</div>
		</div>
		<footer id="footer">
			<div class="float-right">更新日時 ：  <?php echo date('Y/m/d H:i:s');?>  更新者 ： 0003 TIEN-TT</div>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script type="text/javascript">
	var arrGroupId = [];
	var originArrGroupId;
	var groupflg=get_param('groupflg');

	$( document ).ready(function() {
	    var url ="ajax/get_update_info_group.php?groupflg="+groupflg;
	    $.get( url, function( data ) {
			$( "#groupInforResults" ).html( data );
			$( "#infoTable tbody tr" ).each(function( index, element ){
				arrGroupId.push($(this).attr('value'));
			});
			originArrGroupId=arrGroupId.slice();
			console.log(originArrGroupId);
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
	function close_window() {
		  if (confirm("閉じる?")) {
		    close();
		  }
		}

	function setMark() {
		var i = 1;
		 $( "#groupInforResults tr td:nth-child(3)" ).each(function( index, element ) {
			    $( this ).children().val(i*10);
			    i +=1;
			    $( this).parent().addClass("changed");
			  });
	}
	function addRow() {
		
		var txt = document.createElement("tr");
	    var txtChild ="<td><input onClick=\"clearText(this); return false;\" style=\"width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;\" type=\"button\" value=\"クリア\"></td>";
		txtChild += "<td ><input name= \"groupnm\" style=\"width: 865px; text-align: left;\" type=\"text\" value=\"\"></td>";
		txtChild += "<td ><input name= \"groupoder\" style=\"width: 100px; text-align: right;\" type=\"number\" value=\"\"></td>";
		txtChild += "<td ><div style=\"width: 50px; text-align: center;\" >0件</div>";
		txtChild += "<td ><button onClick=\"onEditItem(this);return false;\" style=\"width: 100px; text-align: center;\" type=\"text\">営業所選択</button></td>";
		txt.innerHTML =txtChild;
		$(txt).attr('value',getNewId());
		$("#groupInforResults").append(txt);
	}
	function insertRow() {
		var txt = document.createElement("tr");
		var txtChild ="<td><input onClick=\"clearText(this); return false;\" style=\"width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;\" type=\"button\" value=\"クリア\"></td>";
			txtChild += "<td ><input name= \"groupnm\" style=\"width: 865px; text-align: left;\" type=\"text\" value=\"\"></td>";
			txtChild += "<td ><input name= \"groupoder\" style=\"width: 100px; text-align: right;\" type=\"number\" value=\"\"></td>";
			txtChild += "<td ><div style=\"width: 50px; text-align: center;\" >0件</div>";
			txtChild += "<td ><button onClick=\"onEditItem(this);return false;\" style=\"width: 100px; text-align: center;\" type=\"text\">営業所選択</button></td>";
		txt.innerHTML =txtChild;
		
		$(txt).attr('value',getNewId());
		if($(".selected").length)
			$(".selected").after(txt);
		else
			$("#groupInforResults").prepend(txt) ;  
// 			alert('hihi');
	}
	var deletedOfficed =[];
	function deleteRow() {
		var value = $(".selected").attr('value');
		if( value !==undefined){
			deletedOfficed.push(value);
		}
		$(".selected").remove();
	}
   
	$('#infoTable').on('click', 'tbody tr', function(event) {
		  $(this).addClass('selected').siblings().removeClass('selected');
		  $(this).addClass('changed');
		});
	var myWin;
	function OpenPop(url) {

	    var mainWitdth;    
	    var mainHeight;    
	   
	    if (screen.availWidth >= 1366) {  
	        mainWitdth = 1366;
	        mainHeight = 768;
	    }
	    else {                            
	        mainWitdth = screen.availWidth;
	        mainHeight = screen.height;	
	    }
	    
	    var str_style = "titlebar=no, toolbar=no, location=no, directories=no," +
	                  "menubar=no, resizable=yes, status=yes, scrollbars=no," +
	                  "top=0, left=0";
	    myWin = window.open(url, "HMainPage" , str_style);
	    myWin.resizeTo(mainWitdth, mainHeight);
	    return false;
	}

	function clearText(elem){
		var row =$(elem).parent().parent().children();
		$(elem).attr('id','test');
		$(row[1]).children().val('');
		$(row[2]).children().val('');
		$(row[3]).children().html('0件');
		var groupId =$(elem).parent().parent().attr('value');
		var sendInfo = {
		           GroupId: groupId,
		           GroupFLG: groupflg
		       };
		console.log(sendInfo);
		updateGroupOffice(sendInfo);
	}
	function onEditItem(elem) {
		var groupid =$(elem).parent().parent().attr('value');
		OpenPop('show.php?groupid='+groupid+'&groupflg='+ groupflg);
	}

	function submitData(){
		sendData();
	}
	function sendData(){
		var dataSend = [];
		var isNotValid =false;
		$( "#infoTable tbody tr.changed" ).each(function( index, element ){
			var groupId = $(this).attr('value');
			var child1=$($(this).children()[1]).children().val();
			var child2=$($(this).children()[2]).children().val();

// 			check empty fill
			if(!child1 || !child2)
			{
				alert('エラー');
				isNotValid= true;
				return false;
			}
			var isNew= (originArrGroupId.indexOf(groupId)==-1)?1:0;
			var item ={
						GroupId :groupId,
						GroupNM :child1,
						GroupOrder :child2,
						IsNew : isNew
					};
		
			dataSend.push(item);
		});
		
		if(isNotValid) {
			return false;
			onBack();
			};
		$.ajax({
			  type: "POST",
			  url: "ajax/submit_form2.php",
			  data: {myData: dataSend, GroupFlg:  groupflg, Remove: deletedOfficed},
			  success: function(msg){ 
				  console.log('Data Sent' +msg);
				  onBack();
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) {
				 
			     //alert("some error1"+XMLHttpRequest +textStatus+errorThrown);
			     console.log(textStatus);
			     return false;
			  }
			});
// 		window.location.href = 'index.php';
		return true;
	}
	//Child window
	function closeWin(){	
		if(myWin)
			myWin.close();
	}
	function onResults( data){
		 $( "#groupInforResults tr" ).each(function( index, element ) {
			   if( $(this).attr('value') == data['GroupId']){
				   var countOffices =data['OfficeCds'].length;
				   var child=$(this).children()[3];
				   $(child).children().html(countOffices+'件');
				   updateGroupOffice(data);
				   console.log("nhan");
				   console.log(data);
				   return false;
				   }
		});
	}
	function updateGroupOffice(data){
		$.ajax({
			  type: "POST",
			  url: "ajax/update_group_office.php",
			  data: {myData: data},
			  success: function(msg){ 
				  console.log('Data Sent12' +msg);
				  closeWin();
			  },
			  error: function(XMLHttpRequest, textStatus, errorThrown) {
			     alert("some error2");
			  }
			});
	}
	function getNewId(){
		var $tmpId;
		do{
			tmpId=	Math.floor((Math.random() * 1000) + 1);
		}
		while(arrGroupId.indexOf(tmpId) !=-1)
			arrGroupId.push(tmpId);
		return tmpId;
		};
//Mark the changed row to submit
	$('#groupInforResults').on('change', 'input', function(){
		$(this).parent().parent().addClass('changed');
});

	function onBack(){
	window.location.href = 'index.php?groupflg='+groupflg;
}
	</script>
</body>
</html>
