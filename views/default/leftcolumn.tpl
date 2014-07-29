{* Левый столбец *}
    
<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption"><i class="icon-home"></i>&nbsp;<a href="/">На главную</a></div><br />
        
        <!-- Переписать под ul-список -->
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
            <i class="icon-user"></i>&nbsp;<a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
            <i class="icon-off"></i>&nbsp;<a href="/user/logout/" onclick="logout();">Выход</a>
        </div>
    {else}
    
        <div id="userBox" class="hideme">
            <i class="icon-user"></i>&nbsp;<a href="#" id="userLink"></a><br />
            <i class="icon-off"></i>&nbsp;<a href="/user/logout/" onclick="logout();">Выход</a>
        </div>    
        
        {if !isset($hideLoginBox)}
            <div id="loginBox" class="well">
                <div class="menuCaption">Авторизация</div>
                <input type="text" name="loginEmail" value="" id="loginEmail" placeholder="Логин" /><br />
                <input type="password" name="loginPwd" value="" id="loginPwd" placeholder="Пароль" /><br />
                <input type="button" class="btn btn-block btn-success" value="Войти" onclick="login();" />
            </div>

            <div id="registerBox" class="well">
                <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>                
                <div id="registerBoxHidden">
                    E-mail:<br />
                    <input type="email" id="email" name="email" value="" required/><br />
                    Пароль:<br />
                    <input type="password" id="pwd1" name="pwd1" value="" /><br />
                    Повторить пароль:<br />
                    <input type="password" id="pwd2" name="pwd2" value="" /><br />
                    <input type="button" class="btn btn-block btn-success" onclick="registerNewUser();" value="Зарегистрироваться" />
                </div>
            </div>
        {/if}
    {/if}
    
    <div class="well">
        <div class="menuCaption">Корзина</div>
        <a href="/cart/" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            {if $cartCntItems > 0} ({$cartCntItems}) {else} (0){/if}
        </span>
    </div>
    <br />
    <br />
    <div class="menuCaption" id="admLink">
        {if $isAdmin=='true'}
            <a href="/admin/">Админцентр</a>
        {/if}
    </div>
</div>