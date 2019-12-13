<div class="container">
<h2><?= $title; ?></h2>
<table>
<tr>
    <th>Nimi</th>
    <th>Email</th>
    <th>Telefon</th>
    <th>Asutus</th>
    <th>Roll</th>
    <th>Staatus</th>
    <th><input type="button" value="+ Lisa uus kasutaja" class="button_active" onclick="location.href='<?php echo base_url(); ?>createUser';" /></th>
  </tr>

<?php foreach($manageUsers as $singleUser) : ?>
    <tr class="">
	<td class="-item"><?php echo $singleUser['userName']; ?>
	
    </td>
    <td class="-item"><?php echo $singleUser['email']; ?>
	
    </td>
    <td class="-item"><?php echo $singleUser['userPhone']; ?>
	
    </td>
    <td class="-item"><?php echo $singleUser['name']; ?>
		
    </td>
    <td class="-item"><?php echo $singleUser['role']; ?> &nbsp; &nbsp;
	
    </td>
    <td class="-item"><?php if( $singleUser['status']==1){ echo "Aktiivne";} else {echo "Mitteakviivne";} ?>
    
    <div class="row"> <div class="form-group col-xs-6">
			<form class="cat-delete" action="users/delete/<?php echo $singleUser['userID']; ?>" method="POST">
				<input type="submit" class="" value="Kustuta">
            </form>
            </div><div class="form-group col-xs-6">
            <form class="cat-delete" action="users/edit/<?php echo $singleUser['userID']; ?>" method="POST">
				<input type="submit" class="" value="Muuda">
			</form>
           </div></div>
    </td>
    </tr>
    
<?php endforeach; ?>

</table>
</div>