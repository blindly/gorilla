<h3 class="text-center">{category}</h3>

<table class='table table-striped'>
    <tr>
        <th>
            Price
        </th>
        <th>
            Store / Website
        </th>
        <th>
            Date
        </th>
        <th></th>
    </tr>
    
    {expenses_listings}
        <tr>
            <td>
                ${amount}
            </td>
            <td>
                {merchant}
            </td>
            <td>
                {datestamp}
            </td>
            <td>
                <a href="/expenses/delete/{id}" class="btn btn-danger btn-mini">Delete</a>
            </td>
        </tr>
    {/expenses_listings}
    
    <tr>
        <td colspan="4" align="center">
            <strong>
                Total: ${total}
            </strong>
        </td>
    </tr>
</table>