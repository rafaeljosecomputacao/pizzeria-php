<?php 
    include_once("database/new-order.php");
    include_once("templates/header.php");  
?>
    <!-- Main -->
    <main class="main">
        <h3 class="mb-3">Choose your pizza</h3>
        <form action="database/new-order.php" method="POST">
            <div class="form-group">
                <label for="edge">Edge</label>
                <select name="edge" id="edge" class="form-control mb-3">
                    <option value="">Select the edge</option>
                    <?php foreach($edges as $e): ?>
                        <option value="<?= $e["id"] ?>"><?= $e["edge"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dough">Dough</label>
                <select name="dough" id="dough" class="form-control mb-3">
                    <option value="">Select the dough</option>
                    <?php foreach($doughs as $d): ?>
                        <option value="<?= $d["id"] ?>"><?= $d["dough"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="flavors">Select one or two flavors</label>
                <select multiple name="flavors[]" id="flavors" class="form-control">
                    <?php foreach($flavors as $f): ?>
                        <option value="<?= $f["id"] ?>"><?= $f["flavor"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mt-3"><i class="bi bi-plus"></i>New Order</button>
            </div>
        </form>
    </main>
<?php
    include_once("templates/footer.php");
?>