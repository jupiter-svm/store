{* Страница заказа *}

<h2>Данные заказа</h2>
<form action="/cart/saveorder/" method="POST" id="frmOrder">
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                <td>
                    <span id="itemCnt_{$item['id']}"></span>
                    <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}" />
                    {$item['cnt']}
                </td>
                <td>
                    <span id="itemPrice_{$item['id']}">
                        <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}" />
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}" />
                        {$item['realPrice']}
                    </span>
                </td>
            </tr>
        {/foreach}
    </table>
    
    {if isset($arUser)}
        {$buttonClass=""}
        <h2>Данные заказчика</h2>
        <div id="orderUserInfoBox" {$buttonClass}>
            {$name=$arUser['name']}
            {$phone=$arUser['phone']}
            {$address=$arUser['address']}
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" name="name" value="{$name}" id="name" /></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" name="phone" value="{$phone}" id="phone" /></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea name="address" id="address" cols="30" rows="10">{$address}</textarea></td>
                </tr>
            </table>
        </div>
    {else}
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td><input type="text" name="loginEmail" value="" id="loginEmail" /></td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td><input type="password" name="loginPwd" value="" id="loginPwd" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" value="Войти" onclick="login();" /></td>
                </tr>
            </table>
        </div>
        
        <div id="registerBox">
            <div class="menuCaption">Регистрация</div>            
                E-mail*:<br />
                <input type="text" id="email" name="email" value=""/><br />
                Пароль*:<br />
                <input type="password" id="pwd1" name="pwd1" value="" /><br />
                Повторить пароль*:<br />
                <input type="password" id="pwd2" name="pwd2" value="" /><br />
                
                Имя*: <input type="text" name="name" value="" id="name" /><br />
                Тел*: <input type="text" name="phone" value="" id="phone" /><br />
                Адрес*: <textarea name="address" id="address" cols="30" rows="10"></textarea>
                <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
           
        </div>
        {$buttonClass="class='hidden'"}
    {/if}
    
    <input type="button" id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();" />
</form>