<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    //SQL query
    $a = $_GET["q"];
    $sql = "SELECT * from 043_customers WHERE customer_name LIKE '$a%'";

    $result = mysqli_query($conn, $sql);

    $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo ("<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>DNI</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Reservations</th>
    </tr>");

    foreach($customers as $customer){
    echo (
        "<tr>
            <td>" . $customer['customer_name'] . "</td>
            <td>" . $customer['customer_surname'] . "</td>
            <td>" . $customer['customer_dni'] . "</td>     
            <td>
                <form action='../../forms/customers/update_existing_customer.php' method='POST'>
                    <input type='text' value='$customer[customer_id]' name=customer_id hidden>
                    <input type='submit' name='submit' value='Update'>
                </form>
            </td> 
            <td>
                <form action='../../forms/customers/delete_warning_customer.php' method='POST'>
                    <input type='text' value='$customer[customer_id]' name=customer_id hidden>
                    <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
            <td>
            <form action='../reservations/reservations_select_from_customer.php' method='POST'>
                    <input type='text' value='$customer[customer_id]' name=customer_id hidden>
                    <input type='submit' name='submit' value='Reservations'>
                </form>
            </td>   
        </tr>"
    );   
    }
    echo ("</table>");
    mysqli_free_result($result);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>