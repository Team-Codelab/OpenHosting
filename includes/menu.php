<?php function link_hover($id){
	echo("onHover='document.getElementById(".$id.").style.color=white'");
}?>

<div style='width: 80%; height: 100px; margin-right: auto; margin-left: auto;'><img src='images/banner.jpg'></div>
<div style='width: 80%; height: 50px; background-color: #67C8FF; padding: 5px; margin-right: auto; margin-left: auto;'>
	<div style='float: left;'>
		<div id='menu' <?php link_hover($id); ?>>
			<a href='index.php' class='menu' id='<?php echo($id); ?>'>Home</a>
		</div><?php $id++; ?>
		<div id='menu'>
			<a href='hosting.php' class='menu'>Hosting</a>
		</div>
		<div id='menu'>	
			<a href='domains.php' class='menu'>Domains</a>
		</div>
		<div id='menu'></div>
	</div>
	<div style='float: right;'>
		<div id='menu'>
			<a href='manager/' class='menu'>Login</a>
		</div>
		<div id='menu'>
			<a href='support/' class='menu'>Support</a>
		</div>
		<div id='menu'></div>
	</div>
</div>