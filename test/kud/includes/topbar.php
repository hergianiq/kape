<div class="wrapper col2">
	<div id="topbar">
		<div id="topnav">
			<ul>
				<li class="active"><a href="home">Home</a></li>
				<li><a href="barang">Barang</a></li>
				<?php include "functions/isset_menu.php";?>
			</ul>
		</div>
		<div id="search">
			<form action="cari" method="post">
				<fieldset>
					<legend>Pencarian</legend>
					<input type="text" name="cari" placeholder="Pencarian"/>
					<input type="submit" name="go" id="go" value="Cari" />
				</fieldset>
			</form>
		</div>
		<br class="clear" />
	</div>
</div>