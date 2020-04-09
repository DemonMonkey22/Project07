<?php include 'view/header-admin.php'; ?>
<main>
    <h2>Add Vehicle</h2>
    <form action="zua-admin.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">

        <label>Type:</label>
        <select name="type_id">
        <?php foreach ($types as $type) : ?>
            <option value="<?php echo $type['typeID']; ?>">
                <?php echo $type['typeName']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label>Class:</label>
        <select name="class_id">
        <?php foreach ($classes as $class) : ?>
            <option value="<?php echo $class['classID']; ?>">
                <?php echo $class['className']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label for="vyear">Year:</label>
        <input type="text" name="vyear" min="1920" max="2100" maxlength="4" pattern="[0-9]{1,5}" required><br>

        <label for="make">Make:</label>
        <input type="text" name="make" maxlength="50" required><br>

        <label for="model">Model:</label>
        <input type="text" name="model" maxlength="50" required><br>

        <label for="price">Price:</label>
        <input type="number" name="price" required><br>

        <label id="blankLabel">&nbsp;</label>
        <input type="submit" value="Add Vehicle" class="button blue"><br>
    </form>
    <section class="zippylinks">
        <p><a href="zua-admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="zua-admin.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a href="zua-admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
    </section>
</main>
