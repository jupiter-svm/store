{* Шаблон главной страницы *}

{foreach $rsProducts as $item name=products}
    <div class="goodPosition">
        <a href="/product/{$item['id']}/">
            <img src="/images/products/{$item['image']}" width="100" />
        </a>
        <br />
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>
        
    {if $smarty.foreach.products.iteration mod 3==0}
        <div id="prodClear"></div>
    {/if}
{/foreach}