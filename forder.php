<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<div class="footer" id="lienhe">
    <a class="btn-top" href="javascript:void(0)" title="Top" style="display: inline; "> </a>
    <hr>
    <br>
    <p>Thời gian hoạt động của cửa hàng từ: 7h-23h.</p>
    <p>Số điện thoại: 0909090909 </p>
    <p>Email: <a class="fa" href="#">B1706862@student.ctu.edu.vn</a></p>
	<p>Địa chỉ website: <a class="fa" href="./index.php">BTNshop.com.vn</a></p>
    <p>Địa chỉ: Tòa nhà không số, Đường số 3, khu dân cư Metro, Quận Ninh Kiều, TP. Cần Thơ.</p>
    <hr>
    <p>© 2020 - Bản quyền thuộc về Công ty TNHH MTV BTN_Shop</p>
    <hr>

</div>
<script>
	jQuery(document).ready(function($) {
		if ($(".btn-top").length >= 0) {
			$(window).scroll(function() {
				var e = $(window).scrollTop();
				if (e > 500) {
					$(".btn-top").show()
				} else {
					$(".btn-top").hide()
				}
			});
			$(".btn-top").click(function() {
				$('body,html').animate({
					scrollTop: 0
				})
			})
		}
	});
</script>