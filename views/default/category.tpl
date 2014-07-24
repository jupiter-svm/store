<h1>Товары категории {$rsCategory['name']}</h1>

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
{foreachelse}
    {if !$rsChildCats}
        <h4>В категории нет товаров</h4>
    {/if}
{/foreach}

{foreach $rsChildCats as $item name=childCats}
    <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
{/foreach}