<table class='table table-striped'>
    <tr>
        <th>Price</th>
        <th>Gas Station</th>
        <th>City</th>
        <th>Date</th>
    </tr>
    
    {expenses_listings}
        <tr>
            <td>${amount}</td>
            <td>{merchant}</td>
            <td>{location}</td>
            <td>{datestamp}</td>
        </tr>
    {/expenses_listings}
    
    <tr>
        <td colspan="3" align="center"><strong>Total: ${total}</strong></td>
    </tr>
</table>