<?php

// Create data

class Database{

private $servername = "localhost";
private $username = "root";
private $password = "";
private $db = "ercode";
private $conn;

public function __construct()
{
    $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db);
    if(!$this->conn){
        die("error connection:". mysqli_connect_error());
    }


}


//  Insert in DB

public function insert($sql)
{
    if(mysqli_query($this->conn,$sql))
    {
        return "Success";
    }
    else
    {
        die("Error:". mysqli_error($this->conn));
    }
}



//  Read data --------

public function read($table)

    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        if (mysqli_query($this->conn, $sql)) 
        {
            if (mysqli_num_rows($result) > 0) 
            {
                
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $data[] = $row;
                }
            } 
            return $data;
        }
        else 
        {
            return  die("Error : " . mysqli_error($this->conn));
        }
        
    }

// Find data -------
    
public function find($table,$id)
    
    {
        $sql = "SELECT * FROM $table WHERE `id` = '$id' ";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_query($this->conn, $sql)) 
        {
            if (mysqli_num_rows($result) > 0 )
            {
                return mysqli_fetch_assoc($result);
                
            }else
            {
                return false;
                
            }
        }
        else 
        {
            return  die("Error : " . mysqli_error($this->conn));
        }
    }


// Update data ----------

public function update($sql)
    {
        if(mysqli_query($this->conn,$sql))
        {
            return "Updated success";
        }
        else
        {
            die("error:". mysqli_error($this->conn));
        }
    }

    
// Delete data --------
    
public function delete($table,$id)
    {
        $sql ="DELETE FROM $table WHERE `id`='$id' ";
        $result = mysqli_query($this->conn,$sql);
        if(mysqli_query($this->conn,$sql))
        {
            return "Deleted success";
        }
        else
        {
            die("error:". mysqli_error($this->conn));
        }
    }


// Encryption pass --------
    
public function enc_password($password){
        return sha1($password);
    }
}







?>