<?php
include 'connect_postgresql.php';
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
    $(document).ready(function(){
            var value= $('#ddlGroup option:selected').attr('value');
                $.ajax({
                method:'POST',
                url:"getUse.php",
                data:{
                    "ddlGroup":value,
                },
                success:function(data){
                    $('#groupInforResults').html(data);
                },
                error: function() {
                    alert("Failed to load");
                }    
            });
        });
    $(function(){
            $("#ddlGroup").change(function(){
                var value= $('#ddlGroup option:selected').attr('value');
                    $.ajax({
                    method:'POST',
                    url:"getUse.php",
                    data:{
                        "ddlGroup":value,
                    },
                    success:function(data){
                        $('#groupInforResults').html(data);
                    },
                    error: function() {
                        alert("Failed to load");
                    }    
                });
                    $('#officeInGroupResults').html('');
            });
                 $('#infoTable').on('click', 'tbody tr', function(event) {
                   $(this).css("background","#ffe7a0").siblings().css("background","");
                            $.ajax({
                            method:'POST',
                            url:"getOffice.php",
                            data:{
                                "groupInforResults":parseInt($(this).attr("group-id")),
                                "groupflgResults":parseInt($(this).attr("group-flg")),
                            },
                            success:function(data){
                                console.log(data);
                                $('#officeInGroupResults').html(data);
                            }    
                        });
                    });
                $('#infoOfficeTable').on('click', 'tbody tr', function(event) {
                         $(this).css("background","#ffe7a0").siblings().css("background","");
                        });
});
        function onClickedUpdate(){
            window.location.href = 'update.php?groupflg=' + $('#ddlGroup option:selected').val();
        }
        function close_window() {
              if (confirm("閉じる?")) {
                close();
              }
            }

//         $( document ).ready(function() {
//     		if(get_param('groupflg'))
//     			$( "#ddlGroup option" ).each(function( index, element ) {
    		   		
//     		   		if($(this).attr('value').trim() == get_param('groupflg')){
//     		   		$(this).attr('selected','selected');
//     		   		refeshInfoGroup(get_param('groupflg'));
//     		   		return false;
//     		   		}
//     		  });
//     		else{
//     			var value = $("#ddlGroup option:first").val();
//     			refeshInfoGroup(value);
//     		}
    	
//     	});

//         function get_param(param) {
// 	        var vars = {};
// 	        window.location.href.replace(location.hash, '').replace(
// 	        /[?&]+([^=&]+)=?([^&]*)?/gi,
// 	        function (m, key, value) { 
// 	            vars[key] = value !== undefined ? value : '';
// 	        }
// 	    );
// 	        return vars[param];
// 	    }

//         function refeshInfoGroup(value){
//     		$.get( "ajax/getUse.php?groupflg="+value, function( data ) {
//     			  $( "#groupInforResults" ).html( data );
//     			  $( "#officeInGroupResults" ).html("");
//     			});
//     	}
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
                            <td class="btnGoto_Orange b-none" style="width: 170px;">
								<form class="d-inline" method="post">
                                    <input type="button" id="btnUpdate" name="update" onclick="onClickedUpdate();return false;" tabindex="1" style="width: 70px;height: 24px;border: none;" value="更新">
                                    <input type="button" name="close" id="btnClose" onclick="close_window();return false;" tabindex="2" style="width: 80px;height: 24px;border: none;" value="閉じる">
                                </form>                             
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
                                    $active = $_GET['groupflg']?$_GET['groupflg']:'1';
                                    
                                    $result = pg_query('select distinct "GROUP_FLG" from public."M_GROUP" 
                                                             order by "GROUP_FLG"');
                                    while ($row = pg_fetch_row($result)) {
                                        echo "<option value ='$row[0]' ". ($active == trim($row[0])?'selected':'').">Use " . $row[0] . "</option>";
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
        <div id="tes-test"></div>
    <footer id="footer">
            <div class="float-right">更新日時 ： <?php echo date('Y/m/d H:i:s'); ?> &emsp; 更新者 ： 0003 &emsp; TIEN-TT</div>
        </footer>
</body>
</html>
