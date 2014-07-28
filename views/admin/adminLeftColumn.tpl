{* Левый столбец *}

<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div><br />
        <a href="/admin/">Главная</a><br />
        <a href="/admin/category/">Категории</a><br />
        <a href="/admin/products/">Товар</a><br />
        <a href="/admin/orders/">Заказы</a>
    </div>
    
    {if isset($arUser)}
        <div id="userBox">
            <a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
            <a href="/user/logout/" onclick="logout();">Выход</a>
        </div>
    {else}
    
        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br />
            <a href="/user/logout/" onclick="logout();">Выход</a>
        </div>    
    {/if}
    <br />
    <div class="menuCaption"><a href="/">На главную</a></div>
</div>
<br />