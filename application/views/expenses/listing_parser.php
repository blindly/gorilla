<table class='table table-striped'>
    <tr>
        <th>
            Price
        </th>
        <th>
            Merchant
        </th>
        <th>
            Date
        </th>
        <th></th>
    </tr>
    
    <form name="deleteForm">
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
                    <input name="deletes" id="deletes-{id}" value="{id}" type="checkbox">
                </td>
            </tr>
        {/expenses_listings}
    </form>
    
    <tr>
        <td colspan="4" align="right">
            <button class="btn btn-danger btn-sm">Delete</button>
        </td>
    </tr>
    
    <tr>
        <td colspan="4" align="center">
            <strong>
                Total: ${total}
            </strong>
        </td>
    </tr>
</table>