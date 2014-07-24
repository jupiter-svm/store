<h2>Товар</h2>
<table border="1" cellpadding="1" cellspacing="1">
    <caption>Довабить продукт</caption>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Сохранить</th>
    </tr>
    <tr>
        <td>
            <input type="edit" id="newItemName" value="" />
        </td>
        <td>
            <input type="edit" id="newItemPrice" value="" />
        </td>
        <td>
            <select name="" id="newItemCatId">
                <option value="0">Главная категория</option>
                {foreach $rsCategories as $itemCat}
                    <option value="{$itemCat['id']}">{$itemCat['name']}</option>
                {/foreach}
            </select>
        </td>
        <td>
            <textarea name="" id="newItemDesc" cols="30" rows="10"></textarea>
        </td>
        <td>
            <input type="button" value="Сохранить" onclick="addProduct();" />
        </td>
    </tr>
</table>