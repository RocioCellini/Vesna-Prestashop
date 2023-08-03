<!-- referencia: {$product->reference} -->
{assign var=refOriginal value=$product->reference}
<!-- original: {$refOriginal} -->
<!-- escrita: {$refValue} -->
{if $refOriginal==$refValue}
          <strong class="texto"> {$txtValue} </strong>
{/if}