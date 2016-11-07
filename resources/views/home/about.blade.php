@extends('template.master')  
@section('include') 
 	<link href="css/contact.css" rel="stylesheet">
 	<link href="css/about.css" rel="stylesheet"> 
 	<script type="text/javascript">
 		jQuery(document).ready(function(){
	 		jQuery('#myTab a').click(function (e) {
			  e.preventDefault()
			  jQuery(this).tab('show')
			})
		});
 	</script>
@stop  	 


@section('content')
<div class="row">
	<div class="col-md-9"> 
			<ul class="nav nav-tabs" id="myTab">
				<li class="active tab1"><a href="#home">CTY VÉ MÁY BAY SKY</a></li>
				<li class="tab2"><a href="#profile">HỆ THỐNG SKY</a></li>
				<li class="tab3"><a href="#messages">GIA ĐÌNH SKY</a></li>
				<li class="tab4"><a href="#settings">ĐỐI TÁC</a></li>
			</ul>
		 
			<div class="tab-content">
				<div class="tab-pane active" id="home">
						ABAY là công ty hoạt động trong lĩnh vực thương mại điện tử – chuyên cung cấp dịch vụ vé máy bay trực tuyến của các hãng hàng không nội địa và quốc tế. ABAY có hệ thống Đặt Vé Máy Bay Trực Tuyến tại website www.ABAY.vn với các chức năng: Tìm kiếm hành trình bay, So sánh giá vé của các hãng hàng không, Đặt vé trên website và Thanh toán trực tuyến.

						Là doanh nghiệp hoạt động theo mô hình Đại lý Du lịch Trực tuyến (Online Travel Agency – OTA) đầu tiên tại Việt Nam, nhóm phát triển đằng sau ABAY.vn đã có 10 năm kinh nghiệm trong việc thiết kế và thực hiện các ứng dụng web cao cấp cho nhiều ngành khác nhau (viễn thông, ngân hàng, bán lẻ) và biết rất rõ làm thế nào để thực hiện các giao dịch dựa trên các ứng dụng được nhanh chóng, đáng tin cậy, và dễ sử dụng.

						Trong nhiều năm, đội ngũ nghiên cứu thị trường của ABAY đã đặt phòng khách sạn, mua vé tàu, du thuyền, tour du lịch, thuê xe ô tô trực tuyến ngay từ máy tính cá nhân của mình. Qua những năm đó chúng tôi phải lướt qua hàng chục, hàng trăm website nặng nề, khó dùng với các sản phẩm dịch vụ đắt đỏ và sự hỗ trợ khách hàng chậm chạp, thiếu chuyên nghiệp từ phía các công ty chủ quản website. Điều này đã tạo nên động lực để chúng tôi tạo nên sự thay đổi, khác biệt và đó là lý do ABAY ra đời.

						Với ABAY, chúng tôi quyết tâm tạo ra website du lịch tốt nhất với ưu tiên hàng đầu là sự tiện lợi tối đa mà ABAY có thể mang đến cho khách hàng. Từ một nhóm nhỏ với vài thành viên, cho đến nay ABAY đã trở thành công ty dẫn đầu trong lĩnh vực này tại thị trường Việt Nam với gần 100 nhân viên, 4 chi nhánh tại Hà Nội và TP HCM, hơn 1000 khách hàng mỗi ngày và sẽ còn vươn xa hơn nữa trong tương lai. 

						Giao diện thân thiện, giá tốt nhất, giao dịch nhanh, gọn, hỗ trợ khách hàng tận tâm & chuyên nghiệp, ABAY.vn đã, đang và sẽ vẫn là website du lịch duy nhất tạo nên sự hài lòng trọn vẹn cho khách hàng

						CÔNG TY TNHH VÉ MÁY BAY TRỰC TUYẾN ABAY
						Số ĐKKD: 0105795184 - Mã số thuế: 0105795184
						Ngày thành lập: 20/02/2012
						Giám đốc: Ông Phạm Tuấn Nam
						Website chính thức: www.abay.vn
				</div>
				<div class="tab-pane" id="profile">
					www.ABAY.vn là website Đặt Vé Máy Bay Trực Tuyến thuộc sở hữu của Công ty ABAY. Được thiết kế với giao diện thân thiện, dễ sử dụng. ABAY.vn thực hiện các chức năng sau:

					1. Tìm kiếm hành trình bay theo yêu cầu của khách hàng (chặng bay, giờ bay, giá vé)
					2. So sánh giá vé của 3 hãng hàng không nội địa và hơn 350 hãng hàng không quốc tế
					3. Đặt vé máy bay tự động
					4. Hệ thống thanh toán với nhiều hình thức đa dạng: Thanh toán qua chuyển khoản của 12 ngân hàng nội địa, Thanh toán tại văn phòng công ty ABAY (trực tiếp hoặc qua cà thẻ - POS), Thanh toán tại nhà khách hàng và Thanh toán trực tuyến qua các cổng trung gian (SenPay, SohaPay, Ngân Lượng) với hơn 20 loại thẻ ngân hàng, visa, visa điện tử.
					5. Tư vấn, cung cấp thông tin cho khách hàng về các lĩnh vực hàng không, văn hóa - du lịch

					Hệ thống các số Hotline của ABAY luôn sẵn sàng phục vụ nhu cầu mua vé máy bay của khách hàng với sự hỗ trợ và tư vấn nhiệt tình.

					Tổng đài Chăm sóc khách hàng của ABAY 1900 4749 với Đội Ngũ Chăm Sóc Khách Hàng tận tâm, chu đáo và chuyên nghiệp giúp giải đáp mọi thắc mắc, tiếp nhận khiếu nại, tư vấn thông tin và hỗ trợ đặt vé 24/7
					» Hướng dẫn Đặt Vé Máy Bay trên ABAY.vn
				</div>
				<div class="tab-pane" id="messages">
					Nguồn nhân lực luôn là yếu tố được ABAY đề cao và lấy làm trọng tâm phát triển của công ty bởi hơn ai hết chúng tôi hiểu rằng con người chính là tài sản quý giá nhất, có tính then chốt, quyết định tới sự thành bại của doanh nghiệp. Do đó từ khi thành lập tới nay ABAY luôn trải thảm đỏ chào đón nhân tài; luôn nỗ lực tạo điều kiện, môi trường làm việc chất lượng cũng như thực hiện các chính sách khuyến khích làm việc và đãi ngộ tốt nhất dành cho nhân viên. Sự thành công của ABAY ngày hôm nay chính là minh chứng cho những cống hiến, nỗ lực cũng như niềm tin mà các thành viên dành cho đại gia đình ABAY
					<img src="http://www.abay.vn/Images/cocaunhansu.jpg" width="600px" style="margin: 10px 0px">
				</div>
				<div class="tab-pane" id="settings">
					<div class="doitac">
	                    <img src="http://www.abay.vn/Images/logoSenpay.gif" width="140" height="70" alt="Cổng Thanh toán SenPay">
	                    <img src="http://www.abay.vn/Images/sohapay.gif" width="140" height="70" alt="Cổng Thanh toán SohaPay">
	                    <img src="http://www.abay.vn/Images/nganluong.gif" width="140" height="70" alt="Cổng Thanh toán Ngân Lượng">
	                    <img src="http://www.abay.vn/Images/Noibaitaxi.gif" width="140" height="70" alt="Nội Bài Taxi">
	                </div>
	                <div class="doitac">
	                    <img src="http://www.abay.vn/Images/Jetstar.gif" width="140" height="70" alt="Jetstar Pacific Airlines">
	                    <img src="http://www.abay.vn/Images/Vietjetair.gif" width="140" height="70" alt="Vietjet Air">
	                    <img src="http://www.abay.vn/Images/vna.gif" width="140" height="70" alt="Vietnam Airlines">
	                    <img src="http://www.abay.vn/Images/HuongHaiLogo.gif" width="140" height="70" alt="Hương Hải Sealife Cruise">
	                </div>
	                <div class="doitac">
	                    <img src="http://www.abay.vn/Images/Abacus.gif" width="140" height="70" alt="Abacus">
	                    <img src="http://www.abay.vn/Images/logoTransviet.gif" width="140" height="70" alt="TRansviet">
	                    <img src="http://www.abay.vn/Images/Hongngocha.gif" width="140" height="70" alt="Hồng Ngọc Hà">
	                    <img src="http://www.abay.vn/Images/Enviet.gif" width="140" height="70" alt="Én việt">
	                </div>
	                Trong tương lai, ngoài mảng vé máy bay, ABAY có kế hoạch mở rộng ra lĩnh vực đặt tour du lịch, du thuyền, khách sạn….Vì vậy ABAY luôn mong muốn có cơ hội hợp tác với các doanh nghiệp quan tâm và có nhu cầu hợp tác cùng ABAY trong các lĩnh vực trên.
				</div>
			</div> 

	</div>

	<div class="col-md-3 none_padding-right">
		<div class="wrap-booking">
			<!-- book airport -->
			<div class="row">
				<div class="row text-center "><h3 class="font-weight">Đặt vé máy bay</h3></div>
				<div class="row wrap-booking-content">  
					<div class="row">
						<div class="row ">Khởi hành từ</div>
						<div class="row">
							<input type="text" class="form-control none-style change_place" autocomplete="OFF">
						</div>
					</div>
					<div class="row">
						<div class="row">Khởi hành từ</div>
						<div class="row">
							<input type="text" class="form-control none-style change_place" autocomplete="OFF">
						</div>
					</div>
					<div class="row">
						<div class="row-50 text-left"> Ngày xuất phát </div>
						<div class="row-50 text-right"> Ngày về </div>
					</div>
					<div class="row">
						<div class="row-50 text-left"><input type="text" class="form-control none-style change_place" autocomplete="OFF"></div>
						<div class="row-50 text-right"><input type="text" class="form-control none-style change_place" autocomplete="OFF"></div>
					</div>
					<div class="row">
						<div class="row-40 label-small">Người lớn</div>
						<div class="row-20 label-small">Trẻ em</div>
						<div class="row-40 label-small text-right">Trẻ sơ sinh</div>
					</div>
					<div class="row">
						<div class="row-40">
							<select class="form-control none-style ">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
							</select>
						</div>
						<div class="row-20">
							<select class="form-control none-style ">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
							</select>
						</div>
						<div class="row-40">
							<select class="form-control none-style ">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
							</select>
						</div>
					</div>
					<div class="row">
						<button class="btn btn-warning bnt-search">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							TÌM KIẾM
						</button>
					</div>
				</div>
			</div>
			<!-- end booking --> 
		</div>
		<div id="quangcao-contact-1">
	        <embed src="http://st.polyad.net/AdImages/2015/07/31/yamaha_300x120_20150731.swf" flashvars="link=http%3A//180.148.142.153/clk.aspx%3Flg%3D-1%26t%3D5%26i%3D0%26b%3D101755%26s%3D46%26r%3D0%26c%3D1000000%26p%3D203%26n%3D0%26l%3Dhttp%253A//www.yamaha-motor.com.vn/san-pham/Nozza-2015-Gia-moi-131%26uc%3D24%26uv%3Dundefined%26ud%3D1366x768%26rd%3D0.8158961853478104%26ui%3D5a5bfe3b31440957-UNKNOW-UNKNOW&amp;zoneid=large_2_home&amp;actionTag=http%3A//180.148.142.153/act.aspx%3Ft%3D5%26i%3D0%26b%3D101755%26s%3D46%26r%3D0%26c%3D1000000%26p%3D203%26n%3D0%26uc%3D24%26uv%3Dundefined%26ud%3D1366x768%26rd%3D0.2389438992831856&amp;otherlink=http%3A//180.148.142.153/clk.aspx%3Flg%3D-1%26t%3D5%26i%3D0%26b%3D101755%26s%3D46%26r%3D0%26c%3D1000000%26p%3D203%26n%3D0%26uc%3D24%26uv%3Dundefined%26ud%3D1366x768%26rd%3D0.8158961853478104%26ui%3D5a5bfe3b31440957-UNKNOW-UNKNOW%26l%3D" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" play="true" loop="true" wmode="transparent" allowscriptaccess="always" width="300" height="120"> 
		</div>
	</div>
</div>
@stop  