
<div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="category-title">
                    TẤT CẢ SẢN PHẨM
                </h3>
            </div>
        </div>
        
        <div class="row product-lists">

        <?php 
            show_to_products($products);         
            
        ?>
            

            
            
        </div>
        <div class="btn-group" role="group" aria-label="First group">
            
        <?php paging($page_current,$page_left,$page_right,$pages); ?>    
        </div>