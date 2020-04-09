<?php include 'view/header-admin.php'; ?>
<main>
    <h2>Vehicle Class List</h2>
    <section>
        <?php if ( sizeof($classes) != 0) { ?>
            <table>
                <tr>
                    <th colspan="2">Name</th>
                </tr>        
                <?php foreach ($classes as $class) : ?>
                <tr>
                    <td><?php echo $class['className']; ?></td>
                    <td>
                        <form action="zua-admin.php" method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id"
                                value="<?php echo $class['classID']; ?>"/>
                            <input type="submit" value="Remove" class="button red" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>    
            </table>
        <?php } else { ?>
            <p>
                There are no vehicle classes in your database.
            </p>
        <?php } ?>
    </section>
    <section>
        <h2>Add Vehicle Class</h2>
        <form action="zua-admin.php" method="post" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label>Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <label id="blankLabel">&nbsp;</label>
            <input id="add_class_button" type="submit" class="button blue" value="Add Class"><br>
        </form>
    </section>
    <section class="zippylinks">
        <p><a href="zua-admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="zua-admin.php?action=show_add_form">Add a Vehicle to Inventory</a></p>
        <p><a href="zua-admin.php?action=list_types">View/Edit Vehicle Types</a></p>
    </section>
</main>
