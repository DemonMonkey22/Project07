<?php include 'view/header-admin.php'; ?>
<main>
    <h2>Vehicle Type List</h2>
    <section>
        <?php if ( sizeof($types) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Name</th>
                </tr>        
                <?php foreach ($types as $type) : ?>
                <tr>
                    <td><?php echo $type['typeName']; ?></td>
                    <td>
                        <form action="zua-admin.php" method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id"
                                value="<?php echo $type['typeID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no vehicle types in your database.
            </p>
        <?php } ?>
    </section>
    <section>
        <h2>Add Vehicle Type</h2>
        <form action="zua-admin.php" method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label>Name:</label>
            <input type="text" name="type_name" max="20" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Type"><br>
        </form>
    </section>
    <section class="zippylinks">
        <p><a href="zua-admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="zua-admin.php?action=show_add_form">Add a Vehicle to Inventory</a></p>
        <p><a href="zua-admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
    </section>
</main>