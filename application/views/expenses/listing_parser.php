<form name="manageExpensesForm" id="manageExpensesForm" method="post" action="/expenses/delete">
    <table id="manage" class='table table-striped'>
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


        <tr>
            <td colspan="4" align="right">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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
</form>