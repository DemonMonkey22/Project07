<?php 
    function get_classes() {
        global $db;
        $query = 'SELECT * FROM classes ORDER BY classID';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function get_class_name($class_id) {
        if ($class_id == NULL || $class_id == FALSE) {
            return NULL;
        }
        global $db;
        $query = 'SELECT * FROM classes WHERE classID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['className'];
        return $class_name;
    }

    function delete_class($class_id) {
        global $db;
        $query = 'DELETE FROM classes WHERE classID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO classes (className)
              VALUES
                 (:className)';
        $statement = $db->prepare($query);
        $statement->bindValue(':className', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>