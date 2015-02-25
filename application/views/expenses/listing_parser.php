<h3 class="text-center">{category}</h3>

<table class='table table-striped'>
    <tr>
        <th>Amount</th>
        <th>Store / Website</th>
        <th>City</th>
        <th>Datestamp</th>
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
        <td colspan="4" align="center"><strong>Total: ${total}</strong></td>
    </tr>
</table>