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
								<span><b>DANH SACH NHOM</b></span>
							</td>
							<td>
								<div>
									<a href="#">CAP NHAT</a>
								</div>
								<div>
									<a href="#">DONG</a>
								</div>
							</td>							
						</tr>
					</tbody>
				</table>
				<br>
				<table border="1">
					<tbody>
						<tr>
							<td>SU DUNG</td>
						</tr>
						<tr>
							<td>
								<select>
									<option>Use 1</option>
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
									<th>TEN NHOM</th>
									<th>THU TU HIEN THI</th>
									<th>XOA</th>
									<th>SO LUONG LIEN KET</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>demo</td> 
									<td>10</td>
									<td> </td>
									<td>1</td>
								</tr>
								<tr>
									<td>demo_2</td>
									<td>20</td> 
									<td>
										<img src="http://172.16.3.82:8082/assets/img/accept.gif">
									</td>
									<td>1</td>
								</tr>
							</tbody>
						</table>
					</div>
				<br>
			
					<div>
					<p>
						<span><b>THONG TIN VAN PHONG BAN HANG THUOC VE NHOM DUOC CHON</b></span>
					</p>
					<div>
						<table border="1">
							<thead>
								<tr>
									<th>PHONG KINH DOAN<br>MA SO</th>
									<th>TEN VP BAN HANG</th>
									<th>TRINH DO CHUYEN MON</th>
									<th>DIA CHI</th>
									<th>NHAN VIEN BAN HANG</th>
									<th>VI TRI THAM DU HOI NGHI BAN HANG</th>
								</tr>
							</thead>
							<tbody id="officeInGroupResults">
								<tr>
									<td>e00002</td>
									<td>demo</td>
									<td>demo</td>
									<td>Tphcm</td>
									<td>duc2</td>
									<td>demo</td>
								</tr>
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
			<div>NGAY CAP NHAT : 2018/06/29 10:22:52 &emsp; CAP NHAT BOI : 0003
				&emsp; TIEN-TT</div>
		</footer>
</body>
</html>
<?php 
$db = pg_connect("host=172.16.3.82 port=5432 dbname=Training user=postgres password=have@tript0Singapore");

?>
