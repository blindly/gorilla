<h3 class="text-center">{category}</h3>

<table class='table table-striped'>
    <tr>
        <th>Price</th>
        <th>Store / Website</th>
        <th>Date</th>
    </tr>
    
    {expenses_listings}
        <tr>
            <td>${amount}</td>
            <td>{merchant}</td>
            <td>{datestamp}</td>
        </tr>
    {/expenses_listings}
    
    <tr>
        <td colspan="3" align="center"><strong>Total: ${total}</strong></td>
    </tr>
</table>