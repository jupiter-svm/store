<h2 id="adminPageHeader">Товар</h2>
<table class="table table-striped table-bordered table-hover table-condensed">
    <caption class="productsCaption">Добавить продукт</caption>
    <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text" id="newItemName" value="" />
            </td>
            <td>
                <input type="text" id="newItemPrice" value="" />
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
                <input type="button" value="Сохранить"  class="btn btn-block btn-success" onclick="addProduct();" />
            </td>
        </tr>
    </tbody>
</table>
<br />
<br />
                
<table class="table table-bordered table-hover table-condensed">
    <caption class="productsCaption">Редактировать</caption>
    <thead>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Удалить</th>
            <th>Изображение</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td>{$item['id']}</td>
                <td>
                    <input type="text" id="itemName_{$item['id']}" value="{$item['name']}" />
                </td>
                <td>
                    <input type="text" id="itemPrice_{$item['id']}" value="{$item['price']}" />
                </td>
                <td>
                    <select id="itemCatId_{$item['id']}">
                        <option value="0">Главная категория</option>
                        {foreach $rsCategories as $itemCat}
                            <option value="{$itemCat['id']}" {if $item['category_id']==$itemCat['id']} selected {/if}>{$itemCat['name']}</option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <textarea id="itemDesc_{$item['id']}">{$item['description']}</textarea>
                </td>
                <td>
                    <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']==0} checked="checked" {/if} />
                </td>
                <td>
                    {if $item['image']}
                        <img src="/images/products/{$item['image']}" alt="" />
                    {/if}
                    <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                        <input type="file"  name="filename" /><br />
                        <input type="hidden" name="itemId" value="{$item['id']}" />
                        <input type="submit" class="btn btn-block btn-success" value="Загрузить" /><br />
                    </form>
                </td>
                <td>
                    <input type="button" value="Сохранить" class="btn btn-block btn-success" onclick="updateProduct('{$item['id']}');" />
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>