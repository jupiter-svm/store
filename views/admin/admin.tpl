<div id="blockNewCategory">
    Новая категория:
    <input type="text" name="newCategoryName" value="" id="newCategory" />
    <br />
    
    Является подкатегорией для
    <select name="generalCatId">
        <option value="0">Главная категория</option>
        {foreach $rsCategories as $item}
            <option value="{$item['id']}">{$item['name']}</option>
        {/foreach}
    </select>
    <br />
    <input type="button" onclick="newCategory()" value="Добавить категорию" />
</div>