{* Левый столбец *}
    
<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption"><a href="/">На главную</a></div>

        {foreach $rsCategories as $item}
            <span class="hiMenu"><a href="/category/{$item['id']}/">{$item['name']}</a></span><br />

            {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    <span class="lowMenu"><a href="/category/{$itemChild['id']}/">--{$itemChild['name']}</a></span><br />
                {/foreach}
            {/if}
            
        {/foreach}
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
        
        {if !isset($hideLoginBox)}
            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <input type="text" name="loginEmail" value="" id="loginEmail" /><br />
                <input type="password" name="loginPwd" value="" id="loginPwd" /><br />
                <input type="button" value="Войти" onclick="login();" />
            </div>

            <div id="registerBox">
                <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
                <div id="registerBoxHidden">
                    E-mail:<br />
                    <input type="text" id="email" name="email" value=""/><br />
                    Пароль:<br />
                    <input type="password" id="pwd1" name="pwd1" value="" /><br />
                    Повторить пароль:<br />
                    <input type="password" id="pwd2" name="pwd2" value="" /><br />
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
                </div>
            </div>
        {/if}
    {/if}
    
    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
    <span id="cartCntItems">
        {if $cartCntItems > 0} ({$cartCntItems}) {else} (0){/if}
    </span>
    <br />
    <br />
    <div class="menuCaption"><a href="/admin/">Админка</a></div>
</div>