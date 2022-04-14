<?php
use Mpdf\Tag\Tr;

require_once __DIR__ . '/vendor/autoload.php';
// require 'config.php';

ob_start();
	include 'koneksi.php';
	$query = mysqli_query($koneksi, "SELECT * FROM tb_material");
?>
<html>
<head>
	<title>JOB DESCRIPTION</title>
</head>
<body>
	<!-- <link rel="stylesheet" href="assets/css/style.css">
	<div style="margin-left: 20px">
		<table>
			<tr>
				<td>
					<center><img src="assets/img/polibatamlogo.png" width="85px">
						<center>
				</td>
				<td>
					<center>
						<font size="6"><b>JOB DESCRIPTION STUDENT INTERNSHIP 2022</b></font><br>
						<font size="5">POLITEKNIK NEGERI BATAM</font><br>
						<font size="1"><i>Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461</i></font>
					</center>
				</td>
			</tr>
		</table>
	</div> -->
		<hr width="0px" style="border-bottom: 10px">
		<p class="heading">A. Student Internship Identity</p>
		<!--Student Internship Identity-->
		<table class="identity-text">
			<?php
			while($data = mysqli_fetch_assoc($query)){
				echo '<pre>';
				print_r($data);
				echo '</pre>';
				
				echo "
				<tr>
				<td>Name</td>
				<td>: " . $data['part_name'] . "</td>
				</tr>
				<tr>
				<td>NIM</td>
				<td>: " . $data['part_number'] . "</td>
				</tr>
				<tr>
				<td>Study Program</td>
				<td>: " . $data['model_name'] . "</td>
				</tr>
				<tr>
				<td>Company Name</td>
				<td>: " . $data['supplier'] . "</td>
				</tr>
				";
            }
			
			?>
		</table>

        <?php
		$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_top' => 10, 'margin_bottom' => 10, 'margin_left' => 20, 'margin_right' => 20]);
		$html = ob_get_contents();
		ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output("Job-Description.pdf", 'I');
	?>