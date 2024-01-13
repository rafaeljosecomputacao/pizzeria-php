<?php
    include_once("database/list-orders.php");
    include_once("templates/header.php");
?>
    <!-- Main -->
    <main class="dashboard">
        <h3 class="mb-3">Manage your orders</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Edge</th>
                    <th scope="col">Dough</th>
                    <th scope="col">Flavors</th>
                    <th scope="col" class="w-50">State</th>
                    <th scope="col" class="w-50">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pizzas as $pizza): ?>
                    <tr>
                        <td><?= $pizza["id"] ?></td>
                        <td><?= $pizza["edge"] ?></td>
                        <td><?= $pizza["dough"] ?></td>
                        <td>
                            <ul>                                       
                                <?php foreach($pizza["flavors"] as $flavor): ?>
                                    <li><?= $flavor ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td class="w-50">
                            <form action="database/list-orders.php" method="POST" class="form-group sync-form">
                                <input type="hidden" name="type" value="sync">
                                <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                <select name="states" class="form-control">
                                    <?php foreach($states as $state): ?>           
                                        <option value="<?= $state["id"] ?>" <?php echo ($state["id"] == $pizza["state"]) ? "selected" : ""; ?>><?= $state["state"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn btn-primary sync-btn"><i class="bi bi-arrow-repeat"></i>Sync</button>
                            </form>
                        </td>
                        <td class="w-50">
                            <form action="database/list-orders.php" method="POST" class="form-group">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $pizza["id"] ?>">
                                <button type="submit" class="btn btn-danger delete-btn"><i class="bi bi-trash"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
<?php
    include_once("templates/footer.php");
?>