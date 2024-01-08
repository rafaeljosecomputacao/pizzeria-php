<?php
    include_once("process/list-orders.php");
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
                <tr>
                    <td>1</td>
                    <td>Cheddar</td>
                    <td>Regular</td>
                    <td>
                        <ul>                                       
                            <li>Ham and Cheese</li>
                        </ul>
                    </td>
                    <td class="w-50">
                        <form class="form-group update-form">
                            <input type="hidden" name="type" value="">
                            <input type="hidden" name="id" value="">
                            <select name="state" class="form-control">            
                                <option value="">Preparation</option>
                            </select>
                            <button type="submit" class="btn btn-primary update-btn"><i class="bi bi-arrow-repeat"></i>Sync</button>
                        </form>
                    </td>
                    <td class="w-50">
                        <form class="form-group">
                            <input type="hidden" name="type" value="">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-danger delete-btn"><i class="bi bi-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
<?php
    include_once("templates/footer.php");
?>