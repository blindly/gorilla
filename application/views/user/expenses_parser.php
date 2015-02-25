<h3 class="text-center">{category}</h3>

<table class='table table-striped'>
    <tr>
        <th>Spent</th>
        <th>In</th>
        <th>At</th>
        <th>On</th>
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
        <td colspan=4><strong>Total: ${total}</strong></td>
    </tr>
</table>