{* Страница продукта *}
<h3>{$rsProduct['name']}</h3>

<img src="/images/products/{$rsProduct['image']}" alt="{$rsProduct['name']}" class="img-polaroid" with="575" />
<br />
<br />
<span class="productPrice">Стоимость:</span> {$rsProduct['price']}

<a href="#" id="removeCart_{$rsProduct['id']}" {if !$itemInCart} class="hideme" {/if} onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="addCart_{$rsProduct['id']}" {if $itemInCart} class="hideme" {/if} onClick="addToCart({$rsProduct['id']}); return false" alt="Добавить в корзину">Добавить в корзину</a>
<br />
<br />
<p><span class="productDescription">Описание:</span> <br />{$rsProduct['description']}</p>