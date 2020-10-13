<?php defined( '_JEXEC' ) or die(); ?>
<div class="jshop">
<h1><?php echo $this->category->name?><?php echo $this->manufacturer->name?></h1>
    

     <div class="jshop_list_category">
<?php if (count($this->categories)){?>
<table class = "jshop">
    <?php foreach($this->categories as $k=>$category){?>
        <?php if ($k%$this->count_category_to_row==0) print "<tr>"; ?>
        <td class = "jshop_categ" width = "<?php print (100/$this->count_category_to_row)?>%">
          <table class = "category">
             <tr>
               <td class="image">
                    <a href = "<?php print $category->category_link;?>"><img class = "jshop_img" src = "<?php print $this->image_category_path;?>/<?php if ($category->category_image) print $category->category_image; else print $this->noimage;?>" alt="<?php print htmlspecialchars($category->name);?>" title="<?php print htmlspecialchars($category->name);?>" /></a>
               </td>
               <td>
                   <a class = "product_link" href = "<?php print $category->category_link?>"><?php print $category->name?></a>
               </td>
             </tr>
           </table>
        </td>
        <?php if ($k%$this->count_category_to_row==$this->count_category_to_row-1) print '</tr>'; ?>
    <?php } ?>
        <?php if ($k%$this->count_category_to_row!=$this->count_category_to_row-1) print '</tr>'; ?>
</table>
<?php } ?>
</div>

<div class="list_product">
<?php
 include(dirname(__FILE__) . '/form_filters.php');
  if ($this->rows){
   foreach ($this->rows as $k=>$product){
        include(dirname(__FILE__) . '/product.php');
       // include(dirname(__FILE__)."/".$product->template_block_product);
   }
}

include(dirname(__FILE__) . '/block_pagination.php');
?>

</div>
<?php 
                $controller = JRequest::getVar('controller', null);
                $category_id = JRequest::getVar('category_id', null);
                if (!($category_id == '857' || $category_id == '858' || $category_id == '859' || $category_id == '893' || $category_id == '1060' || $category_id == '1179' || $category_id == '1393'|| $category_id == '1410' || $category_id == '1411'|| $category_id == '1466')) {?>
		<?php if (!($limit > 0)) {?>		
<div id="category_desc" style="border-top: 1px solid rgb(204, 204, 204); clear: both;"><?php echo $this->category->description?></div>
		<?php }?>		
				<?php }?>
</div>
