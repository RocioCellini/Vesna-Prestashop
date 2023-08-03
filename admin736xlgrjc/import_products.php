<?php  

  define('PS_ADMIN_DIR', getcwd());  
  include(PS_ADMIN_DIR.'/../config/config.inc.php');  
   //include('./config/config.inc.php');
   include(PS_ADMIN_DIR.'/init.php');
   
   $csv_file = file_get_contents('products.csv');
   $data = explode("\n", $csv_file);
   $data = array_filter(array_map("trim", $data));
   $default_language = Configuration::get('PS_LANG_DEFAULT');
   
   $i = 0;
   foreach ($data as $csv) {
           $i++;
           
           if ($i < 2) {continue;}  // skip csv header
           
           $csv_values = explode(";", $csv);

           $reference = $csv_values[0];
           $name = $csv_values[1];
           $price = $csv_values[2];
           $quantity = $csv_values[3];
           $category = 2;
           $description = '';
           $description_short = '';
           $product_url = Tools::link_rewrite($name);
           $ean13 = '';
           
           $product_exists = Db::getInstance()->getValue("SELECT reference FROM "._DB_PREFIX_."product WHERE reference = '".$reference."'");
           
           if (empty($product_exists)) {
                   $action = 'insert';
               } else {
                   $action = 'update'; 
                   $product_id = Db::getInstance()->getValue("SELECT id_product FROM "._DB_PREFIX_."product WHERE reference = '".$reference."'");
               }
           
           
           if ($action == 'insert') {
                   $product = new Product();
                   $product->reference = $reference;
                   $product->name = [$default_language => $name];
                   $product->price = round($price,6);
                   $product->wholesale_price = '0.000000';
                   $product->quantity = $quantity;
                   $product->link_rewrite = [$default_language => $product_url];
                   $product->id_category = [$category];
                   $product->id_category_default = $category;
                   $product->description = [$default_language => $description];
                   $product->description_short = [$default_language => $description_short];
                   $product->meta_title = [$default_language => $name];
                   $product->meta_description = [$default_language => $name];
                   $product->meta_keywords = [$default_language => $name];
                   $product->id_tax_rules_group = 0;
                   $product->redirect_type = '404';
                   $product->minimal_quantity = 1;
                   $product->show_price = 1;
                   $product->on_sale = 0;
                   $product->online_only = 0;
                   $product->ean13 = $ean13;
                   $product->active = 1;
                   
                   if($product->add()) {
                        $product->updateCategories($product->id_category);
                        StockAvailable::setQuantity((int)$product->id, 0, $product->quantity, Context::getContext()->shop->id);
                        $tag_list[] = str_replace('-',',',$product_url);
                        Tag::addTags($default_language, $product->id, $tag_list);
                   }
                   
                   $link = new Link();
                   $url = $link->getProductLink($product->id);
                   
                   echo 'inserted product id: '.$product->id.' | product url: <a href="'.$url.'" target="_blank">'.$url.'</a><br />';
                   
             } // end insert
           
           if ($action == 'update') {
                   $product = new Product($product_id);
                   $product->reference = $reference;
                   $product->name = [$default_language => $name];
                   $product->price = round($price,6);
                   $product->wholesale_price = '0.000000';
                   $product->quantity = $quantity;
                   $product->link_rewrite = [$default_language => $product_url];
                   $product->id_category = [$category];
                   $product->id_category_default = $category;
                   $product->description = [$default_language => $description];
                   $product->description_short = [$default_language => $description_short];
                   $product->meta_title = [$default_language => $name];
                   $product->meta_description = [$default_language => $name];
                   $product->meta_keywords = [$default_language => $name];
                   $product->id_tax_rules_group = 0;
                   $product->redirect_type = '404';
                   $product->minimal_quantity = 1;
                   $product->show_price = 1;
                   $product->on_sale = 0;
                   $product->online_only = 0;
                   $product->ean13 = $ean13;
                   $product->active = 1;
                   
                   if($product->update()) {
                        $product->updateCategories($product->id_category);
                        StockAvailable::setQuantity((int)$product->id, 0, $product->quantity, Context::getContext()->shop->id);
                        $tag_list[] = str_replace('-',',',$product_url);
                        Tag::addTags($default_language, $product->id, $tag_list);
                   }
                   
                   $link = new Link();
                   $url = $link->getProductLink($product->id);
                   
                   echo 'updated product id: '.$product->id.' | product url: <a href="'.$url.'" target="_blank">'.$url.'</a><br />';
                   
             }  // end update
   
       } // end foreach
?>