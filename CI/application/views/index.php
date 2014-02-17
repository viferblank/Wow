<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device, initial-scale=1.0'>
<title>Training</title>
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/full.css'/>
</head>
<body>
<div class='paper'>
	<div class='header'>
	</div>
</div>
<div class='wrapper'>
	<div class='slider'>
	</div>
	<div class='content'>
		<?php
			if($page == "simpanan"){
				$this->load->view('simpanan/simpanan');
			}else if($page == "T_simpanan"){
				$this->load->view('simpanan/tambah');
			}else if($page == "E_simpanan"){
				$this->load->view('simpanan/edit');
			}
		?>
	</div>
	<div class='footer'>
	</div>

</div>

</body>
</html>