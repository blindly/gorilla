<form name="manageExpensesForm" id="manageExpensesForm">
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
                        <input name="deletes[]" id="deletes-{id}" value="{id}" type="checkbox">
                    </td>
                </tr>
            {/expenses_listings}


        <tr>
            <td colspan="4" align="right">
                <button id="removal" name="removal" class="btn btn-danger">Delete</button>
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