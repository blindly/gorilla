<h3 class="text-center">{category}</h3>

<table class='table table-striped'>
    <tr>
        <th>Amount</th>
        <th>Merchant</th>
        <th>Location</th>
        <th>Timestamp</th>
    </tr>
    
    {expenses_listings}
        <tr>
            <td>${amount}</td>
            <td>{merchant}</td>
            <td>{location}</td>
            <td>{timestamp}</td>
        </tr>
    {/expenses_listings}
    
    <tr>
        <td colspan=4>Total: ${total}</td>
    </tr>
</table>