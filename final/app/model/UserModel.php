<?php 
require_once _DIR_ROOT."/app/model/MyModels.php";

class UserModel extends MyModels {
    protected $table = "users";

    function searchUser($data = '*', $where = NULL, $where_string = NULL, $where_string_opertor = 'AND') {
        $sql = "SELECT $data FROM $this->table";

        if ($where != NULL) {
            $fields = array_keys($where);
            $values = array_values($where);

            // WHERE id = ? AND name = ? AND ...
            $sql .= " WHERE (".$fields[0]." = ?";
            for ($i = 1; $i < count($fields); $i++) {
                $sql .= " AND ".$fields[$i]." = ?";
            }
            $sql .= ")";
        }

        if ($where_string != NULL) {
            if ($where != NULL) {
                $fields_string = array_keys($where_string);
                $values_string = array_values($where_string);

                // AND name LIKE ? AND description LIKE ? AND ...
                $sql .= ' AND ('.$fields_string[0]." LIKE ?";
                for ($i = 1; $i < count($fields_string); $i++) {
                    $sql .= " $where_string_opertor ".$fields_string[$i]." LIKE ?";
                }
                $sql .= ")";
            } else {
                $fields_string = array_keys($where_string);
                $values_string = array_values($where_string);

                // WHERE id = ? AND name = ? AND ...
                $sql .= " WHERE ".$fields_string[0]." LIKE ?";
                for ($i = 1; $i < count($fields_string); $i++) {
                    $sql .= " $where_string_opertor ".$fields_string[$i]." LIKE ?";
                }
            }
        }

        // echo $sql;
        $query = $this->conn->prepare($sql);

        if (isset($values) && isset($values_string)) {
            $query->execute(array_merge($values, $values_string));
        } else if (isset($values) && !isset($values_string)) {
            $query->execute($values);
        } else if (!isset($values) && isset($values_string)) {
            $query->execute($values_string);
        } else $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteByUserId($user_id) {
        $sql = "DELETE FROM $this->table WHERE user_id = '".$user_id."'";

        $query = $this->conn->prepare($sql);
        if ($query->execute()) {
            return true;
        } else return false;
    }
}
?>