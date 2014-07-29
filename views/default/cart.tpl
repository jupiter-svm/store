{* Шаблон корзины *}
<h2>Корзина</h2>
<br />
<br />

{if !$rsProducts}
    В корзине пусто
{else}
    <form action="/cart/order/" method="POST">
        <table id="cartTable">
            <tr>
                <td>№</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Цена</td>
                <td>Действие</td>
            </tr>
            {foreach $rsProducts as $item name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td><br />
                <td><input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" value="1" size="2" onchange="conversionPrice({$item['id']});" type="text" /></td>
                <td>
                    <span id="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}</span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}">{$item['price']}</span>
                </td>
                <td>
                    <a id="removeCart_{$item['id']}" href="#" onclick="removeFromCart({$item['id']}); return false;" title="Удалить из корзины">Удалить</a>
                    <a id="addCart_{$item['id']}" class="hideme" href="#" onclick="addToCart({$item['id']}); return false;" title="Добавить в корзину">Добавить</a>
                </td>
            </tr>
            {/foreach}
        </table>
        
        <input type="submit" value="Оформить заказ" />
    </form>
{/if}