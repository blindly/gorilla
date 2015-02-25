<table class='table table-striped'>
    <tr>
        <th>Total</th>
        <th>Price/Gallon</th>
        <th>Gas Station</th>
        <th>City</th>
        <th>Date</th>
    </tr>
    
    {expenses_listings}
        <tr>
            <td>${amount}</td>
            <td>${gallon}</td>
            <td>{merchant}</td>
            <td>{location}</td>
            <td>{datestamp}</td>
        </tr>
    {/expenses_listings}
</table>