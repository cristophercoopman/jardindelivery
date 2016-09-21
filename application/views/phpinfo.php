<?php if(!empty($admin)) 
foreach ($admin as $key) {
	echo "id: ".$key->id." nombre: ".$key->nombreCompleto;
}
else echo "vacio"; ?>

