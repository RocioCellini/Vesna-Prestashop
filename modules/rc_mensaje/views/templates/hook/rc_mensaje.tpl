<div id="rc_mensaje_block_home" class="block">
  <h4>{l s='Welcome!' mod='mymodule'}</h4>
  <div class="block_content">
    <p>Hello,
           {if isset($rc_mensaje) && $rc_mensaje}
               {$rc_mensaje}
           {else}
               World
           {/if}
           !
    </p>
    <ul>
      <li><a href="{$my_module_link}" title="Click this link">Click me!</a></li>
    </ul>
  </div>
</div>