<form action="user.php?act=bill" method="post">
	<section id="cart_items">
		<div class="container">
			<div class="step-one" style="text-align: center;color:chocolate" >
				<h2 class="heading" style="color:chocolate" >Cảm ơn bạn đã mua hàng</h2>
			</div>
			<div class="checkout-options" style="text-align: center;">
				<h3 style="padding-bottom: 20px;color:chocolate"><?php echo number_format("$total_money")?> VND</h3>
				<!-- <p>Mã đơn hàng của bạn <strong>MDH<?php echo $id_orders	?></strong></p> -->
			</div>

			<div class="register-req" style="text-align: center;">
				<p>Vui lòng chuẩn bị số tiền tương ứng vào ngày giao hàng</p>
			</div>
			<div class="checkout-options" style="text-align: center;">
				<h3><?php echo number_format("$total_money").""?> VND</h3>
			</div>
		    <div class="shopper-informations" style="text-align: center;color:black;padding-top:20px">
				<div class="row-shopper">
                	<p>Để biết chi tiết về trạng thái đơn hàng của bạn, vui lòng vào <strong>Tài khoản > Đơn hàng của tôi</strong></p>
					 <a href="index.php?act=donhang">
						<p class="button button2">Xem đơn đặt</p>
					</a> 
				</div>
			</div>
			<div class="review-payment" style="text-align: center;">
				<h2>Lưu ý</h2>
				<p style="color: black;">
					- Chỉ nhận khi đơn hàng ở trạng thái <strong>"ĐANG GIAO HÀNG"</strong></br>
					- Lưu ý kiểm tra mã đơn hàng, mã vận đơn hàng và <strong>NGƯỜI GỬI TRƯỚC KHI THANH TOÁN</strong>
				</p>
			</div>
		</div>
	</section>
</form>