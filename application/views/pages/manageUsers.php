<div class="container">
    <div class="table-container mt-3">
        <div class="mb-2 pb-5">
            <a class="btn btn-custom text-white text-center py-2 px-sm-2 px-lg-5 px-md-4 float-right pluss" onclick="location.href='<?php echo base_url(); ?>createUser';">
                <p class="m-0 txt-lg text-center">Lisa uus</p>
            </a>
        </div>

        <table class="table mt-3">
            <tr class="tr-top justify-content-between">
                <th scope="col">Nimi</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Asutus</th>
                <th scope="col">Roll</th>
                <th scope="col">Staatus</th>
                <th scope="col"></th>
            </tr>

            <?php foreach($manageUsers as $singleUser) : ?>
                <tr class="justify-content-between">
                    <td class=""><?php echo $singleUser['userName']; ?></td>
                    <td class=""><?php echo $singleUser['email']; ?></td>
                    <td class=""><?php echo $singleUser['userPhone']; ?></td>
                    <td class=""><?php echo $singleUser['name']; ?></td>
                    <td class=""><?php echo $singleUser['role']; ?> &nbsp; &nbsp;</td>
                    <td class=""><?php if( $singleUser['status']==1){ echo "Aktiivne";} else {echo "Mitteakviivne";} ?></td>
                    <td class="d-flex justify-content-end">
                        <form class="cat-delete" action="users/delete/<?php echo $singleUser['userID']; ?>" method="POST">
                            <!-- <input type="submit" class="" value="Kustuta"> -->
                            <button type="submit" class="btn btn-second text-white text-center py-1 px-2 txt-strong ">Muuda</button>
                        </form>
                        <form class="cat-delete" action="users/edit/<?php echo $singleUser['userID']; ?>" method="POST">
                            <input type="submit" class="" value="Muuda">
                        </form>
                    </td>
                </tr>                
            <?php endforeach; ?>
        </table>
    </div>
</div>