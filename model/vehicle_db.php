<?php 
    function get_all_vehicles($sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.vYear';
        } else {
            $orderby = 'V.price';
        }
        $query = 'SELECT V.vehicleID, V.vYear, V.make, V.model, V.price, T.typeName, C.className 
            FROM vehicles V 
            LEFT JOIN classes C ON V.classID = C.classID 
            LEFT JOIN types T ON V.typeID = T.typeID  
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicle($vehicle_id) {
        global $db;
        $query = 'SELECT * FROM vehicles WHERE vehicleID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
    }

    function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_vehicle($type_id, $class_id, $year, $make, $model, $price) {
        global $db;
        $query = 'INSERT INTO vehicles (vYear, make, model, price, typeID, classID)
              VALUES
                 (:vyear, :make, :model, :price, :type_id, :class_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':vyear', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>