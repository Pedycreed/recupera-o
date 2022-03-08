
    <title>Activity</title>
<h1>Skate Shop</h1>
    <h2>Create</h2>
<?php

require_once('./connection.php');

function create($produtos)
{

    $con = getConnection();


    try {

        #Insert something

        $stmt = $con->prepare("INSERT INTO produtos(cod,nome, estoque, marca, preco) VALUES (:nome , :marca, :preco)");

        $stmt->bindParam(":nome", $produtos->nome);
        $stmt->bindParam(":marca", $produtos->marca);
        $stmt->bindParam(":preco", $produtos->preco);
        $stmt->bindParam(":cod", $produtos->cod);
        $stmt->bindParam(":estoque", $produtos->estoque);



        if ($stmt->execute()) {
            echo " produtos Registered successfully";
        }
    } catch (PDOException $error) {
        echo "Error When Register the produtos. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
#create test
$produtos = new stdClass();
$produtos->nome = "bot1";
$produtos->marca = "broxei";
$produtos->preco = 3500;
$produtos->cod = 6666;
$produtos->estoque = 2;
create($produtos);
echo "<br><br>---<br><br>";

#create test
$produtos = new stdClass();
$produtos->nome = "maça";
$produtos->marca = "vermelha";
$produtos->preco = 01;
create($produtos);
echo "<br><br>---<br><br>";

#create test
$produtos = new stdClass();
$produtos->nome = "uva";
$produtos->marca = "roxa";
$produtos->preco = 02;
create($produtos);

echo "<br><br>---<br><br>";

function get()
{
    try {
        $con = getConnection();
        # Select something

        $rs = $con->query("SELECT nome, marca, preco FROM produtos");

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo "Nome: " . $row->nome . " <br> marca: ";
            echo $row->marca . "<br> preco: ";
            echo $row->preco . "<br> <br>";
        }
    } catch (PDOException $error) {
        echo "Error When Listing produtos Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

#get test
echo "List of produtos <br><br>---<br><br>";
get();

?>
<h2>Find</h2>
<?php
function find($marca)
{
    try {
        $con = getConnection();
        # Select something

        $stmt = $con->prepare("SELECT nome, marca, cod, preco, estoque FROM produtos WHERE marca  LIKE :marca");
        $stmt->bindValue(":marca", "%{$marca}%");


        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {


                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "Name: " . $row->nome . " <br> produtos:";
                    echo $row->marca . "<br> cod: ";
                    echo $row->cod . "<br> <br>";
                }
            }
        }
    } catch (PDOException $error) {
        echo "Error When Searching the Student. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
#find test
echo "produtos Found Successfully <br><br>---<br><br>";
find("v");

echo "---<br><br>";
?>

<h2>Update</h2>
<?php
function update($produtos)
{
    $con = getConnection();


    try {

        #Insert something

        $stmt = $con->prepare("UPDATE produtos SET nome = :nome, marca = :marca ,cod = :cod WHERE cod = :cod");

        $stmt->bindParam(":preco", $produtos->preco);
        $stmt->bindParam(":nome", $produtos->nome);
        $stmt->bindParam(":marca", $produtos->marca);
        $stmt->bindParam(":cod", $produtos->cod);

        if ($stmt->execute()) :
            echo "skat Updated Successfully";
        endif;
    } catch (PDOException $error) {
        echo "Error When Update the skate. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

#update test -- Wilian student nº 2
$produtos = new stdClass();
$produtos->nome = "testo";
$produtos->marca = "jj(jeraljuntos)";
$produtos->cod = 3;
$produtos->estoque = 1;
update($produtos);
echo "<br><br>---<br><br>";
?>

<h2>List</h2>
<?php
#get test
echo "List of skate <br><br>---<br><br>";
get();

?>

<h2>Delete</h2>
<?php
function delete($cod)
{
    $con = getConnection();


    try {

        #Insert something

        $stmt = $con->prepare("DELETE FROM produtos WHERE  cod = ?");

        $stmt->bindParam(1, $cod);

        if ($stmt->execute()) :
            echo "skate Deleted Successfully";
        endif;
    } catch (PDOException $error) {
        echo "Error When Delete the Skate. Error: {$error->getMessage()}";
    } finally { # Will always run
        unset($con);
        unset($stmt);
    }
}

// #delete test -- Ágatha student nº 10
delete(3);

echo "<br><br>---<br><br>";
?>
<h2>List</h2>
<?php
#get test
echo "List of skate <br><br>---<br><br>";
get();

?>