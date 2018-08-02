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
                                  	{html_options values=$arrayid output=$arrayid }
                               </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            
            <!-- Show information of table 1 and 2-->
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
                                    <th style="width: 90px;">営業所<br> コード</th>
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
            <div class="float-right">更新日時 ： {$smarty.now|date_format:"%Y/%m/%d %H:%M:%S"} &emsp; 更新者 ： 4077 &emsp; DIEP-DTT</div>
        </footer>
</body>
</html>
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
                                  	{html_options values=$arrayid output=$arrayid }
                               </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            
            <!-- Show information of table 1 and 2-->
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
                                    <th style="width: 90px;">営業所<br> コード</th>
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
            <div class="float-right">更新日時 ： {$smarty.now|date_format:"%Y/%m/%d %H:%M:%S"} &emsp; 更新者 ： 4077 &emsp; DIEP-DTT</div>
        </footer>
</body>
</html>
