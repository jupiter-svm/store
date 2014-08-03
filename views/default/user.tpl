{* Страница пользователя *}

<h3>Ваши регистрационные данные</h3>
<br />
<form>
    <table id="userProfTable" cellpadding="2" cellspacing="0">
        <tr>
            <td>Логин (email)</td>
            <td>
                {$arUser['email']}
                {if $isAdmin=='true'}
                    (Администратор)
                {/if}
            </td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" value="{$arUser['name']}" name="newName" /></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" value="{$arUser['phone']}" name="newPhone" /></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea name="newAddress">{$arUser['address']}</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password"  name="newPwd1" /></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password"  name="newPwd2" /></td>
        </tr>
        <tr>
            <td>Для сохранения настроек введите старый пароль</td>        
            <td><input type="password" name="curPwd" value='' /></td>        
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onclick="updateUserData();" /></td>
        </tr>
    </table>
        
        
    <h2>Заказы:</h2>
    {if !$rsUserOrders}
        Нет заказов
    {else}
        <table border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>№</th>
                <th>Действие</th>
                <th>ID заказа</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата оплаты</th>
                <th>Дополнительная информация</th>
            </tr>
            <tr>
                {foreach $rsUserOrders as $item name=orders}
                    <tr>
                        <td {$smarty.foreach.orders.iteration}></td>
                        <td>
                            <a href="#" onclick="showProducts('{$item['id']}')">Показать товар заказа</a>
                        </td>
                        <td>{$item['id']}</td>
                        <td>{$item['status']}</td>
                        <td>{$item['date_created']}</td>
                        <td>{$item['date_payment']}</td>
                        <td>{$item['comment']}</td>
                    </tr>
                    <tr class="hideme" id="purchaseForOrderId_{$item['id']}">
                        <td colspan="7">
                            {if $item['children']}
                                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                                    <tr>
                                        <th>№</th>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                    </tr>
                                    {foreach $item['children'] as $itemChild name=products}
                                    <tr>
                                        <td>{$smarty.foreach.products.iteration}</td>
                                        <td>{$itemChild['product_id']}</td>
                                        <td><a href="/product/{$itemChild['product_id']}/" >{$itemChild['name']}</a></td>
                                        <td>{$itemChild['price']}</td>
                                        <td>{$itemChild['amount']}</td>
                                    </tr>
                                    {/foreach}
                                </table>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tr>
        </table>
    {/if}
</form>