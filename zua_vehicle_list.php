<?php include 'view/header-admin.php'; ?>
<main>
    <nav>
        <form action="zua-admin.php" method="get" id="make_selection">
            <!-- uses ternary if statements to determine selected or not -->
            <section id="dropmenus">
                <?php if ( sizeof($makes) != 0) { ?>
                    <label>Make:</label>
                    <select name="make">
                        <option value="0">View All Makes</option>
                        <?php foreach ($makes as $make) : ?>
                            <option value="<?php echo $make['make']; ?>" <?php echo ($make_name == $make['make'] ? "selected" : false)?>>
                                <?php echo $make['make']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>

                <?php if ( sizeof($types) != 0) { ?>
                    <label>Types:</label>
                    <select name="type_id">
                        <option value="0">View All Types</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type['typeID']; ?>" <?php echo ($type_name == $type['typeName'] ? "selected" : false)?>>
                                <?php echo $type['typeName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>

                <?php if ( sizeof($classes) != 0) { ?>
                    <label>Class:</label>
                    <select name="class_id">
                        <option value="0">View All Classes</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?php echo $class['classID']; ?>" <?php echo ($class_name == $class['className'] ? "selected" : false)?>>
                                <?php echo $class['className']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>
            </section>
            <section id="sortBy">
                <div>
                    <!-- uses ternary if statements to determine checked or not -->
                    <span>Sort by: </span>
                    <input type="radio" id="sortByPrice" name="sort" value="price" <?php echo ($sort == "price" ? "checked" : false)?>>
                    <label for="sortByPrice">Price</label> 
                    <input type="radio" id="sortByYear" name="sort" value="year" <?php echo ($sort == "year" ? "checked" : false)?>>
                    <label for="sortByYear">Year</label>
                    <input type="submit" value="Search" class="button blue button-slim">
                    <input id="resetVehicleListForm" type="reset" class="button red button-slim">
                </div>
            </section>
        </form>
    </nav>
    <section>
        <?php if( sizeof($vehicles) != 0 ) { ?>
            <div id="table-overflow">
                <table>
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Class</th>
                            <th>Price</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle) : ?>
                        <tr>
                            <td><?php echo $vehicle['vYear']; ?></td>
                            <td><?php echo $vehicle['make']; ?></td>
                            <td><?php echo $vehicle['model']; ?></td>
                            <?php if ($vehicle['typeName'] == null || $vehicle['typeName'] == false) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $vehicle['typeName']; ?></td>
                            <?php } ?>
                            <?php if ($vehicle['className'] == null || $vehicle['className'] == false) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $vehicle['className']; ?></td>
                            <?php } ?>
                            <td><?php echo "$".number_format($vehicle['price'], 2); ?></td>
                            <td>
                                <form action="zua-admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="vehicle_id"
                                        value="<?php echo $vehicle['vehicleID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no matching vehicles in Zippy&apos;s inventory. 
            </p>     
        <?php } ?>
    </section>
    <?php include 'view/zippy-links.php'; ?>
</main>
<script defer src="view/js/main.js" type="text/javascript"></script>