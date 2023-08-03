{* {if isset($data)}
    <p>existe data</p>
{/if}
{if !isset($data)}
    <p>No existe data</p>
{/if} *}
<div class="display">
    <div class="col-xs-6"><b><span>{$data->name}</span></b> </div>
    <div class="col-xs-6">
        <b>Lon: </b> <span>{$data->coord->lon} %</span>
        <b>Lat: </b> <span>{$data->coord->lat} </span></br>
        <b>Min. temp. : </b> <span>{$data->main->temp_min - 273.15} °C </span>
        <b>Máx. temp. : </b> <span>{$data->main->temp_max- 273.15} °C </span>
    </div>
</div>
    
   