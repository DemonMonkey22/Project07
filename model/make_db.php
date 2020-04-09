<?php 
    function get_makes() {
        global $db;
        $query = 'SELECT make FROM vehicles GROUP BY make';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }
?>