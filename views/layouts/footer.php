    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2018</p>
                <p class="pull-right">Кровля</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->
<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main+.js"></script>
<script src="/template/js/script+.js"></script>
<script src="/template/js/jquery-1.9.1.min+.js"></script>
<script src="/template/js/jquery.accordion.js"></script>
<script src="/template/js/jquery.cookie.js"></script>
<script>
    $(".category").dcAccordion();
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
        $(".getExcel").click(function () {
            alert( 'Привет всем присутствующим!' );
            
        });
         
    });
</script>
</body>
</html>