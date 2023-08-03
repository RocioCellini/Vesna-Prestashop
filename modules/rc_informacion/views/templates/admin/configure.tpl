{*
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}


<div class="panel">	
	
	{if $save}
		<div class="bootstrap">
			<div class="module_confirmation conf confirm alert alert-success">
				<button type="button" class="close" data-dismiss="alert">x</button>
				Text guardado correctamente
			</div>
		</div>
	{/if}

	<div class="moduleconfig-content">
		<div class="row">
			<div class="col-xs-6">
				<p>
					<h4>{l s='A continuación ingrese los datos del producto a modificar.' mod='rc_informacion'}</h4>
					<form action="" method="POST">
						<div class="form-group">
							<label for="exampleProducto">Referencia</label>
							<input type="text" value="{$refValue}" class="form-control" name="exampleProducto" id="exampleProducto" 
							aria-describedby="Texto" placeholder="referencia">
							<small id="referencia" class="form-text text-muted">Introduzca la referencia del producto</small>
						</div>						
						<hr>
						<div class="form-group">
							<label for="exampleTexto">Texto</label>
							<input type="text" value="{$txtValue}" class="form-control" name="exampleTexto" id="exampleTexto" 
							aria-describedby="Texto" placeholder="texto">
							<small id="texto" class="form-text text-muted">Introduzca un Texto</small>
						</div>
						<button type="submit" name="submitTexto" class="btn btn-primary">Enviar</button>
					</form>
				</p>

				<br />
				
			</div>
		</div>
	</div>
</div>
