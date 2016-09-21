<div id="my-services" class="container">
    <div class="row">
        <h1>My Services</h1>
        {foreach from=$services item="service" name="services"}
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
            <a href="/services/{$service.id}"><img src="/admin/img/services/{$service.img}" alt=""></a>
            <span>{$service.name}</span>
        </div>
        {/foreach}
    </div>
</div>
{include file="lets_talk.tpl"}