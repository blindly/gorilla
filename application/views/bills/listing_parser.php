
    <table id="billsTable" class='table table-striped'>
        <tr>
            <th>
                Amount
            </th>
            <th>
                Company
            </th>
            <th>
                Week due
            </th>
            <th></th>
        </tr>

            {bills_listings}
                <tr>
                    <td>
                        ${amount}
                    </td>
                    <td>
                        {company}
                    </td>
                    <td>
                        {week}
                    </td>

                    <td>
                        <input name="deletes[]" id="deletes-{id}" value="{id}" type="checkbox">
                    </td>
                </tr>
            {/bills_listings}


        <tr>
            <td colspan="4" align="right">
                <button id="removal" name="removal" class="btn btn-danger" type>Delete</button>
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