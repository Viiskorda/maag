<div class="container">
    <div class="table-container mt-3">
        <div class="mb-2 pb-5">
            <a class="btn btn-custom text-white text-center py-2 px-sm-2 px-lg-5 px-md-4 float-right pluss" onclick="location.href='<?php echo base_url(); ?>createUser';">
                <p class="m-0 txt-lg text-center">Lisa uus</p>
            </a>
        </div>

        <table class="table mt-3">
            <thead class="table-users">
            <tr class="tr-top justify-content-between">
                <th scope="col">Nimi</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Asutus</th>
                <th scope="col">Roll</th>
                <th scope="col">Staatus</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-users">
            <?php foreach($manageUsers as $singleUser) : ?>
                <tr scope="row" class="">
                    <td class="p-1"><?php echo $singleUser['userName']; ?></td>
                    <td class="p-1"><?php echo $singleUser['email']; ?></td>
                    <td class="p-1"><?php echo $singleUser['userPhone']; ?></td>
                    <td class="p-1"><?php echo $singleUser['name']; ?></td>
                    <td class="p-1"><?php echo $singleUser['role']; ?> &nbsp; &nbsp;</td>
                    <td class="p-1"><?php if( $singleUser['status']==1){ echo "Aktiivne";} else {echo "Mitteakviivne";} ?></td>
                    <td class="d-flex justify-content-end p-1">
                        <form class="cat-delete" action="users/edit/<?php echo $singleUser['userID']; ?>" method="POST">
                            <button type="submit" class="btn btn-second btn-width text-white text-center py-1 px-2 txt-strong ">Muuda</button>
                        </form>
                        <form class="cat-delete pl-1" action="users/delete/<?php echo $singleUser['userID']; ?>" method="POST">
                            <!-- <input type="submit" class="" value="Kustuta"> -->
                            <button type="submit" class="btn btn-delete btn-width text-white text-center py-1 px-2 txt-strong ">Kustuta</button>
                        </form>
                    </td>
                </tr>                
            <?php endforeach; ?>
</tbody>
        </table>
    </div>
</div>