
    <table id="stockTable" class='table table-striped'>
        <tr>
            <th>
                Stock
            </th>
            <th>
                Quote
            </th>
            <th>
                Last Updated
            </th>
            <th></th>
        </tr>

            {stocks_listings}
                <tr>
                    <td>
                        ${stock}
                    </td>
                    <td>
                        {quote}
                    </td>
                    <td>
                        {timestamp}
                    </td>

                    <td>
                        <input name="deletes[]" id="deletes-{id}" value="{id}" type="checkbox">
                    </td>
                </tr>
            {/stocks_listings}

        <tr>
            <td colspan="4" align="right">
                <button id="removal" name="removal" class="btn btn-danger" type>Delete</button>
            </td>
        </tr>

    </table>
</form>