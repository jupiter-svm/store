<h2>Категории</h2>
<br />
<form class="form-inline" role="form">
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Родительская категория</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        {foreach $rsCategories as $item name=categories}
            <tr>                
                <td>{$smarty.foreach.categories.iteration}</td>
                <td>{$item['id']}</td>
                <td>
                    <input type="text" id="itemName_{$item['id']}" value="{$item['name']}" />
                </td>
                <td>
                    <select id="parentId_{$item['id']}">
                        <option value="0">Главная категория</option>
                        {foreach $rsMainCategories as $mainItem}
                            <option value="{$mainItem['id']}" {if $item['parent_id']==$mainItem['id']} selected {/if}>{$mainItem['name']}</option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <input type="button" value="Сохранить" class="btn btn-block btn-success" onclick="updateCat({$item['id']});" />
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</form>