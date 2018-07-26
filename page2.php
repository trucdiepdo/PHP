<div id="body">
			<div>
				<table class="title titleGroupOffice">
					<tbody>
						<tr style="background-color: transparent">
							<td class="formTitle b-none " style="width: 1030px;"><span id="lblTitle"><b>DANH SACH NHOM</b></span></td>
							<td class="btnGoto_Orange b-none">

								<div id="UpdPlBtnUpdate" class="d-inline">
									<a id="btnUpdate" href="#" onclick="submitData()" tabindex="1">CAP NHAT</a>
								</div>
								<div id="UpdPlBtnClose" class="d-inline">
									<a id="btnClose" onclick="onBack()" tabindex="2" href="#">DONG</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br> <br>
			<button onclick="setMark()" type="button" class="btn btn-outline-secondary btn-sm">DANH SO LAI</button>
			<button onclick="addRow()" type="button" class="btn btn-outline-secondary btn-sm">THEM DONG</button>
			<button onclick="insertRow()" type="button" class="btn btn-outline-secondary btn-sm">CHEN HANG</button>
			<button onclick="deleteRow()" type="button" class="btn btn-outline-secondary btn-sm">XOA HANG</button>
			<!-- 	Show -->
			<div id="GroupOffice">
				<div id="GroupOfficeList">
					<div id="UpdPlGroupOfficeList">
						<form id="formInfo" action="#">
							<table id="infoTable">
								<thead>
									<tr>
										<th style="width: 50px;"></th>
										<th style="width: 865px;">TEN NHOM</th>
										<th style="width: 100px;">THU TU HIEN THI</th>
										<th style="width: 150px;" colspan="2">VAN PHONG LIEN KET</th>
									</tr>
								</thead>
								<tbody id="groupInforResults"><tr value="1"><td><input onclick="clearText(this); return false;" style="width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;" type="button" value="������"></td><td><input name="groupnm" style="width: 865px; text-align: left;" type="text" value="demo"></td><td><input name="groupoder" style="width: 100px; text-align: right;" type="number" value="10"></td><td><div style="width: 50px; text-align: center;">1篁�</div></td><td><button onclick="onEditItem(this);return false;" style="width: 100px; text-align: center;  word-wrap: break-word;" type="text">�倶キ���御��</button></td></tr><tr value="3" class="d-none"><td><input onclick="clearText(this); return false;" style="width: 50px; text-align: center; font-size:7pt; word-wrap: break-word;" type="button" value="������"></td><td><input name="groupnm" style="width: 865px; text-align: left;" type="text" value="demo_2"></td><td><input name="groupoder" style="width: 100px; text-align: right;" type="number" value="20"></td><td><div style="width: 50px; text-align: center;">1篁�</div></td><td><button onclick="onEditItem(this);return false;" style="width: 100px; text-align: center;  word-wrap: break-word;" type="text">�倶キ���御��</button></td></tr></tbody>
							</table>
						</form>
					</div>
				</div>
				<br>
			</div>
		</div>
