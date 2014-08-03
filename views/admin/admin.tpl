<br />
<br />
<br />
<br />
<form class="form-inline" role="form">
    <div class="form-group">
        <div id="blockNewCategory">
            Новая категория:
            <input type="text" name="newCategoryName" value="" id="newCategory" />
        </div>
        <br />

        Является подкатегорией для
        <select name="generalCatId">
            <option value="0">Главная категория</option>
            {foreach $rsCategories as $item}
                <option value="{$item['id']}">{$item['name']}</option>
            {/foreach}
        </select>
        <br />
        <br />
        <input type="button" class="btn btn-block btn-success" onclick="addnewCategory();" value="Добавить категорию" />

    </div>
</form>