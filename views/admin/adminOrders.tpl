<h2>Заказы</h2>
<br />
{if !$rsOrders}
    Нет заказов
{else}
    <table id="ordersTable" class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>№</th>
                <th>Действия</th>
                <th>ID заказа</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата оплаты</th>
                <th>Дополнительная информация</th>
                <th>Дата изменения заказа</th>
            </tr>
        </thead>
        <tbody>
            {foreach $rsOrders as $item name=orders}
                <tr>
                    <td>{$smarty.foreach.orders.iteration}</td>
                    <td><a href="#" onclick="showProducts('{$item['id']}'); return false;">Показать товар заказа</a></td>
                    <td>{$item['id']}</td>
                    <td>
                        <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']} checked="checked" {/if}  onclick="updateOrderStatus('{$item['id']}');" />Закрыт
                    </td>
                    <td>{$item['date_created']}</td>
                    <td>
                        <input id="datePayment_{$item['id']}" type="text" value="{$item['date_payment']}" />
                        <input type="button" value="Сохранить" class="btn btn-block btn-success" onclick="updateDatePayment('{$item['id']}');" />
                    </td>
                    <td>{$item['comment']}</td>
                    <td>{$item['date_modification']}</td>
                </tr>
                <tr class="hideme" id="purchasesForOrderId_{$item['id']}">
                    <td colspan="8">
                        {if $item['children']}
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $item['children'] as $itemChild name=products}
                                        <tr>
                                            <td>{$smarty.foreach.products.iteration}</td>
                                            <td>{$itemChild['id']}</td>
                                            <td><a href="/product/{$itemChild['id']}/">{$itemChild['name']}</a></td>
                                            <td>{$itemChild['price']}</td>
                                            <td>{$itemChild['amount']}</td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>    
{/if}