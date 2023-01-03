<?php
class MyModels extends Database{

    /*
        Tham số $data truyền vào là chuỗi có dạng: "ten_cot1, ten_cot2, ..."
            <=> SELECT ten_cot1, ten_cot2, ... FROM table
        Tham số $where truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> WHERE ten_cot1 = gia_tri1 AND ten_cot2 = gia_tri2 ...
    */
    function select_array($data = '*', $where = NULL) {
        $sql = "SELECT $data FROM $this->table";

        if ($where != NULL) {
            $fields = array_keys($where);
            $values = array_values($where);

            // WHERE id = ? AND name = ? AND ...
            $sql .= " WHERE ".$fields[0]." = ?";
            for ($i = 1; $i < count($fields); $i++) {
                $sql .= " AND ".$fields[$i]." = ?";
            }
        }
        // echo $sql;
        $query = $this->conn->prepare($sql);
        if (isset($values)) {
            $query->execute($values);
        } else $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
        Tham số $data truyền vào là chuỗi có dạng: "ten_cot1, ten_cot2, ..."
            <=> SELECT ten_cot1, ten_cot2, ... FROM table
        Tham số $where truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> WHERE ten_cot1 = gia_tri1 AND ten_cot2 = gia_tri2 ...
    */
    function select_one($data = '*', $where = NULL) {
        $sql = "SELECT $data FROM $this->table ";
        if ($where != NULL) {
            $where_array = array_keys($where);
            $value_where = array_values($where);

            $sql .= "WHERE ".$where_array[0]." = ?";
            for ($i = 1; $i < count($where_array); $i++) {
                $sql .= " AND ".$where_array[$i]." = ?";
            }

            // echo $sql;
            $query = $this->conn->prepare($sql);
            $query->execute($value_where);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        $query = $this->conn->prepare($sql);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /*
        Tham số $data truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> INSERT INTO table (ten_cot1, ten_cot2) VALUES (gia_tri1, gia_tri2)
    */
    function insert($data = NULL) {
        $fields = array_keys($data);
        $fields_list = implode(',', $fields);
        $values = array_values($data);

        $qr = str_repeat('?,', count($fields) - 1);
        $sql = "INSERT INTO ".$this->table." (".$fields_list.") VALUES (${qr}?)";
        // echo $sql;
        $query = $this->conn->prepare($sql);
        if ($query->execute($values)) {
            return true;
        } else return false;
    }

    /*
        Tham số $data truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> INSERT INTO table (ten_cot1, ten_cot2) VALUES (gia_tri1, gia_tri2)
        Tham số $where truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> WHERE ten_cot1 = gia_tri1 AND ten_cot2 = gia_tri2 ...
    */
    function update($data = NULL, $where = NULL) {
        if ($data != NULL && $where != NULL) {
            $fields = array_keys($data);
            $values = array_values($data);

            $where_array = array_keys($where);
            $value_where = array_values($where);

            $sql = "UPDATE $this->table SET ".$fields[0]." = ?";
            for ($i = 1; $i < count($fields); $i++) {
                $sql .= ", ".$fields[$i]." = ?";
            }
            $sql .= " WHERE ".$where_array[0]." = ".$value_where[0]."";
            for ($i = 1; $i < count($where_array); $i++) {
                $sql .= " AND ".$where_array[$i]." = ".$value_where[$i]."";
            }
            // echo $sql;
            $query = $this->conn->prepare($sql);
            if ($query->execute($values)) {
                return true;
            } else return false;
        }
    }

    /*
        Tham số $where truyền vào là 1 mảng có dạng: ['ten_cot1' => 'gia_tri1', 'ten_cot2' => 'gia_tri2', ...]
            <=> WHERE ten_cot1 = gia_tri1 AND ten_cot2 = gia_tri2 ...
    */
    function delete($where = NULL) {
        $sql = "DELETE FROM $this->table ";
        if ($where != NULL) {
            $where_array = array_keys($where);
            $value_where = array_values($where);

            $sql .= "WHERE ".$where_array[0]." = ".$value_where[0]."";
            for ($i = 1; $i < count($where_array); $i++) {
                $sql .= " AND ".$where_array[$i]." = ".$value_where[$i]."";
            }

            echo $sql;
            $query = $this->conn->prepare($sql);
            if ($query->execute()) {
                return true;
            } else return false;
        }
    }
}
?>