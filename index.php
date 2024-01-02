<?php 
    include_once("process/new-order.php");
    include_once("templates/header.php");  
?>
    <!-- Main -->
    <main class="main">
        <h2 class="text-center mb-3">Choose your pizza</h2>
        <form action="" method="">
            <div class="form-group">
                <label for="edge">Edge</label>
                <select name="edge" id="edge" class="form-control mb-3">
                    <option value="">Select the edge</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dough">Dough</label>
                <select name="dough" id="dough" class="form-control mb-3">
                    <option value="">Select the dough</option>
                </select>
            </div>
            <div class="form-group">
                <label for="flavors">Select one or two flavors</label>
                <select multiple name="flavors[]" id="flavors" class="form-control"></select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mt-3 w-100"><i class="bi bi-plus"></i>New Order</button>
            </div>
        </form>
    </main>
<?php
    include_once("templates/footer.php");
?>