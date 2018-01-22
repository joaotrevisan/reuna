<?php

mysqli_report(MYSQLI_REPORT_STRICT);

//ABRIR BANCO DE DADOS
function open_database(){
    try{
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    }
    catch (Exception $e){
        echo $e->getMessage();
        return null;
    }
}

//FECHAR BANCO DE DADOS
function close_database($conn){
    try{
        mysqli_close($conn);
    }
    catch (Exception $e){
        echo $e->getMessage();
    }
}

//PESQUISA UM REGISTRO PELO ID NA TABELA
function find( $table = null, $id = null ){
    
    $database = open_database();
    $found = null;
    
    try{
        if($id){
            $sql = 'SELECT * FROM '.$table.' WHERE id = '.$id;
            $result = $database->query($sql);
            
            if($result->num_rows > 0){
                $found = $result->fetch_assoc();
            }
        }
        else{
            $sql = 'SELECT * FROM '.$table;
            $result = $database ->query($sql);
            
            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }
        }
    }
    catch(Excepetion $e){
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    
    close_database($database);
    return $found;
}

//PESQUISA TODOS OS REGISTROS DE UMA TABELA
function find_all($table){
    return find($table);
}

//ADICIONA UM REGISTRO A TABELA
function save($table = null, $data = null){
    $database = open_database();
    $columns = null;
    $values = null;
    
    foreach($data as $key => $value){
        $columns .= trim($key, "'") . ",";
        $values .=  "'$value',";
    }
    
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');
    
    $sql = "INSERT INTO ".$table."($columns)"." VALUES "."($values);";
    
    try{
        $database->query($sql);
    }
    catch(Exception $e){
    }
    
    close_database($database);
}

//EDITA UM REGISTRO DA TABELA
function update($table = null, $id = 0, $data = null){
    $database = open_database();
    $items = null;
    
    foreach($data as $key => $value){
        $items .= trim($key, "'") . "='$value',";
    }
    
    $items = rtrim($items, ',');
    
    $sql = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id=".$id.";";
    
    try{
        $database -> query($sql);
    }
    catch(Exception $e){
    }
    
    close_database($database);
}

//DELETA UM REGISTRO DA TABELA
function remove($table = null, $id = null){
    
    $database = open_database();
    
    try{
        if($id){
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);
        }
    }
    catch(Exception $e){
    }
    
    close_database($database);
}

//RETORNA O NOME DAS COLUNAS DE UMA TABELA
function listColumns($table = null){
    
    $database = open_database();
    
    $cols = array();
    $sql = "SHOW COLUMNS FROM ".$table;
    $result = mysqli_query($database,$sql);
    while($row = mysqli_fetch_array($result)){
        array_push($cols,$row['Field']);
    }
    
    close_database($database);
    return $cols;
}

//MONTA UMA TABELA SIMPLES COM BUSCA
function tableSimple($table = null,$col = null,$value = null){
    
    $database = open_database();
    try{
        $cols = listColumns($table);
        
        echo "
        <table class='table'>
        <thead>
            <tr>";
        
        $c = 0;
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/',$url)[count(explode('/',$url))-1];
        while($c < count($cols)){
            
            if(isset($_GET['pesquisa'])){
                $href = $url."&f=".$cols[$c];
            }
            else{
                $href = "index.php?f=".$cols[$c];
            }
            echo"<th>";
            $a = "<a href=".$href.">";
            
            if(isset($col) and $cols[$c] == $col){
                $a .= "<i class='fa fa-search'></i> ";
            }
            
            if(isset($_GET['f']) and $_GET['f'] == $cols[$c]){
                $a .= "<i class='fa fa-asterisk'></i> ";
            }
            
            $a .= " ".$cols[$c]."</a>";
            
            echo $a."</th>";
            $c += 1;
        }
        
        echo "</tr>";
            
        $sqlRes ="SELECT * FROM ".$table;
        if(isset($col) and isset($value) and isset($_GET['f'])){
            $sqlRes .= " WHERE ".$col." LIKE '%".$value."%' ORDER BY ".$_GET['f'];
        }
        else if($col and $value){
            $sqlRes .= " WHERE ".$col." LIKE '%".$value."%'";
        }
        else if(isset($_GET['f'])){
            $sqlRes .= " ORDER BY ".$_GET['f'];
        }
        
        //echo "<hr><b>SQL:</b><br>".$sqlRes."<hr>";
        
        $resultRes = $database ->query($sqlRes);
        
        if ($resultRes->num_rows > 0) {
            $found = $resultRes->fetch_all(MYSQLI_ASSOC);
        }
        
        echo "<tbody>";
        $c = 0;
        while($c < $resultRes->num_rows){
            echo "<tr>";
            $d = 0;
            while($d < count($cols)){
                if($d == 0){
                    echo "<td><b>".$found[$c][$cols[$d]]."</b></td>";
                }
                else{
                    echo "<td>".$found[$c][$cols[$d]]."</td>";
                }
                $d += 1;
            }
            $c += 1;
            echo "</tr>";
        }
        echo"</tbody></table></div>";
    }
    catch(Exception $e){
    }
    
    close_database($database);
}